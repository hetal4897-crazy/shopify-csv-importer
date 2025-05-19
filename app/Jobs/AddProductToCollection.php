<?php
namespace App\Jobs;

use App\Models\ImportedProduct;
use App\Services\ShopifyGraphQLService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
class AddProductToCollection implements ShouldQueue
{
    use Queueable;

    protected $product;
    protected $collectionId;

    public function __construct(ImportedProduct $product, string $collectionId)
    {
        $this->product = $product;
        $this->collectionId = $collectionId; 
    }

    public function handle(ShopifyGraphQLService $shopify)
    {
        $mutation = <<<'GRAPHQL'
        mutation collectionAddProducts($id: ID!, $productIds: [ID!]!) {
            collectionAddProducts(id: $id, productIds: $productIds) {
                collection {
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

        $variables = [
            'id' => $this->collectionId,
            'productIds' => [
                $this->product->shopify_product_id,
            ],
        ];

        $response = $shopify->query($mutation, $variables);

      //  print_r($response);

        if (!empty($response['data']['collectionAddProducts']['userErrors'])) {
            Log::error('Shopify Collection Error', $response['data']['collectionAddProducts']['userErrors']);
        }else{
            Log::info($this->product->shopify_product_id ." Product added into collection");
        }
    }
}
