<?php

namespace App\Http\Controllers;
use App\Models\ImportedProduct;
use Illuminate\Http\Request;
use App\Models\ImportFile;
use App\Jobs\ProcessCsvImportJob;
use Toastr;
class ProductImportController extends Controller
{
    //

    public function showUploadForm()
    {
        return view('upload');
    }

    public function file_list(){
        $data = ImportFile::orderby("id","DESC")->get();
        return view("file",compact("data"));
    }

    public function product_list(){
        $data = ImportedProduct::orderby("id","DESC")->get();
        return view("product",compact("data"));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $path = $request->file('csv_file')->store('imports');

        $importFile = ImportFile::create([
            'filename' => $path,
            'status' => 'pending',
            'title' => $request->get("title")
        ]);

        dispatch(new ProcessCsvImportJob($importFile->id));
        Toastr::success('File uploaded and queued for processing.', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

   
}
