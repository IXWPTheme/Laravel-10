<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-dark">Start Finding</h4>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.manage-site-finding.site-finding-list')); ?>" class="btn btn-primary btn-sm">
                     <i class="ion-arrow-left-a"></i> Back to Sites list
                    </a>
                </div>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.manage-site-finding.store-finding')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
               <input type="hidden" name="site_id" value="<?php echo e(Request('site_id')); ?>">
               <input type="hidden" name="unit_id" value="<?php echo e(Request('unit_id')); ?>">
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
                        <label for="">Finding Name</label>
                        <input type="text" class="form-control" name="find_name" placeholder="Enter finding name" value="<?php echo e(old('unit_name')); ?>">
                        <?php $__errorArgs = ['find_name'];
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
                        <label for="">Before Photos</label>
                        <input type="file" name="before_photos[]" id="before_photos" class="form-control" multiple>
                        <?php $__errorArgs = ['before_photos'];
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
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin-unit-finding-lists', [
    'unit_id' => Request('unit_id') ,
    'site_id' => Request('site_id') 
]);

$__html = app('livewire')->mount($__name, $__params, 'lw-743926469-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
// Initialize Slick when first loading the page
document.addEventListener('DOMContentLoaded', function() {
    initSlickCarousels();
});

// Reinitialize Slick when Livewire updates the DOM
document.addEventListener('livewire:init', function() {
    Livewire.hook('morph.updated', function() {
      // initSlickCarousels();
       //alert("Hello! I am an alert box!!"); 
       setTimeout(function() { 
                   
        initSlickCarousels();
                
                }, 100); 
              });
    
});

function initSlickCarousels() {
    $('.image-slider').not('.slick-initialized').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="dw dw-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="dw dw-arrow-right"></i></button>'
    });
}
$('#before_photos').on('change', function(e) {
    const container = $('#image-preview-container');
    container.empty();
    
    $.each(this.files, function(i, file) {
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('<img>')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50)
                    .addClass('mr-2')
                    .appendTo(container);
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
    // Initialize all Fancybox instances
     $('[data-fancybox]').fancybox({
         buttons: [
            "zoom",
            "slideShow",
            "fullScreen",
            "download",
             "thumbs",
            "close"
         ],
        loop: true,
        protect: true
     });   
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('back.layout.pages-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\toastr-coolreppro-com\resources\views/back/pages/admin/add-finding.blade.php ENDPATH**/ ?>