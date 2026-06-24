<?php if (isset($component)) { $__componentOriginalf540f7af52aa25db17f9a132ac5f5f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf540f7af52aa25db17f9a132ac5f5f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.masterLoginSignup','data' => ['title' => ''.e(__('messages.signup_page')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('masterLoginSignup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('messages.signup_page')).'']); ?>

<div class="row w-100 vh-100 g-0 m-0" dir="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-white p-5" 
         style="background: linear-gradient(135deg, #1cc88a, #36b9cc);">
        <h1 id="title" class="fw-bold display-4 mb-3 text-center"></h1>
        <p id="subtitle" class="lead text-center w-75"></p>
    </div>

    <div class="col-md-6 d-flex justify-content-center align-items-center bg-light h-100">
        <div class="w-75"> 
            <img src="<?php echo e(asset('storage/logo/logo.png')); ?>" alt="Signup illustration" class="img-fluid mt-4 mb-3 rounded-3">
            <?php echo $__env->make('partials.flashbag', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
            <form action="<?php echo e(route('signup')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6 mb-3">

                        <input type="text" 
                               class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="last_name" 
                               name="last_name" 
                               placeholder="<?php echo e(__('messages.last_name_placeholder')); ?>"
                               value="<?php echo e(old('last_name')); ?>">
                        <?php $__errorArgs = ['last_name'];
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

                    <div class="col-md-6 mb-3">
                   
                        <input type="text" 
                               class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="first_name" 
                               name="first_name" 
                               placeholder="<?php echo e(__('messages.first_name_placeholder')); ?>"
                               value="<?php echo e(old('first_name')); ?>">
                        <?php $__errorArgs = ['first_name'];
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
                </div>

                <div class="mb-3">

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
                    
                    <br>
                 
                    <input type="password" 
                           class="form-control" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           placeholder="<?php echo e(__('messages.password_confirmation_placeholder')); ?>">
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
                
                <div class="col-md-6">                    
                    <select name="gouvernorat_id" id="gouvernorat_id" 
                            class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                        <option value="" ><?php echo e(__('messages.select_governorate')); ?></option>
                        <?php $__currentLoopData = $gouvernorats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gouvernorat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($gouvernorat->id); ?>" 
                                <?php echo e(old('gouvernorat_id') == $gouvernorat->id ? 'selected' : ''); ?>>
                                <?php echo e($gouvernorat->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['gouvernorat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger mt-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <br>
                
<div class="mb-3 d-flex flex-wrap align-items-center">
    <canvas id="captchaCanvas" width="150" height="50" class="border rounded me-2 mb-2 mb-md-0"></canvas>
    <div class="d-flex flex-grow-1">
        <input type="text" id="captchaInput" name="captcha_input" class="form-control me-2" placeholder="اكتب الرمز هنا">
        <button type="button" id="refreshCaptcha" class="btn btn-outline-secondary">🔁</button>
    </div>
</div>
<small id="captchaError" class="text-danger d-none">الرمز غير صحيح</small>

                <button type="submit" class="btn btn-success w-100 py-2 rounded-3">
                    <?php echo e(__('messages.signup_button')); ?>

                </button>
            </form>

            <div class="text-center mt-3">
                <a href="<?php echo e(route('login.show')); ?>" class="text-decoration-none small"><?php echo e(__('messages.already_account')); ?></a> | <a href="/lang/ar"> العربية</a> | <a href="/lang/fr"> Français</a>
            </div>
        </div>
    </div>
</div>

<script>
const titleText = "<?php echo e(__('messages.welcome_title')); ?>";
const subtitleText = "<?php echo e(__('messages.welcome_subtitle')); ?>";

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


<script>
const titleText = "<?php echo e(__('messages.welcome_title')); ?>";
const subtitleText = "<?php echo e(__('messages.welcome_subtitle')); ?>";

const titleEl = document.getElementById("title");
const subtitleEl = document.getElementById("subtitle");

function typeWriter(element, text, speed, callback) {
    let i = 0;
    function typing() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(typing, speed);
        } else if (callback) callback();
    }
    typing();
}

typeWriter(titleEl, titleText, 120, () => {
    typeWriter(subtitleEl, subtitleText, 60);
});
</script>


<script>
const canvas = document.getElementById('captchaCanvas');
const ctx = canvas.getContext('2d');
const captchaInput = document.getElementById('captchaInput');
const refreshBtn = document.getElementById('refreshCaptcha');
const errorMsg = document.getElementById('captchaError');
const form = document.querySelector('form[action="<?php echo e(route('signup')); ?>"]');

let captchaCode = '';

function generateCaptcha() {
    const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    captchaCode = '';
    for (let i = 0; i < 5; i++) {
        captchaCode += chars.charAt(Math.floor(Math.random() * chars.length));
    }

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = '28px Arial';
    for (let i = 0; i < captchaCode.length; i++) {
        const x = 20 + i * 25;
        const y = 30 + Math.random() * 10;
        const angle = Math.random() * 0.4 - 0.2;
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(angle);
        ctx.fillStyle = '#'+Math.floor(Math.random()*16777215).toString(16);
        ctx.fillText(captchaCode[i], 0, 0);
        ctx.restore();
    }

    for (let i = 0; i < 10; i++) { 
    ctx.strokeStyle = '#'+Math.floor(Math.random()*16777215).toString(16); // Random color
    ctx.lineWidth = 1 + Math.random()*1; 
    ctx.beginPath();
    
    const startX = Math.random()*canvas.width;
    const startY = Math.random()*canvas.height;
    const endX = Math.random()*canvas.width;
    const endY = Math.random()*canvas.height;

    ctx.moveTo(startX, startY);
    ctx.lineTo(endX, endY);

    ctx.stroke();
}

    if(!document.getElementById('captchaHidden')) {
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'captcha_code';
        hidden.id = 'captchaHidden';
        hidden.value = captchaCode;
        form.appendChild(hidden);
    } else {
        document.getElementById('captchaHidden').value = captchaCode;
    }
}

refreshBtn.addEventListener('click', generateCaptcha);

form.addEventListener('submit', function(e){
    if(captchaInput.value.trim().toUpperCase() !== document.getElementById('captchaHidden').value) {
        e.preventDefault();
        errorMsg.classList.remove('d-none');
        generateCaptcha();
        captchaInput.value = '';
    } else {
        errorMsg.classList.add('d-none');
    }
});

generateCaptcha();
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
<?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/signup/show.blade.php ENDPATH**/ ?>