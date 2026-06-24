<x-master title="Gouvernorat page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">  {{ __('messages.edit_programme') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('programme.update',$programme->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('messages.programme_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$programme->name) }}" placeholder="{{ __('messages.programme_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fa-solid fa-save me-1"></i> {{ __('messages.save') }}
                            </button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
