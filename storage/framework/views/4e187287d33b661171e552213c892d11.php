<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-map-location-dot me-2"></i><?php echo e(__('messages.governorates_list')); ?> (<?php echo e($gouvernorats->count()); ?>)
  </h5>
  <span class="text-muted small">


                <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="<?php echo e(route('gouvernorat.create')); ?>"> <i class="fa-solid fa-plus me-1"></i><?php echo e(__('messages.add_governorate')); ?> </a>
        </button>
  </span>
</div>

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="table-responsive">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <td>id</td>
            <th scope="col"><?php echo e(__('messages.governorate_name')); ?></th>
            <th scope="col" class="text-center"><?php echo e(__('messages.actions')); ?></th>
          </tr>
        </thead>
        <tbody class="table-modern">
          <?php $__currentLoopData = $gouvernorats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $gouvernorat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($gouvernorat->id); ?></td>
            <td><?php echo e($gouvernorat->name); ?></td>
            <td class="text-center">
              <!-- Edit -->
              <form action="<?php echo e(route('gouvernorat.edit', $gouvernorat->id)); ?>" method="GET" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>

              <!-- Delete -->
              <form action="<?php echo e(route('gouvernorat.destroy', $gouvernorat->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('<?php echo e(__('messages.delete_question')); ?>')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
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
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/gouvernorat-table.blade.php ENDPATH**/ ?>