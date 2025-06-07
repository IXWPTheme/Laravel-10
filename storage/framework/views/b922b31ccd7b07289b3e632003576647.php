<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here'); ?>
<?php $__env->startSection('content'); ?>

<div class="login-box bg-white box-shadow border-radius-10">
  <div class="login-title">
      <h2 class="text-center text-primary">Seller Login</h2>
  </div>
  <form action="<?php echo e(route('seller.login-handler')); ?>" method="POST">
     <?php echo csrf_field(); ?>
     <?php if (isset($component)) { $__componentOriginalec1e920844a655da23f15e0530a06cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec1e920844a655da23f15e0530a06cad = $attributes; } ?>
<?php $component = App\View\Components\Alert\FormAlert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert.form-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert\FormAlert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $attributes = $__attributesOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__attributesOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec1e920844a655da23f15e0530a06cad)): ?>
<?php $component = $__componentOriginalec1e920844a655da23f15e0530a06cad; ?>
<?php unset($__componentOriginalec1e920844a655da23f15e0530a06cad); ?>
<?php endif; ?>
      <div class="input-group custom">
          <input type="text" class="form-control form-control-lg" placeholder="Email/Username" name="login_id" value="<?php echo e(old('login_id')); ?>">
          <div class="input-group-append custom">
              <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
          </div>
      </div>
      <?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
              <?php echo e($message); ?>

          </div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div class="input-group custom">
          <input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
          <div class="input-group-append custom">
              <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
          </div>
      </div>
      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
          <?php echo e($message); ?>

      </div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      <div class="row pb-30">
          <div class="col-6">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember</label>
              </div>
          </div>
          <div class="col-6">
              <div class="forgot-password">
                  <a href="<?php echo e(route('seller.forgot-password')); ?>">Forgot Password</a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-12">
              <div class="input-group mb-0">
            
                  <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
          
                  
              </div>
            
          </div>
      </div>
  </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\mve-coolreppro-com\resources\views/back/pages/seller/auth/login.blade.php ENDPATH**/ ?>