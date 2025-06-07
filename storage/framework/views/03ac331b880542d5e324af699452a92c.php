<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Add Sub Category</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-categories.cats-subcats-list')); ?>" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to categories list
                    </a>
                </div>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.manage-categories.store-subcategory')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
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
                        <label for="">Parent category</label>
                        <select name="parent_category" id="" class="form-control">
                            <option value="">Not Set</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php echo e(old('parent_category') == $item->id ? 'selected' : ''); ?>><?php echo e($item->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['parent_category'];
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
                        <label for="">Sub Category name</label>
                        <input type="text" class="form-control" name="subcategory_name" placeholder="Enter sub category name" value="<?php echo e(old('subcategory_name')); ?>">
                        <?php $__errorArgs = ['subcategory_name'];
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
                        <label for="">Is Child Of</label>
                        <select name="is_child_of" id="" class="form-control">
                            <option value="0">-- Independent --</option>
                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php echo e(old('is_child_of') == $item->id ? 'selected' : ''); ?>><?php echo e($item->subcategory_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['is_child_of'];
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
            </div>
            <button type="submit" class="btn btn-primary">CREATE</button>
            </form>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\mve-coolreppro-com\resources\views/back/pages/admin/add-subcategory.blade.php ENDPATH**/ ?>