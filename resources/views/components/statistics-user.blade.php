<!-- statistics -->
@props(['type'])

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

<section class="container my-4">

<center>

    <!-- Statistiques -->
       
   <br>
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

      <div class="soft-card p-3 h-100">
        <h5 class="mb-3">{{ __('messages.statistics') }}</h5>              
        <button class="btn btn-outline-secondary quick-btn" >
                          <a class="nav-link" href="{{ route('projet.create') }}"> 

          <i class="bi bi-folder-plus me-2"></i> {{ __('messages.new_project') }} </a></button>
<br>
          
          <div class="col-6">
            <div class="p-3 bg-light rounded-4 text-center">
              <div class="text-muted small">{{ __('messages.projects') }}</div>
              <div class="display-6 fw-bold count-up" data-target="0">0</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

</center>
 
</section>
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
