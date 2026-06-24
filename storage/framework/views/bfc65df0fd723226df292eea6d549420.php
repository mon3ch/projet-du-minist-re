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
            <div class="soft-card p-3 mb-4" data-aos="fade-up">
                <div class="card-body p-4">

                    <form action="<?php echo e(route('loi.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                            <h3>   
                                نص القانون
                            </h3>
                            </label>
                            <textarea name="description" id="editor"></textarea>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                حفظ
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 300px;
            direction: rtl;
            text-align: right;
        }
    </style>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'ar',
                placeholder: 'اكتب نص القانون هنا...',
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
                    options: [
                        10, 12, 14, 16, 18, 20, 24, 28, 32, 36
                    ]
                },
                alignment: {
                    options: ['right', 'center', 'left', 'justify']
                }
            })
            .then(editor => {
                console.log('Editor loaded', editor);
            })
            .catch(error => {
                console.error(error);
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
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/loi/create.blade.php ENDPATH**/ ?>