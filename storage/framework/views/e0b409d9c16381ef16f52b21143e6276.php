
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
        <?php if (isset($component)) { $__componentOriginala4d1e7ab49e3c06409c3c506a7264a7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4d1e7ab49e3c06409c3c506a7264a7b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.etablissement-rh-table','data' => ['etablissementRhs' => $etablissement_rhs,'actionCharter' => $action_charter]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('etablissement-rh-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etablissement_rhs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($etablissement_rhs),'action_charter' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action_charter)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4d1e7ab49e3c06409c3c506a7264a7b)): ?>
<?php $attributes = $__attributesOriginala4d1e7ab49e3c06409c3c506a7264a7b; ?>
<?php unset($__attributesOriginala4d1e7ab49e3c06409c3c506a7264a7b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4d1e7ab49e3c06409c3c506a7264a7b)): ?>
<?php $component = $__componentOriginala4d1e7ab49e3c06409c3c506a7264a7b; ?>
<?php unset($__componentOriginala4d1e7ab49e3c06409c3c506a7264a7b); ?>
<?php endif; ?> 
    </div>
    <?php echo e($etablissement_rhs->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/etablissement_rh/index.blade.php ENDPATH**/ ?>