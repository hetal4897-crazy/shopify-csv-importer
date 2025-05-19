@extends('layout.index')
@section('title')
File History
@endsection
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title mb-0">File History<h5>
         </div>

         <div class="card-body">
            <div class="table-responsive">
            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
               <thead>
                  <tr>    
                     <th>Title</th>                 
                     <th>File Name</th>
                     <th>Status</th>
                     <th>Created_At</th>
                  </tr>
               </thead>
               <tbody>
               	 @foreach($data as $d)
               	  <tr> 
                      <td>{{$d->title}}</td>
               	  	 <td>{{$d->filename}}</td>
               	  	 <td>{{$d->status}}</td>
               	  	 <td>{{date("Y-m-d H:i:s",strtotime($d->created_at))}}</td>
               	  </tr>
               	  @endforeach
               </tbody>
            </table>
         </div>
         </div>
      </div>
   </div>
   <!--end col-->
</div>
@endsection
@section('footer')
@endsection