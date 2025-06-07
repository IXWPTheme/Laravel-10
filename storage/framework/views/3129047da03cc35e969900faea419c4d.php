<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Add Category</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-categories.cats-subcats-list')); ?>" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to categories list
                    </a>
                </div>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.manage-categories.store-category')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
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
                        <label for="">Category name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Enter category name" value="<?php echo e(old('category_name')); ?>">
                        <?php $__errorArgs = ['category_name'];
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
                        <label for="">Category image</label>
                        <input type="file" name="category_image" id="" class="form-control">
                        <?php $__errorArgs = ['category_image'];
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
                    <div class="avatar mb-3">
                        <img src="" alt="" data-ijabo-default-img="" width="50" height="50" id="category_image_preview">
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
        $('input[type="file"][name="category_image"]').ijaboViewer({
            preview:'#category_image_preview',
            imageShape:'square',
            allowedExtensions:['png','jpg','jpeg','svg'],
            onErrorShape:function(message,element){
                alert(message);
            },
            onInvalidType:function(message,element){
                alert(message);
            },
            onSuccess:function(message,element){}
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\toastr-coolreppro-com\resources\views/back/pages/admin/add-category.blade.php ENDPATH**/ ?>