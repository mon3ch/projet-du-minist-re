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
         <?php if (isset($component)) { $__componentOriginalf9f5dc710da53624028c21930d6447f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9f5dc710da53624028c21930d6447f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.quatre_analyses-table','data' => ['quatreAnalyses' => $quatre_analyses,'actionCharter' => $action_charter,'loi' => $loi]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('quatre_analyses-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['quatre_analyses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($quatre_analyses),'action_charter' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action_charter),'loi' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loi)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9f5dc710da53624028c21930d6447f3)): ?>
<?php $attributes = $__attributesOriginalf9f5dc710da53624028c21930d6447f3; ?>
<?php unset($__attributesOriginalf9f5dc710da53624028c21930d6447f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9f5dc710da53624028c21930d6447f3)): ?>
<?php $component = $__componentOriginalf9f5dc710da53624028c21930d6447f3; ?>
<?php unset($__componentOriginalf9f5dc710da53624028c21930d6447f3); ?>
<?php endif; ?>
    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/quatre_analyses/index.blade.php ENDPATH**/ ?>