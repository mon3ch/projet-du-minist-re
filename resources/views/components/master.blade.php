@props(['title'])
<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivie des projets | {{$title}} </title>
    <link rel="icon" href="{{ asset('storage/logo/icon.png') }}" type="image/x-icon" />

    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/ltr.css') }}">
    @endif

    
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
  .soft-card { border: 1px solid #eee; border-radius: 1rem; transition: transform .25s ease, box-shadow .25s ease; }
  .soft-card:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,.08); }
  .quick-btn { border-radius: 999px; padding: .75rem 1.1rem; }
  .timeline { border-left: 2px dashed #e5e7eb; margin-left: .5rem; padding-left: 1rem; }
  .timeline .dot { width: 10px; height: 10px; border-radius: 50%; background:#0d6efd; display:inline-block; margin-right:.5rem; }
  @media (max-width: 576px) { .table-responsive { border-radius: .75rem; overflow: hidden; } }
</style>

  <style>
    
  .table-responsive {
    max-height: 500px; 
    overflow-x: auto;  
    overflow-y: auto;   
  }
    .navbar {
      background: #15034c !important;
      border-bottom: 1px solid #e0e0e0;
    }
    .sidebar {
      width: 240px;
      position: fixed;
      top: 50px;
      left: 0;
      height: 100%;
      background: #f8f9fa;
      border-right: 1px solid #e0e0e0;
      padding-top: 1rem;
      transition: all 0.3s ease;
    }
    .sidebar a {
      color: #495057;
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.2s;
      border-radius: 6px;
      margin: 4px 8px;
    }
    .sidebar a:hover, .sidebar a.active {
      background: #e9ecef;
      color: #0d6efd;
    }
    .content {
      margin-left: 240px;
      margin-top: 23px;
      padding: 20px;
    }
    .card-custom {
      border: none;
      border-radius: 12px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-custom:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .table td img {
      width: 40px;
      height: 40px;
      object-fit: cover;
      border-radius: 50%;
    }
    body.dark {
      background-color: #1e1e2f;
      color: #f1f1f1;
    }
    body.dark .navbar {
      background: #2c2c3e !important;
      border-color: #3a3a4a;
    }
    body.dark .sidebar {
      background: #2c2c3e;
      border-color: #3a3a4a;
    }
    body.dark .sidebar a {
      color: #ddd;
    }
    body.dark .sidebar a:hover, body.dark .sidebar a.active {
      background: #3a3a4a;
      color: #0d6efd;
    }
    body.dark .card-custom, 
    body.dark .card, 
    body.dark .table, 
    body.dark .modal-content {
      background: #2c2c3e !important;
      color: #f1f1f1 !important;
      border-color: #444;
    }
    body.dark .table-light {
      background: #3a3a4a !important;
      color: #f1f1f1 !important;
    }

    @media (max-width: 991px) {
      .sidebar {
        left: -240px;
      }
      .sidebar.active {
        left: 0;
        z-index: 1050;
      }
      .content {
        margin-left: 0;
      }
      .toggle-sidebar {
        display: block !important;
      }
    }
    .toggle-sidebar {
      display: none;
    }

    .modal.fade .modal-dialog {
  transform: translateY(-30px);
  opacity: 0;
  transition: all 0.3s ease-in-out;
}


.modal.show .modal-dialog {
  transform: translateY(0);
  opacity: 1;
}

.modal-backdrop {
  position: fixed !important;
  top: 0;
  left: 0;
  width: 100vw !important;
  height: 100vh !important;
  background-color: rgba(0, 0, 0, 0.5) !important;
  z-index: 1040 !important; 
}
.table-modern {
  border-collapse: separate;
  border-spacing: 0 10px;
}
.table-modern thead {
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.table-modern tbody tr {
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  transition: all 0.2s ease;
  border-radius: 10px;
}
.table-modern tbody tr:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.table-modern td, .table-modern th {
  border: none;
  padding: 14px 16px;
  vertical-align: middle;
}
.action-btn {
  border-radius: 50%;
  width: 34px;
  height: 34px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 0 3px;
  transition: 0.2s;
}

.action-btn:hover {
  transform: scale(1.1);
}

.table-modern {
  border-collapse: separate;
  border-spacing: 0 12px;
}

.table-modern thead {
  font-size: 0.85rem;
  text-transform: uppercase;
  color: #6c757d;
}

.table-modern tbody tr {

  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  border-radius: 12px;
  transition: all 0.25s ease;
}

.table-modern tbody tr:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.table-modern td, .table-modern th {
  border: none;
  padding: 16px;
  vertical-align: middle;
}

.action-btn {
  border-radius: 50%;
  width: 36px;
  height: 36px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 0 4px;
  transition: 0.25s;
}

.action-btn:hover {
  transform: scale(1.15);
}
    .fade-in {
        animation: fadeInUp 0.6s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn {
        transition: 0.3s;
    }
    .btn:hover {
        transform: translateY(-2px);
    }
    
    @keyframes zoomInOut {
    0% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.1); opacity: 1; }
    100% { transform: scale(1); opacity: 0.7; }
    }

    .zoom-anim {
        display: inline-block;
        animation: zoomInOut 2s infinite;
    }
  </style>

</head>
<body>
    @include('partials.nav');
        <div class="m-3">
        <div class="row my-3" style="padding-top:100px; padding-left: 279px;">
            @include('partials.flashbag')

        </div>
        {{$slot}}
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
const sidebarToggle = document.getElementById("sidebarToggle");
const sidebar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("active");
});
    const themeToggle = document.getElementById("themeToggle");
    const body = document.body;

    if(localStorage.getItem("theme") === "dark"){
      body.classList.add("dark");
      themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
    }

    themeToggle.addEventListener("click", () => {
      body.classList.toggle("dark");
      if(body.classList.contains("dark")){
        localStorage.setItem("theme", "dark");
        themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
      } else {
        localStorage.setItem("theme", "light");
        themeToggle.innerHTML = '<i class="fa-solid fa-moon"></i>';
      }
    });
  </script>


{{-- new style --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 600, once: true });
  const counters = document.querySelectorAll('.count-up');
  const io = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !entry.target.dataset.done) {
        animateCount(entry.target);
        entry.target.dataset.done = "1";
      }
    });
  }, { threshold: 0.6 });
  counters.forEach(c => io.observe(c));

  function animateCount(el) {
    const target = +el.dataset.target || 0;
    const duration = 900;
    const start = 0;
    const startTime = performance.now();
    function tick(now) {
      const p = Math.min((now - startTime) / duration, 1);
      el.textContent = Math.floor(start + (target - start) * p);
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
</script>

<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    tippy('[data-tippy-content]', {
        theme: 'light-border',
        animation: 'shift-away', 
        arrow: true,
        delay: [100, 100],
        maxWidth: 200
    });
});
</script>
</body>
</html>
