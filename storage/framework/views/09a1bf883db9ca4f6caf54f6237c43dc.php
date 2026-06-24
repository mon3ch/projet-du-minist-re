
<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Gestion de gouvernorat']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Gestion de gouvernorat']); ?>
  <div class="content">

    
    <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
 
            <?php if (isset($component)) { $__componentOriginal11c8206d34591ed900a415fd3408c9fb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal11c8206d34591ed900a415fd3408c9fb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.etablissement-table','data' => ['etablissements' => $etablissements]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('etablissement-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etablissements' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($etablissements)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal11c8206d34591ed900a415fd3408c9fb)): ?>
<?php $attributes = $__attributesOriginal11c8206d34591ed900a415fd3408c9fb; ?>
<?php unset($__attributesOriginal11c8206d34591ed900a415fd3408c9fb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal11c8206d34591ed900a415fd3408c9fb)): ?>
<?php $component = $__componentOriginal11c8206d34591ed900a415fd3408c9fb; ?>
<?php unset($__componentOriginal11c8206d34591ed900a415fd3408c9fb); ?>
<?php endif; ?>
       
    </div>
    <?php echo e($etablissements->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/etablissement/index.blade.php ENDPATH**/ ?>