<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'programme page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'programme page']); ?>

    <div class="content action-charter">

        <?php echo $__env->make('components.action-charter-text', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <?php if(Auth::user()->is_admin): ?>
            <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('partials.sidebar.user.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <div class="container mt-4">
            <div class="charter-box" data-aos="fade-up">

                <div class="charter-title text-center">
                    <h1> الموارد البشرية بالمؤسسات تحت الإشراف</h1>
                </div>

                <table class="table table-bordered mt-4">
                    <tr>
                        <th>اسم البرنامج </th>
                        <th>رئيس البرنامج</th>
                        <th>الولاية</th>
                        <th>استراتيجية البرنامج</th>
                    </tr>
                    <tr>
                        <td><?php echo e($action_charter->programme->name); ?></td>
                        <td><?php echo e($action_charter->name_responsable_programme); ?></td>
                        <td><?php echo e($action_charter->gouvernorat->name ?? '—'); ?></td>
                        <td><?php echo e($action_charter->strategie_programme); ?></td>
                    </tr>
                </table>
                <hr>
                <form action="<?php echo e(route('etablissement_rh.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="action_charter_id" value="<?php echo e($action_charter->id); ?>">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">اسم المؤسسة</label>
                            <select name="name_etablissement_id" class="form-select" required>
                                <option value="">-- اختر المؤسسة --</option>
                                <?php $__currentLoopData = $names_etablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($name->id); ?>"><?php echo e($name->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                       <div class="col-md-3">
                                <label class="form-label">نوع المؤسسة</label>
                                <select name="is_public" id="is_public" class="form-select">
                                    <option value="1">عمومية</option>
                                    <option value="0">خاصة</option>
                                </select>
                        </div>

                        <div id="grade-row" class="col-md-3">
                                <label class="form-label">الرتبة</label>
                                <input type="text" name="grade" class="form-control">
                        </div>
                         <div id="specialisation-row" style="display:none;" class="col-md-3">
                                <label class="form-label">الاختصاص</label>
                                <input type="text" name="specialisation" class="form-control">
                        </div>

                    </div>
                        
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">
                                عدد
                                الذكور
                                  </label>
                            <input type="number" value="0" name="number_male" class="form-control" min="0">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" >
                                عدد
                                الإناث  

                            </label>
                            <input type="number" value="0" name="number_female" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fa-solid fa-save me-1"></i> حفظ
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

<script>
    document.getElementById('is_public').addEventListener('change', function () {
        document.getElementById('eventRef').style.display =
            this.value === '0' ? 'block' : 'none';
    });
</script>
<script>
function toggleFields() {
    const select = document.getElementById('is_public');
    const gradeRow = document.getElementById('grade-row');
    const specRow = document.getElementById('specialisation-row');

    if (select.value === '1') {
        gradeRow.style.display = '';
        specRow.style.display = 'none';
    } else {
        gradeRow.style.display = 'none';
        specRow.style.display = '';
    }
}

document.getElementById('is_public').addEventListener('change', toggleFields);

document.addEventListener('DOMContentLoaded', toggleFields);
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
<?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/etablissement_rh/create.blade.php ENDPATH**/ ?>