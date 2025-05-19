
<?php $__env->startSection('title'); ?>
Product List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
               		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	               	<tr>
	               		<td><?php echo e($d->id); ?></td>
	               		<td><?php if($d->image!=""): ?><img src="<?php echo e($d->image); ?>" style="width:100px"><?php else: ?> - <?php endif; ?></td>
	               		<td><?php echo e($d->title); ?></td>
	               		<td><?php echo e($d->vendor); ?></td>
	               		<td><?php echo e($d->product_type); ?></td>
	               		<td><?php echo e($d->shopify_product_id); ?></td>
	               		<td><?php echo e($d->status); ?></td>
	               		<td><?php echo e($d->error_message); ?></td>
	               	</tr>
	               	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
        </div>
         </div>
      </div>
   </div>
   <!--end col-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shopify-csv-importer\resources\views/product.blade.php ENDPATH**/ ?>