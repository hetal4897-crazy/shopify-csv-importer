<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\ImportFile;
use App\Models\ImportedProduct;
use App\Jobs\ImportProductToShopify;
use Illuminate\Support\Facades\Log;
class ProcessCsvImportJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    public $importFileId;

    public function __construct($importFileId)
    {
        //

        $this->importFileId = $importFileId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $file = ImportFile::findOrFail($this->importFileId);
        $file->update(['status' => 'processing']);

        $path = storage_path("app/private/{$file->filename}");

        $rows = array_map('str_getcsv', file($path));
        $header = array_shift($rows);

        foreach ($rows as $row) {
                try {
                        $data = array_combine($header, $row);
                        $id_flag = 0;
                        if(isset($data['Variant SKU'])){
                            $product = ImportedProduct::where("sku",$data['Variant SKU'])->first();
                            if(isset($product)){
                                $id_flag = 1;
                            }else{
                                $product = new ImportedProduct();
                                $id_flag = 0;
                            }
                            $product->import_file_id = $this->importFileId;
                            $product->title = $data['Title'] ?? '';
                            $product->description = $data['Body HTML'] ?? '';
                            $product->vendor = $data['Vendor'] ?? '';
                            $product->product_type = $data['Product Type'] ?? '';
                            $product->tags = $data['Tags'] ?? '';
                            $product->published = $data['Published'] ?? '';
                            $product->sku = $data['Variant SKU'] ?? '';
                            $product->required_shipping = $data['Variant Requires Shipping'] ?? '';
                            $product->price = $data['Variant Price'] ?? 0;
                            $product->compare_price = $data['Variant Compare At Price'] ?? 0;
                            $product->texable = $data['Variant Taxable'] ?? '';
                            $product->tracker = $data['Variant Inventory Tracker'] ?? '';
                            $product->qty = $data['Variant Inventory Qty']??'';
                            $product->weight = $data['Variant Weight']??'';
                            $product->weight_unit = $data['Variant Weight Unit']??'';
                            $product->policy = $data['Variant Inventory Policy']??'';
                            $product->image = $data['Image Src']??'';
                            $product->fulfillment_service = $data['Variant Fulfillment Service']??'';
                            $product->status = 'pending';
                            $product->save();
                            dispatch(new ImportProductToShopify($product,$id_flag));
                            Log::info($product->id ." Product added into our database");
                        }else{
                            Log::error("Data missing");
                        }            
                        
                }catch(Exception $e) {
                    Log::info($e->getMessage());
                }
            
        }

        $file->update(['status' => 'completed']);
    }
}
