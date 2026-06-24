<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Gouvernorat page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Gouvernorat page']); ?>
    <div class="content">
        
        <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="container mt-4">
            <form action="<?php echo e(route('quatre_analyses.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="action_charter_id" value="<?php echo e($action_charter->id); ?>">
<div class="row">
                
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>النقاط القوية</h3>
                        </label>
                        <textarea name="points_forts" id="editor-points_forts"></textarea>
                       <?php $__errorArgs = ['points_forts'];
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
                </div>

                
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>النقاط الضعيفة</h3>
                        </label>
                        <textarea name="points_faibles" id="editor-points_faibles"></textarea>
                        <?php $__errorArgs = ['points_faibles'];
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
                </div>
</div>
                
<div class="row">
                
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>الفرص</h3>
                        </label>
                        <textarea name="opportunites" id="editor-opportunites"></textarea>
                        <?php $__errorArgs = ['opportunites'];
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
                </div>

                
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>التحديات</h3>
                        </label>
                        <textarea name="defis" id="editor-defis"></textarea>
                        <?php $__errorArgs = ['defis'];
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
                </div>
</div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable {
            min-height: 200px;
            direction: rtl;
            text-align: right;
        }
    </style>

    <script>
        const editors = [
            'editor-points_forts',
            'editor-points_faibles',
            'editor-opportunites',
            'editor-defis'
        ];

        editors.forEach(id => {
            ClassicEditor
                .create(document.querySelector(`#${id}`), {
                    language: 'ar',
                    placeholder: 'اكتب هنا...',
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                        'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'codeBlock', '|',
                        'undo', 'redo', 'removeFormat'
                    ],
                    fontSize: {
                        options: [10, 12, 14, 16, 18, 20, 24, 28, 32, 36]
                    },
                    alignment: {
                        options: ['right', 'center', 'left', 'justify']
                    }
                })
                .then(editor => console.log(`${id} loaded`, editor))
                .catch(error => console.error(error));
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/quatre_analyses/create.blade.php ENDPATH**/ ?>