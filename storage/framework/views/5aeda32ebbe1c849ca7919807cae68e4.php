
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

    <?php if(Auth::user()->is_admin): ?>
        <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    <?php else: ?>
        <?php echo $__env->make('partials.sidebar.user.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    <?php endif; ?>

    
    <div class="row">
        <?php if (isset($component)) { $__componentOriginal7b5dcffd1510acfd3730d872c2d794f9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b5dcffd1510acfd3730d872c2d794f9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action-charter-table','data' => ['actionCharters' => $action_charters,'loi' => $loi]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-charter-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action_charters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action_charters),'loi' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loi)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b5dcffd1510acfd3730d872c2d794f9)): ?>
<?php $attributes = $__attributesOriginal7b5dcffd1510acfd3730d872c2d794f9; ?>
<?php unset($__attributesOriginal7b5dcffd1510acfd3730d872c2d794f9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b5dcffd1510acfd3730d872c2d794f9)): ?>
<?php $component = $__componentOriginal7b5dcffd1510acfd3730d872c2d794f9; ?>
<?php unset($__componentOriginal7b5dcffd1510acfd3730d872c2d794f9); ?>
<?php endif; ?>  
    </div>
    <?php echo e($action_charters->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/action_charter/index.blade.php ENDPATH**/ ?>