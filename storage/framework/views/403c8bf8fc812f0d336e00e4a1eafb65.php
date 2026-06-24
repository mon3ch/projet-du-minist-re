
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
 
            <?php if (isset($component)) { $__componentOriginal8cf007bd39147fff91165507b9f877a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8cf007bd39147fff91165507b9f877a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delegation-table','data' => ['delegations' => $delegations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('delegation-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['delegations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($delegations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8cf007bd39147fff91165507b9f877a1)): ?>
<?php $attributes = $__attributesOriginal8cf007bd39147fff91165507b9f877a1; ?>
<?php unset($__attributesOriginal8cf007bd39147fff91165507b9f877a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8cf007bd39147fff91165507b9f877a1)): ?>
<?php $component = $__componentOriginal8cf007bd39147fff91165507b9f877a1; ?>
<?php unset($__componentOriginal8cf007bd39147fff91165507b9f877a1); ?>
<?php endif; ?>
       
    </div>
    <?php echo e($delegations->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/delegation/index.blade.php ENDPATH**/ ?>