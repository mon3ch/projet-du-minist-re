<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Etablissement page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Etablissement page']); ?>
    <div class="content">
        
        <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fa-solid fa-school"></i> <?php echo e(__('messages.add_etablissement')); ?> </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="<?php echo e(route('names_etablissements.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="name" class="form-label"><?php echo e(__('messages.etablissement_name')); ?></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('messages.etablissement_name_placeholder')); ?>">
                                <?php $__errorArgs = ['name'];
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

                            <div class="col-md-4">
                                <label for="etablissement_id" class="form-label"><span class="text-danger">*</span> <?php echo e(__('messages.type_etablissement')); ?></label>
                                <select name="etablissement_id" id="etablissement_id"
                                    class="form-select shadow-sm border-primary select2">
                                    <option value=""><?php echo e(__('messages.select_type_etablissement')); ?></option>
                                    <?php $__currentLoopData = $etablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etablissement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($etablissement->id); ?>" <?php echo e(old('etablissement_id') == $etablissement->id ? 'selected' : ''); ?>>
                                            <?php echo e($etablissement->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['etablissement_id'];
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

                            <div class="col-md-4">
                                <label for="programme_name" class="form-label">---</label>
                                <input type="text" id="programme_name" value="<?php echo e(__('messages.programme')); ?>" class="form-control shadow-sm border-primary" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="gouvernorat_id" class="form-label"><span class="text-danger">*</span> <?php echo e(__('messages.gouvernorat')); ?></label>
                                <select name="gouvernorat_id" id="gouvernorat_id" 
                                    class="form-select shadow-sm border-primary select2">
                                    <option value=""><?php echo e(__('messages.select_governorate')); ?></option>
                                    <?php $__currentLoopData = $gouvernorats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gouvernorat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gouvernorat->id); ?>" <?php echo e(old('gouvernorat_id') == $gouvernorat->id ? 'selected' : ''); ?>>
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
                        </div>

                        <!-- Submit -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fa-solid fa-save me-1"></i> <?php echo e(__('messages.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
document.getElementById('etablissement_id').addEventListener('change', function() {
    let etablissementId = this.value;
    let programmeNameInput = document.getElementById('programme_name');

    programmeNameInput.value = ''; 

    if (etablissementId) {
        fetch(`/etablissement/${etablissementId}/programme`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    programmeNameInput.value = data.programme.name;
                } else {
                    programmeNameInput.value = 'Aucun programme disponible';
                }
            })
            .catch(() => {
                programmeNameInput.value = 'Erreur !';
            });
    } else {
        programmeNameInput.value = '';
    }
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
<?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/names_etablissements/create.blade.php ENDPATH**/ ?>