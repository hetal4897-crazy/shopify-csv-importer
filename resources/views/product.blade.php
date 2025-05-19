@extends('layout.index')
@section('title')
Product List
@endsection
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title mb-0">Product List</h5>
         </div>
         <div class="card-body">
         	<div class="table-responsive">
            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Vendor</th>
                     <th>Product Type</th>
                     <th>Shopify Product Id</th>
                     <th>Status</th>
                     <th>Error Message</th>
                  </tr>
               </thead>
               <tbody>
               		@foreach($data as $d)
	               	<tr>
	               		<td>{{$d->id}}</td>
	               		<td>@if($d->image!="")<img src="{{$d->image}}" style="width:100px">@else - @endif</td>
	               		<td>{{$d->title}}</td>
	               		<td>{{$d->vendor}}</td>
	               		<td>{{$d->product_type}}</td>
	               		<td>{{$d->shopify_product_id}}</td>
	               		<td>{{$d->status}}</td>
	               		<td>{{$d->error_message}}</td>
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