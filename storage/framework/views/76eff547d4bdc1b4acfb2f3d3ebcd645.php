<?php if (isset($component)) { $__componentOriginalf540f7af52aa25db17f9a132ac5f5f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf540f7af52aa25db17f9a132ac5f5f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.masterLoginSignup','data' => ['title' => 'Login page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('masterLoginSignup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Login page']); ?>

    <div class="row w-100 vh-100 g-0 m-0" dir="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
        <div class="col-md-6 d-none d-md-flex 
                    flex-column justify-content-center align-items-center 
                    text-white p-5" 
             style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
            
            <h1 id="title" class="fw-bold display-4 mb-3 text-center"></h1>
            <p id="subtitle" class="lead text-center w-75"></p>
            

        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center bg-light h-100">
            
            <div class="w-75"> 
                <img src="<?php echo e(asset('storage/logo/logo.png')); ?>" 
                 alt="Login illustration" 
                 class="img-fluid mt-4 rounded-3 ">
                 <br>
                 <?php echo $__env->make('partials.flashbag', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                 <br>
                <h2 class="text-center mb-4 fw-bold text-primary"></h2>
                
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold"><?php echo e(__('messages.email')); ?></label>
                        <input type="email" 
                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="email" 
                            name="email" 
                            placeholder="<?php echo e(__('messages.email_placeholder')); ?>"
                            value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold"><?php echo e(__('messages.password')); ?></label>
                        <input type="password" 
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="password" 
                            name="password" 
                            placeholder="<?php echo e(__('messages.password_placeholder')); ?>">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                         <?php echo e(__('messages.login_button')); ?>

                    </button>
                                 
                </form>

                <!-- Extra Links -->
                <div class="text-center mt-3">
                    
                    <a href="/signup" class="text-decoration-none small"><?php echo e(__('messages.create_account')); ?></a> | <a href="/lang/ar"> العربية</a> | <a href="/lang/fr"> Français</a>
                </div>

            </div>
        </div>
    </div>

<script>
    const titleText = "<?php echo e(__('messages.titleText_login')); ?>";
    const subtitleText = "<?php echo e(__('messages.subtitleText_login')); ?>";
 
    const titleEl = document.getElementById("title");
    const subtitleEl = document.getElementById("subtitle");

 
    function typeWriter(element, text, speed, callback) {
        let i = 0;
        function typing() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(typing, speed);
            } else if (callback) {
                callback();
            }
        }
        typing();
    }

    typeWriter(titleEl, titleText, 120, () => {
        typeWriter(subtitleEl, subtitleText, 60);
    });
</script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf540f7af52aa25db17f9a132ac5f5f57)): ?>
<?php $attributes = $__attributesOriginalf540f7af52aa25db17f9a132ac5f5f57; ?>
<?php unset($__attributesOriginalf540f7af52aa25db17f9a132ac5f5f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf540f7af52aa25db17f9a132ac5f5f57)): ?>
<?php $component = $__componentOriginalf540f7af52aa25db17f9a132ac5f5f57; ?>
<?php unset($__componentOriginalf540f7af52aa25db17f9a132ac5f5f57); ?>
<?php endif; ?>
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/login/show.blade.php ENDPATH**/ ?>