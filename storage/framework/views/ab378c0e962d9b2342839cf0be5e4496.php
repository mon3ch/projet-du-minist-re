<style>
.sidebar {
    max-height: 100vh; 
    overflow-y: auto; 
    overflow-x: hidden; 
}
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #555;
}
  </style>

  <div class="sidebar <?php echo e(app()->getLocale() == 'ar' ? 'sidebar-rtl' : 'sidebar-ltr'); ?>">
    <img src="<?php echo e(asset('storage/logo/logo.png')); ?>" 
        style="margin-bottom: 12px;"
                 alt="Login illustration" 
                 class="img-fluid mt-4 rounded-3 ">
    <a href="/dashbord" class="active"><?php echo e(__('messages.dashboard')); ?> </a>
    <a href="<?php echo e(route('profile.index')); ?>" class="active"><?php echo e(__('messages.users')); ?> </a>
    <hr> 
    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu" role="button">
       <?php echo e(__('messages.gouvernorat')); ?>  & <?php echo e(__('messages.delegation')); ?>

    </a>
    <div class="collapse ps-3" id="statsMenu">
      <a href="<?php echo e(route('gouvernorat.index')); ?>">- <?php echo e(__('messages.gouvernorat')); ?> </a>
      <a href="<?php echo e(route('delegation.index')); ?>">- <?php echo e(__('messages.delegation')); ?> </a>
    </div>

    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu2" role="button">
      <?php echo e(__('messages.programme')); ?>  & <?php echo e(__('messages.etablissement')); ?>

    </a>
    <div class="collapse ps-3" id="statsMenu2">
       <a href="<?php echo e(route('programme.index')); ?>">- <?php echo e(__('messages.programme')); ?> </a>
    <a href="<?php echo e(route('etablissement.index')); ?>">- <?php echo e(__('messages.type_etablissement')); ?> </a>
    <a href="<?php echo e(route('names_etablissements.index')); ?>">- <?php echo e(__('messages.etablissement')); ?> </a>
    </div>


    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu3" role="button">
      <?php echo e(__('messages.nature_projet')); ?>  & <?php echo e(__('messages.type_projet')); ?>

    </a>
    <div class="collapse ps-3" id="statsMenu3">
      <a href="<?php echo e(route('nature_projet.index')); ?>">- <?php echo e(__('messages.nature_projet')); ?> </a>
      <a href="<?php echo e(route('type_projet.index')); ?>">- <?php echo e(__('messages.type_projet')); ?> </a>
    </div>

    <a href="<?php echo e(route('financement.index')); ?>"><?php echo e(__('messages.financement')); ?> </a>

    <a href="<?php echo e(route('projet.index')); ?>"><?php echo e(__('messages.project')); ?> </a>
        <a href=""> <hr> </a>
    <a href="<?php echo e(route('loi.index')); ?>">القانون</a>
    <a href="<?php echo e(route('action_charter.index')); ?>">ميثاق التصرف الجهوي </a>
            <a href=""> <hr> </a>
 </div>


  <?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/partials/sidebar/admin/sidebar.blade.php ENDPATH**/ ?>