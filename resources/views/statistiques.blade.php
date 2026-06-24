<x-master title="Projet page">
    <div class="content">
        {{-- Sidebar --}}
    
    @if (Auth::user()->is_admin)
        {{-- Include the sidebar partial --}}
        @include('partials.sidebar.admin.sidebar') 
    @else
        {{-- Include the sidebar partial --}}
        @include('partials.sidebar.user.sidebar') 
    @endif
@props(['type'])

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
  .soft-card { 
    border: 1px solid #eee; 
    border-radius: 1rem; 
    transition: transform .25s ease, box-shadow .25s ease; 
  }
  .soft-card:hover { 
    transform: translateY(-4px); 
    box-shadow: 0 12px 24px rgba(0,0,0,.08); 
  }
  .quick-btn { border-radius: 999px; padding: .75rem 1.1rem; }
  .timeline { border-left: 2px dashed #e5e7eb; margin-left: .5rem; padding-left: 1rem; }
  .timeline .dot { width: 10px; height: 10px; border-radius: 50%; background:#0d6efd; display:inline-block; margin-right:.5rem; }
  @media (max-width: 576px) { .table-responsive { border-radius: .75rem; overflow: hidden; } }
  #map { height: 400px; border-radius: 1rem; margin-top: 20px; }

</style>

<section class="container my-4">
  <div class="soft-card p-3 mb-4" data-aos="fade-up">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="m-0">{{ __('messages.quick_actions') }}</h5>
      <span class="text-muted small">{{ __('messages.quick_access') }}</span>
    </div>
    <div class="d-flex flex-wrap gap-2">
     
    @if (Auth::user()->is_admin)
      <button class="btn btn-primary quick-btn"><a class="nav-link" href="{{ route('profile.create') }}"><i class="bi bi-plus-lg me-2"></i>{{ __('messages.add_user') }}</a></button>
      
      <button class="btn  btn-outline-secondary quick-btn">
                <a class="nav-link" href="{{ route('profile.index') }}"> <i class="bi bi-people me-2"></i> {{ __('messages.view_users') }} </a>
      </button>

      <button class="btn  btn-outline-primary quick-btn">
                <a class="nav-link" href="{{ route('projet.create') }}"> <i class="bi bi-folder-plus me-2"></i> {{ __('messages.new_project') }} </a>
      </button>

      <button class="btn  btn-outline-success quick-btn">
                <a class="nav-link" href="{{ route('financement.create') }}"> <i class="bi bi-cash-coin me-2"></i> {{ __('messages.new_funding') }} </a>
      </button>
    @else
      <button class="btn  btn-outline-primary quick-btn">
        <a class="nav-link" href="{{ route('projet.create') }}"> <i class="bi bi-folder-plus me-2"></i> {{ __('messages.new_project') }} </a>
      </button>
    @endif

    </div>
  </div>

  <div class="row g-3">
    <div class="col-lg-6" data-aos="fade-up">
      <div class="soft-card p-3 h-100">
         <!-- Chart Gouvernorat -->
        <div class="col-md-12">
            <canvas id="gouvernoratChart"></canvas>
        </div>
        <div class="col-md-12">
            <canvas id="financementChart"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <div class="soft-card p-3 h-100">
        <div class="row g-3">
            @if (Auth::user()->is_admin)
            <h5 class="mb-3">{{ __('messages.statistics_users') }}</h5>

            <div class="col-6">
                <div class="p-3 bg-light rounded-4 text-center">
                <div class="text-muted small">{{ __('messages.total_users_active') }}</div>
                <div class="display-6 fw-bold count-up" data-target="{{ $totalProfilesactive }}">0</div>
                </div>
            </div> 

            <div class="col-6">
                <div class="p-3 bg-light rounded-4 text-center">
                <div class="text-muted small">{{ __('messages.total_users_inactive') }}</div>
                <div class="display-6 fw-bold count-up" data-target="{{ $totalProfilesinactive }}">0</div>
                </div>
            </div> 
          @endif
         <h5 class="mb-3">{{ __('messages.statistics_projects') }}</h5>

          <div class="col-6">
            <div class="p-3 bg-light rounded-4 text-center">
              <div class="text-muted small">{{ __('messages.projects') }}</div>
              <div class="display-6 fw-bold count-up" data-target="{{ $totalProjets }}">0</div>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 bg-light rounded-4 text-center">
              <div class="text-muted small">{{ __('messages.governorates') }}</div>
              <div class="display-6 fw-bold count-up" data-target="{{ $projetsParGouvernorat->count() }}">0</div>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 bg-light rounded-4 text-center">
              <div class="text-muted small">{{ __('messages.delegations') }}</div>
              <div class="display-6 fw-bold count-up" data-target="{{ $projetsParDelegation->count() }}">0</div>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 bg-light rounded-4 text-center">
              <div class="text-muted small">{{ __('messages.fundings') }}</div>
              <div class="display-6 fw-bold count-up" data-target="{{ $projetsParFinancement->count() }}">0</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="soft-card p-3 mt-4" data-aos="fade-up" data-aos-delay="200">
    <h5 class="mb-3"><i class="bi bi-geo-alt me-2"></i> خريطة المشاريع</h5>
    <div id="map"></div>
  </div>

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
    const startTime = performance.now();
    function tick(now) {
      const p = Math.min((now - startTime) / duration, 1);
      el.textContent = Math.floor(target * p);
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const gouvernoratLabels = @json(
        $projetsParGouvernorat->map(fn($item) => $item->name ?? 'Inconnu')
    );
    const gouvernoratData = @json($projetsParGouvernorat->pluck('total'));

    new Chart(document.getElementById('gouvernoratChart'), {
        type: 'bar',
        data: {
            labels: gouvernoratLabels,
            datasets: [{
                label: 'Projets par Gouvernorat',
                data: gouvernoratData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        }
    });

    const financementLabels = @json(
        $projetsParFinancement->map(fn($item) => $item->name ?? 'Inconnu')
    );

    const financementData = @json($projetsParFinancement->pluck('total'));

    new Chart(document.getElementById('financementChart'), {
        type: 'pie',
        data: {
            labels: financementLabels,
            datasets: [{
                label: 'Projets par Financement',
                data: financementData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                ]
            }]
        }
    });
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<div id="map" style="height: 500px;"></div>

<script>
    const map = L.map('map').setView([34.0, 10.0], 6);
    const streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
        attribution: '© OpenStreetMap' 
    }).addTo(map); 

    const satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles © Esri'
    });
    const baseLayers = {
        "خريطة عادية": streets,
        "خريطة القمر الصناعي": satellite

    };
    L.control.layers(baseLayers).addTo(map);
    const projets = @json($projets);

    projets.forEach(p => {
        const marker = L.circleMarker([p.latitude, p.longitude], { 
            color: 'red', 
            radius: 8, 
            fillColor: 'red', 
            fillOpacity: 0.8 
        }).addTo(map);

        marker.bindPopup(`<b>${p.nom_projet}</b><br>${p.description}<br><a href="https://www.google.com/maps/dir//${p.latitude},+${p.longitude}">التوجه إلى موقع المشروع
</a>`);
    });
</script>

</x-master>
