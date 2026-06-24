<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-map-location-dot me-2"></i>{{ __('messages.nature_projets_list') }} ({{ $natureProjets->count() }})
  </h5>
  <span class="text-muted small">


                <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('nature_projet.create') }}"> <i class="fa-solid fa-plus me-1"></i>{{ __('messages.add_nature_projet') }} </a>
        </button>
  </span>
</div>

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="table-responsive">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <th>id</th>
            <th scope="col">{{ __('messages.nature_projet') }}</th>
            <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
          </tr>
        </thead>
        <tbody class="table-modern">
          @foreach($natureProjets as $index => $nature_projet)
          <tr>
            <td>{{ $nature_projet->id }}</td>
            <td>{{ $nature_projet->name }}</td>
            <td class="text-center">
              <form action="{{ route('nature_projet.edit', $nature_projet->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>
              <form action="{{ route('nature_projet.destroy', $nature_projet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<x-delete />
