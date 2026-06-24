<!-- Users Table -->
<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users me-2"></i>{{ __('messages.users_list') }} ({{ $profiles->count() }})
  </h5>
  <span class="text-muted small">

            <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('profile.create') }}"> <i class="bi bi-plus-lg me-2"></i>{{ __('messages.add_user') }} </a>
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
            {{--
            <th scope="col">{{ __('messages.image') }}</th>
            --}}
            <th scope="col">{{ __('messages.last_name') }}</th>
            <th scope="col">{{ __('messages.first_name') }}</th>
            <th scope="col">{{ __('messages.email') }}</th>
            <th scope="col">{{ __('messages.gouvernorat') }}</th>
            <th scope="col">{{ __('messages.status') }}</th>
            <th scope="col">{{ __('messages.role') }}</th>
            <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
          </tr>
        </thead>
        <tbody class="table-modern">
          @foreach($profiles as $index => $profile)
          <tr>
            <td>{{ $profile->is_active ? '✅' : '❌' }}</td>
           {{--  
            <td>
                <img src="{{ asset('storage/'.$profile->image) }}" alt="User Image" class="rounded-circle" width="40" height="40">
              </td>
           --}}
              <td>{{ $profile->last_name }}</td>
            <td>{{ $profile->first_name }}</td>
            <td>{{ $profile->email }}</td>
            <td>
              <span class=" justify-content-center badge bg-info">
                {{ $profile->gouvernorat->name ?? __('messages.not_assigned') }}
              </span>
            </td>
            <td>
              <span class="form-check form-switch" style="cursor: pointer;">
                <span class="badge {{ $profile->is_active ? 'bg-success' : 'bg-danger' }} toggle-status-btn" 
                      data-id="{{ $profile->id }}" 
                      data-name="{{ $profile->first_name }}"
                      data-status="{{ $profile->is_active ? __('messages.active') : __('messages.inactive') }}">
                  {{ $profile->is_active ? __('messages.deactivate') : __('messages.activate') }}
                </span>
              </span>
            </td>
            <td>
              @if ($profile->is_admin)
                <span class="badge bg-primary">{{ __('messages.admin') }}</span>
              @else
                <span class="badge bg-secondary">{{ __('messages.user') }}</span>
              @endif
            </td>
            <td class="text-center">
              <form action="{{ route('profile.edit', $profile->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>

              <!-- Delete -->
              {{--<form action="{{ route('profile.destroy', $profile->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>--}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<x-delete />
