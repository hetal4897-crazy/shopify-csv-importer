@extends('layout.index')
@section('title')
Upload
@endsection
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title mb-0">Upload File</h5>
         </div>
         <div class="card-body">
<form action="{{route('submitcsv')}}" method="post" enctype="multipart/form-data">
  
   @csrf
   <label class="form-label" for="title">Title</label>
    <div class="input-group">
        
        <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title">
    </div>

   <label class="form-label mt-10" style="margin-top:20px" for="csv_file">File</label>
    <div class="input-group">
        
        <input type="file" class="form-control" accept=".csv" name="csv_file" id="csv_file">
    </div>
  <div class="input-group" style="margin-top:20px">
  <input type="submit" value="Submit"  class="btn btn-primary" name="submit">
</div>
</form>
</div>
</div></div></div>
@endsection
@section('footer')
@endsection
