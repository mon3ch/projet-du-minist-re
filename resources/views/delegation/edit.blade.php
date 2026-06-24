<x-master title="Gouvernorat page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">  {{ __('messages.edit_delegation') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('delegation.update',$delegation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                            <!-- Nom -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">{{ __('messages.delegation_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$delegation->name) }}" placeholder="{{ __('messages.delegation_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                           
                                <label for="gouvernorat_id" class="form-label">{{ __('messages.governorate') }}</label>
                                
                                <select name="gouvernorat_id" id="gouvernorat_id" 
                                        class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                                    <option value="" >{{ __('messages.select_governorate') }}</option>
                                    @foreach($gouvernorats as $gouvernorat)
                                        <option value="{{ $gouvernorat->id }}" 
                                            {{ old('gouvernorat_id',$delegation->gouvernorat_id) == $gouvernorat->id ? 'selected' : '' }}>
                                            {{ $gouvernorat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gouvernorat_id')
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
