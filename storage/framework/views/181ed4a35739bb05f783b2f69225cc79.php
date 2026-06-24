<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['action_charter', 'loi', 'quatre_analyses']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['action_charter', 'loi', 'quatre_analyses']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="row">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="m-0">
            <i class="fa-solid fa-users-gear me-2"></i>
            التحليل الرباعي لواقع المندوبية
        </h5>
        <span class="text-muted small">
            <?php if($quatre_analyses): ?>
           
            <button class="btn btn-primary quick-btn">
                <a href="<?php echo e(route('quatre_analyses.edit', $quatre_analyses->id)); ?>"
   class="btn btn-primary text-white text-decoration-none">
    <i class="fa-solid fa-pen me-2"></i> تعديل التحليل الرباعي
</a>

            </button>

            <?php else: ?>
            <button class="btn btn-primary quick-btn">
                <a href="<?php echo e(route('quatre_analyses.createByCharter', $action_charter)); ?>" class="text-white text-decoration-none">
                    <i class="fa-solid fa-plus me-2"></i> إضافة التحليل الرباعي
                </a>
            </button>

            <?php endif; ?>
           
        </span>
    </div>

    <div class="soft-card p-3 mb-4" data-aos="fade-up">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr class=" text-center">
                    <th>نقاط القوة <br><small>(على المستوى الداخلي)</small></th>
                    <th>نقاط الضعف <br><small>(على المستوى الداخلي)</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php if($quatre_analyses && $quatre_analyses->points_forts): ?>
                            <?php echo $quatre_analyses->points_forts; ?>

                        <?php else: ?>
                            ---
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($quatre_analyses && $quatre_analyses->points_faibles): ?>
                            <?php echo $quatre_analyses->points_faibles; ?>

                        <?php else: ?>
                            ---
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>

            <thead class="table-light">
                <tr class=" text-center">
                    <th>الفرص <br><small>(على المستوى الخارجي)</small></th>
                    <th>التحديات <br><small>(على المستوى الخارجي)</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php if($quatre_analyses && $quatre_analyses->opportunites): ?>
                            <?php echo $quatre_analyses->opportunites; ?>

                        <?php else: ?>
                            ---
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($quatre_analyses && $quatre_analyses->defis): ?>
                            <?php echo $quatre_analyses->defis; ?>

                        <?php else: ?>
                            ---
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal054c9937b46084c5ec6899bca96c68a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal054c9937b46084c5ec6899bca96c68a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal054c9937b46084c5ec6899bca96c68a1)): ?>
<?php $attributes = $__attributesOriginal054c9937b46084c5ec6899bca96c68a1; ?>
<?php unset($__attributesOriginal054c9937b46084c5ec6899bca96c68a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal054c9937b46084c5ec6899bca96c68a1)): ?>
<?php $component = $__componentOriginal054c9937b46084c5ec6899bca96c68a1; ?>
<?php unset($__componentOriginal054c9937b46084c5ec6899bca96c68a1); ?>
<?php endif; ?>
</div>
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/quatre_analyses-table.blade.php ENDPATH**/ ?>