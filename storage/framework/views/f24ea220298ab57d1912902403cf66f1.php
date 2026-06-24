<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['action_charters']));

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

foreach (array_filter((['action_charters']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
     ميثاق التصرف الجهوي
  </h5>
  <span class="text-muted small">

    <?php if(Auth::user()->is_admin): ?>
         <button class="btn btn-primary quick-btn">
    <a href="<?php echo e(route('action_charter.create')); ?>" class="text-white text-decoration-none">
      <i class="fa-solid fa-plus me-2"></i> إضافة ميثاق تصرف جهوي
          </a>
        </button>
  
    <?php endif; ?>
           
  </span>
</div>
<?php echo $__env->make('components.action-charter-text', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th scope="col">  رئيس البرنامج</th>
            <th scope="col">ممثلا في شخص رئيسه </th>
            <th scope="col">الولاية</th>  
            <th scope="col">استراتيجية البرنامج</th> 
            <th scope="col">الاجراءت</th>  
          </tr>
        </thead>
        <tbody class="table-modern">
          <?php $__currentLoopData = $action_charters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $action_charter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($action_charter->id); ?></td>
            <td><?php echo e($action_charter->name_responsable_programme); ?></td>
            <td><?php echo e($action_charter->name_programmer); ?></td>
            
              <td>
              <span class="badge bg-info text-dark">
                <?php echo e($action_charter->gouvernorat->name ?? '—'); ?>

              </span>
            </td>
            <td><?php echo e($action_charter->strategie_programme); ?></td> 
            
            <td class="text-center">
              <div class="dropdown">
                <button  class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  اجراءت
                </button>
                <ul class="dropdown-menu">
                  <?php if( Auth::user()->is_admin ): ?>
                    <li>
                    <form action="<?php echo e(route('action_charter.edit', $action_charter->id)); ?>" method="GET" class="d-inline">
                      <?php echo csrf_field(); ?>
                      <button type="submit" style="width: -webkit-fill-available;" class="btn btn-sm btn-outline-primary me-1">
                        تعديل ميثاق التصرف <i class="fa-solid fa-pen"></i>
                      </button>
                    </form>
                  </li>
                  <?php endif; ?>                  
                  <li><a class="dropdown-item" href="<?php echo e(route('voiture_etablissement.indexByCharter', $action_charter->id)); ?>">  	وسائل النقل</a></li>
                  <li>
                    <a class="dropdown-item" href="<?php echo e(route('etablissement_sous_supervision.indexByCharter', $action_charter->id)); ?>">
                      المؤسسات تحت الإشراف
                  </a>
                  </li>
                  <li><a class="dropdown-item" href="<?php echo e(route('etablissement_rh.indexByCharter', $action_charter->id)); ?>">	توزيع الموارد البشرية بالمؤسسات تحت الإشراف  </a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('quatre_analyses.indexByCharter', $action_charter->id)); ?>">	التحليل الرباعي لواقع المندوبية   </a></li>
                
                </ul>
              
              <!-- Delete
              <form action="<?php echo e(route('action_charter.destroy', $action_charter->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('<?php echo e(__('messages.delete_question')); ?>')">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form> -->
            </div>
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
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/action-charter-table.blade.php ENDPATH**/ ?>