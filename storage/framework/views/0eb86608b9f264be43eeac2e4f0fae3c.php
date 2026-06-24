

  <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container-fluid">
            <!-- Sidebar Toggle Button (Mobile) -->
      <button class="btn btn-outline-primary me-3 toggle-sidebar" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
      </button>
      
                 
      <div class="ms-auto d-flex align-items-center">
        <!-- Switch Dark/Light -->
        <button class="btn btn-outline-secondary me-3" id="themeToggle">
          <i class="fa-solid fa-moon"></i>
        </button>
        <div class="dropdown">
          <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo e(asset('storage/' . Auth::user()->image)); ?>" style="width: 30px" class="rounded-circle me-2" alt="Admin">
            <span class="fw-semibold" style="color: #f0d7d7"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item text-danger" href="<?php echo e(route('logout')); ?>"><i class="fa-solid fa-right-from-bracket"></i> <?php echo e(__('messages.logout')); ?> </a></li>
            <li><hr></li>
             <li><a class="dropdown-item text-danger" href="/lang/ar"> العربية</a></li>
            <li><a class="dropdown-item text-danger" href="/lang/fr"> Français</a></li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/partials/nav.blade.php ENDPATH**/ ?>