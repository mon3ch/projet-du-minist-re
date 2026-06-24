<x-master title="Gouvernorat page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i> {{ __('messages.add_nature_projet') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('nature_projet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <!-- Nom -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('messages.nature_projet_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('messages.nature_projet_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        <!-- Submit -->
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fa-solid fa-save me-1"></i>{{ __('messages.save') }}
                            </button>
                            {{-- 
                            <a href="/gouvernorat/create" class="btn btn-secondary px-4">
                                <i class="fa-solid fa-arrow-left me-1"></i> {{ __('messages.cancel') }}
                            </a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
