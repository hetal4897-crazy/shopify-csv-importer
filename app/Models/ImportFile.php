<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportFile extends Model
{
    //
    protected $table = 'import_files';

    protected $fillable = ['title','filename','status'];
}
