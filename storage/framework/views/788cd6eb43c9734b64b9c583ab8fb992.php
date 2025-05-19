<?php $__env->startSection('title'); ?>
Upload
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="card">
         <div class="card-header">
            <h5 class="card-title mb-0">Logs List</h5>
         </div>
         <div class="card-body">
    <div class="col sidebar mb-3">
      

    <div class="col-12 table-container">
      <?php if($logs === null): ?>
        <div>
          Log file >50M, please download it.
        </div>
      <?php else: ?>
      <div class="table-responsive">
        <table id="example" class="table table-striped" data-ordering-index="<?php echo e($standardFormat ? 2 : 0); ?>">
          <thead>
          <tr>
            <?php if($standardFormat): ?>
              <th>Level</th>
              <th>Context</th>
              <th>Date</th>
            <?php else: ?>
              <th>Line number</th>
            <?php endif; ?>
            <th>Content</th>
          </tr>
          </thead>
          <tbody>

          <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-display="stack<?php echo e($key); ?>">
              <?php if($standardFormat): ?>
                <td class="nowrap text-<?php echo e($log['level_class']); ?>">
                  <span class="fa fa-<?php echo e($log['level_img']); ?>" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo e($log['level']); ?>

                </td>
                <td class="text"><?php echo e($log['context']); ?></td>
              <?php endif; ?>
              <td class="date"><?php echo e($log['date']); ?></td>
              <td class="text">
                <?php if($log['stack']): ?>
                  <button type="button"
                          class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                          data-display="stack<?php echo e($key); ?>">
                    <span class="fa fa-search"></span>
                  </button>
                <?php endif; ?>
                <?php echo e($log['text']); ?>

                <?php if(isset($log['in_file'])): ?>
                  <br/><?php echo e($log['in_file']); ?>

                <?php endif; ?>
                <?php if($log['stack']): ?>
                  <div class="stack" id="stack<?php echo e($key); ?>"
                       style="display: none; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?>

                  </div>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      </div>
      <?php endif; ?>
     
    </div>
  </div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<script>

  // dark mode by https://github.com/coliff/dark-mode-switch
  const darkSwitch = document.getElementById('darkSwitch');

  // this is here so we can get the body dark mode before the page displays
  // otherwise the page will be white for a second... 
  initTheme();

  window.addEventListener('load', () => {
    if (darkSwitch) {
      initTheme();
      darkSwitch.addEventListener('change', () => {
        resetTheme();
      });
    }
  });

  // end darkmode js
        
  $(document).ready(function () {
    $('.table-container tr').on('click', function () {
      $('#' + $(this).data('display')).toggle();
    });
    $('#table-log').DataTable({
      "order": [$('#table-log').data('orderingIndex'), 'desc'],
      "stateSave": true,
      "stateSaveCallback": function (settings, data) {
        window.localStorage.setItem("datatable", JSON.stringify(data));
      },
      "stateLoadCallback": function (settings) {
        var data = JSON.parse(window.localStorage.getItem("datatable"));
        if (data) data.start = 0;
        return data;
      }
    });
    $('#delete-log, #clean-log, #delete-all-log').click(function () {
      return confirm('Are you sure?');
    });
  });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shopify-csv-importer\resources\views/vendor/laravel-log-viewer/log.blade.php ENDPATH**/ ?>