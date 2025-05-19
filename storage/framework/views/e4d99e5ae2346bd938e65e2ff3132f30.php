
<?php $__env->startSection('title'); ?>
Upload
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title mb-0">Upload File</h5>
         </div>
         <div class="card-body">
<form action="<?php echo e(route('submitcsv')); ?>" method="post" enctype="multipart/form-data">
  
   <?php echo csrf_field(); ?>
   <label class="form-label" for="title">Title</label>
    <div class="input-group">
        
        <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title">
    </div>

   <label class="form-label mt-10" style="margin-top:20px" for="csv_file">File</label>
    <div class="input-group">
        
        <input type="file" class="form-control" name="csv_file" id="csv_file">
    </div>
  <div class="input-group" style="margin-top:20px">
  <input type="submit" value="Submit"  class="btn btn-primary" name="submit">
</div>
</form>
</div>
</div></div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shopify-csv-importer\resources\views/upload.blade.php ENDPATH**/ ?>