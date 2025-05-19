<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShopifyGraphQLService
{
    protected $shop;
    protected $token;

    public function __construct()
    {
        $this->shop = env('SHOPIFY_API_URL');
        $this->token = env('SHOPIFY_ACCESS_TOKEN');
    }

    public function query(string $query, array $variables = [])
    {
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $this->token,
            'Content-Type' => 'application/json',
        ])->post("{$this->shop}/admin/api/2024-01/graphql.json", [
            'query' => $query,
            'variables' => $variables,
        ]);

        return $response->json();
    }
}