<div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="h4 text-blue">Finding of Unit</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-site-finding.add-units', ['id' => request('site-id')])); ?>"
                        class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>  Add Units
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-borderless table-striped">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Before Photos</th>
                            <th>Finding</th>
                            <th>Unit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="sortable_categories">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $startfinding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-index="<?php echo e($item->id); ?>" data-ordering="<?php echo e($item->ordering); ?>">
                                <td>
                                    <div class="image-slider">
                                        <?php
                                            $images = json_decode($item->find_before_img) ?? [$item->find_before_img];
                                        ?>
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="avatar mr-2">
                                                <a href="/images/finding/original/<?php echo e($image); ?>"
                                                    data-fancybox="gallery-<?php echo e($item->id); ?>">
                                                    <img src="/images/finding/thumbnails/<?php echo e($image); ?>" width="150" height="150"
                                                        class="img-thumbnail" alt="">
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </td>
                                <td>
                                    <?php echo e($item->find_name); ?> - <?php echo e($item->id); ?>

                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo e(route('admin.manage-site-finding.add-units', ['id' => $item->id])); ?>"
                                            class="text-primary" title="Add Units"></title>
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo e(route('admin.manage-site-finding.edit-category', ['id' => $item->id])); ?>"
                                            class="text-primary">
                                            <i class="dw dw-edit2"></i>
                                        </a>
                                        <a href="javascript:;" class="text-danger deleteCategoryBtn"
                                            data-id="<?php echo e($item->id); ?>">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">No Findings found!</span>
                                </td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </tbody>
                </table>
            </div>
            <div class="d-block mt-2">
                <?php echo e($startfinding->links('livewire::simple-bootstrap' )); ?>

            </div>
        </div>
    </div>

</div><?php /**PATH D:\xampp\htdocs\toastr-coolreppro-com\resources\views/livewire/admin-unit-finding-lists.blade.php ENDPATH**/ ?>