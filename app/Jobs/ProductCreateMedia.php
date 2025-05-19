<?php

namespace App\Jobs;
use App\Models\ImportedProduct;
use App\Services\ShopifyGraphQLService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
class ProductCreateMedia implements ShouldQueue
{
    use Queueable;

    protected $product;

    public function __construct(ImportedProduct $product)
    {
        $this->product = $product;        
    }

    

    public function handle(ShopifyGraphQLService $shopify)
        {
            $mutation = <<<'GRAPHQL'
                mutation($media: [CreateMediaInput!]!, $productId: ID!) {
                  productCreateMedia(media: $media, productId: $productId) {
                    media {
                      ... on MediaImage {
                        id
                        status
                      }
                    }
                    mediaUserErrors {
                      field
                      message
                    }
                  }
                }
                GRAPHQL;

                $variables = [
                    'productId' => $this->product->shopify_product_id,
                    'media' => [
                        [
                            'originalSource' => $this->product->image,
                            'alt' => $this->product->title,
                            'mediaContentType' => 'IMAGE'
                        ]
                    ]
                ];

            $response = $shopify->query($mutation, $variables);
              // print_r($response);
            if (!empty($response['data']['collectionAddProducts']['userErrors'])) {
                Log::error('Shopify Collection Error', $response['data']['collectionAddProducts']['userErrors']);
            }else{
                log::info("Media is created for shopify product id ".$this->product->shopify_product_id);
            }
        }

}
