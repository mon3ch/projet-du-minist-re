<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['action_charters', 'loi' => null]));

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

foreach (array_filter((['action_charters', 'loi' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php if($loi): ?>
    <div style="background-color:#fff8e1;padding:20px;border-radius:10px;border:1px solid #ffd54f; line-height:1.8;">
        <?php echo $loi->description; ?>

        <?php if(Auth::check() && Auth::user()->is_admin): ?>
            <div class="text-end mt-3">
                <a href="<?php echo e(route('loi.edit', $loi)); ?>" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-pen"></i> تعديل القانون
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php if(Auth::check() && Auth::user()->is_admin): ?>
        <div class="alert alert-warning">
            لا يوجد قانون محفوظ حالياً
            <a href="<?php echo e(route('loi.create')); ?>" class="btn btn-sm btn-success ms-2">
                <i class="fa-solid fa-plus"></i> إضافة قانون
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/action-charter-text.blade.php ENDPATH**/ ?>