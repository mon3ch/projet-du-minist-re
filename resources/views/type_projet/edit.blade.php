<x-master title="Gouvernorat page">
    <div class="content">
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">  {{ __('messages.edit_type_projet') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('type_projet.update',$type_projet->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('messages.type_projet_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$type_projet->name) }}" placeholder="{{ __('messages.type_projet_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nature_projet_id" class="form-label">{{ __('messages.nature_projet') }}</label>
                                
                                <select name="nature_projet_id" id="nature_projet_id" 
                                        class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                                    <option value="" >{{ __('messages.select_nature_projet') }}</option>
                                    @foreach($nature_projets as $nature_projet)
                                        <option value="{{ $nature_projet->id }}" 
                                            {{ old('nature_projet_id',$type_projet->nature_projet_id) == $nature_projet->id ? 'selected' : '' }}>
                                            {{ $nature_projet->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nature_projet_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fa-solid fa-save me-1"></i> {{ __('messages.save') }}
                            </button>
                           
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
