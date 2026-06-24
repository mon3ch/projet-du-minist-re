<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users-gear me-2"></i>{{ __('messages.type_etablissements_list') }} ({{ $etablissements->count() }})
  </h5>
  <span class="text-muted small">

        <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('etablissement.create') }}">        <i class="fa-solid fa-school me-1"></i>{{ __('messages.add_type_etablissement') }}
                 </a>
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
            <th scope="col">{{ __('messages.type_etablissement_name') }}</th>
             <th scope="col">{{ __('messages.programme') }}</th> 
            <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
          </tr>
        </thead>
        <tbody class="table-modern">
          @foreach($etablissements as $index => $etablissement)
          <tr>
            <td>{{ $etablissement->id }}</td>
            <td>{{ $etablissement->name }}</td>
            <td>
              {{ $etablissement->programme ? $etablissement->programme->name : '—' }}
            </td>
            <td class="text-center">
              <form action="{{ route('etablissement.edit', $etablissement->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>
              <form action="{{ route('etablissement.destroy', $etablissement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
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
