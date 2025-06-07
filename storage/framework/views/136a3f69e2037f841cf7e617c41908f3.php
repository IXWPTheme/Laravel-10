<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Add Sites</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-site-finding.site-finding-list')); ?>" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Sites list
                    </a>
                </div>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.manage-site-finding.store-sites')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
                <?php echo csrf_field(); ?>
                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                        <strong><i class="dw dw-checked"></i></strong>
                        <?php echo Session::get('success'); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if(Session::get('fail')): ?>
                <div class="alert alert-danger">
                    <strong><i class="dw dw-checked"></i></strong>
                    <?php echo Session::get('fail'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Sites name</label>
                        <input type="text" class="form-control" name="sites_name" placeholder="Enter Site name" value="<?php echo e(old('sites_name')); ?>">
                        <?php $__errorArgs = ['sites_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Sites image</label>
                        <input type="file" name="sites_image" id="sites_image" class="form-control">
                        <?php $__errorArgs = ['sites_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger ml-2">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div id="image-preview-container" class="d-flex flex-wrap gap-2 mb-3">
                        <!-- Preview images will appear here -->
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">CREATE</button>
            </form>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('sites_image').addEventListener('change', function(e) {
    const container = document.getElementById('image-preview-container');
    container.innerHTML = '';
    
    for (let i = 0; i < this.files.length; i++) {
        const file = this.files[i];
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.width = 50;
                img.height = 50;
                img.className = 'mr-2';
                container.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    }
});
</script> 
<?php $__env->stopPush(); ?>
<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\mve-coolreppro-com\resources\views/back/pages/admin/add-sites.blade.php ENDPATH**/ ?>