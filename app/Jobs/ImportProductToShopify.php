<?php
namespace App\Jobs;

use App\Services\ShopifyGraphQLService;
use App\Models\ImportedProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\AddProductToCollection;
use App\Jobs\ProductCreateMedia;
use Illuminate\Support\Facades\Log;
class ImportProductToShopify implements ShouldQueue
{
    use Queueable;

    protected $product,$is_flag;

    public function __construct(ImportedProduct $product,int $is_flag)
    {
        $this->product = $product;
        $this->is_flag = $is_flag;
    }

    public function handle(ShopifyGraphQLService $shopify)
    {
        if($this->is_flag==1){ //update
            $mutation = <<<'GRAPHQL'
                    mutation productUpdate($input: ProductInput!) {
                      productUpdate(input: $input) {
                        product {
                          id
                          title
                        }
                        userErrors {
                          field
                          message
                        }
                      }
                    }
                    GRAPHQL;
        }else{ //create
            $mutation = <<<'GRAPHQL'
                            mutation productCreate($input: ProductInput!) {
                                productCreate(input: $input) {
                                    product {
                                        id
                                        title
                                        status
                                    }
                                    userErrors {
                                        field
                                        message
                                    }
                                }
                            }
                            GRAPHQL;
        }
        

        
        $variables = [
            'input' => [
                'title' => $this->product->title,
                'bodyHtml' => $this->product->description,
                'vendor' => $this->product->vendor,
                'productType' => $this->product->product_type,
                'tags' => $this->product->tags,
                'variants' => [
                    [
                        'price' => $this->product->price,
                        'sku' => $this->product->sku,
                        'compareAtPrice' => $this->product->compare_price,
                        'requiresShipping' => (bool)$this->product->required_shipping,
                        'taxable' => (bool)$this->product->texable,
                        'inventoryManagement' =>  strtoupper($this->product->tracker),
                        //'inventoryQuantity' => (int)5,
                        'weight' => (float)$this->product->weight,
                        'weightUnit' => "KILOGRAMS",//$this->product->weight_unit,
                        'inventoryPolicy' => strtoupper($this->product->policy)
                    ]
                ]
            ]
        ];

        $response = $shopify->query($mutation, $variables);
       
        if (!empty($response['data']['productCreate']['product'])) {
            $this->product->update([
                'shopify_product_id' => $response['data']['productCreate']['product']['id'],
                'status' => $response['data']['productCreate']['product']['status'],
            ]);
           
           
                $collectionGID = 'gid://shopify/Collection/505879331132';
                dispatch(new AddProductToCollection($this->product, $collectionGID));
                dispatch(new ProductCreateMedia($this->product));
            
            Log::info($this->product->shopify_product_id ." Product added into shopify");
        }

    }
}
