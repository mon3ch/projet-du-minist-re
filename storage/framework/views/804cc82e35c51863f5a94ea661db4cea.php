<!-- Users Table -->
<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users me-2"></i><?php echo e(__('messages.users_list')); ?> (<?php echo e($profiles->count()); ?>)
  </h5>
  <span class="text-muted small">

            <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="<?php echo e(route('profile.create')); ?>"> <i class="bi bi-plus-lg me-2"></i><?php echo e(__('messages.add_user')); ?> </a>
        </button>
  </span>
</div>

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="table-responsive">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <th scope="col"></th>
            
            <th scope="col"><?php echo e(__('messages.last_name')); ?></th>
            <th scope="col"><?php echo e(__('messages.first_name')); ?></th>
            <th scope="col"><?php echo e(__('messages.email')); ?></th>
            <th scope="col"><?php echo e(__('messages.gouvernorat')); ?></th>
            <th scope="col"><?php echo e(__('messages.status')); ?></th>
            <th scope="col"><?php echo e(__('messages.role')); ?></th>
            <th scope="col" class="text-center"><?php echo e(__('messages.actions')); ?></th>
          </tr>
        </thead>
        <tbody class="table-modern">
          <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($profile->is_active ? '✅' : '❌'); ?></td>
           
              <td><?php echo e($profile->last_name); ?></td>
            <td><?php echo e($profile->first_name); ?></td>
            <td><?php echo e($profile->email); ?></td>
            <td>
              <span class=" justify-content-center badge bg-info">
                <?php echo e($profile->gouvernorat->name ?? __('messages.not_assigned')); ?>

              </span>
            </td>
            <td>
              <span class="form-check form-switch" style="cursor: pointer;">
                <span class="badge <?php echo e($profile->is_active ? 'bg-success' : 'bg-danger'); ?> toggle-status-btn" 
                      data-id="<?php echo e($profile->id); ?>" 
                      data-name="<?php echo e($profile->first_name); ?>"
                      data-status="<?php echo e($profile->is_active ? __('messages.active') : __('messages.inactive')); ?>">
                  <?php echo e($profile->is_active ? __('messages.deactivate') : __('messages.activate')); ?>

                </span>
              </span>
            </td>
            <td>
              <?php if($profile->is_admin): ?>
                <span class="badge bg-primary"><?php echo e(__('messages.admin')); ?></span>
              <?php else: ?>
                <span class="badge bg-secondary"><?php echo e(__('messages.user')); ?></span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <form action="<?php echo e(route('profile.edit', $profile->id)); ?>" method="GET" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>

              <!-- Delete -->
              
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
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/profile-table.blade.php ENDPATH**/ ?>