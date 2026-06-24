
<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Gestion nature de projet']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Gestion nature de projet']); ?>
  <div class="content">

    
    <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
            <?php if (isset($component)) { $__componentOriginalc68eaa89022b35598aa1ef45b3afc413 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc68eaa89022b35598aa1ef45b3afc413 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nature-projet-table','data' => ['natureProjets' => $nature_projets]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nature-projet-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['natureProjets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nature_projets)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc68eaa89022b35598aa1ef45b3afc413)): ?>
<?php $attributes = $__attributesOriginalc68eaa89022b35598aa1ef45b3afc413; ?>
<?php unset($__attributesOriginalc68eaa89022b35598aa1ef45b3afc413); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc68eaa89022b35598aa1ef45b3afc413)): ?>
<?php $component = $__componentOriginalc68eaa89022b35598aa1ef45b3afc413; ?>
<?php unset($__componentOriginalc68eaa89022b35598aa1ef45b3afc413); ?>
<?php endif; ?>
    </div>
    <?php echo e($nature_projets->links()); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?><?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/nature_projet/index.blade.php ENDPATH**/ ?>