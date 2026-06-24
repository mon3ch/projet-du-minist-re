<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users-gear me-2"></i>{{ __('messages.type_projet_list') }} ({{ $typeProjet->count() }})
  </h5>
  <span class="text-muted small">

            <button class="btn btn-primary quick-btn">
                        <a class="nav-link" href="{{ route("type_projet.create") }}"> <i class="fa-solid fa-plus me-1"></i> {{ __('messages.add_type_projet') }}
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
            <th scope="col">{{ __('messages.type_projet_name') }}</th>
            <th scope="col">{{ __('messages.nature_projet') }}</th>
            <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
          </tr>
        </thead>
        <tbody class="table-modern">
          @foreach($typeProjet as $index => $type_projet)
          <tr>
            <td>{{ $type_projet->id}}</td>
            <td>{{ $type_projet->name }}</td>
            <td>
              <span class="badge bg-info text-dark">
                {{ $type_projet->nature_projet->name ?? '—' }}
              </span>
            </td>
            <td class="text-center">
              <form action="{{ route('type_projet.edit', $type_projet->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>
              <form action="{{ route('type_projet.destroy', $type_projet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
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
