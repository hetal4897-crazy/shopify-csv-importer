<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportedProduct extends Model
{
    //
    protected $table = 'imported_products';

    protected $fillable = ['shopify_product_id','import_file_id','title','description','vendor','product_type','tags','published','sku','compare_price','required_shipping','texable','tracker','qty','weight','weight_unit','policy','image','fulfillment_service','price','status','error_message'];
}
