<x-master title="Gouvernorat page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">  {{ __('messages.edit_type_etablissement') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('etablissement.update',$etablissement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('messages.type_etablissement_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$etablissement->name) }}" placeholder="{{ __('messages.type_etablissement_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col-md-6">
                            <select name="programme_id" id="programme_id" class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                                <option value="">{{ __('messages.select_programme') }}</option>
                                @foreach($programmes as $programme)
                                    <option value="{{ $programme->id }}" 
                                        {{ old('programme_id', $etablissement->programme_id) == $programme->id ? 'selected' : '' }}>
                                        {{ $programme->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('programme_id')
                               <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                        </div>
                                
                        <!-- Submit -->
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
