<x-master title="Profile page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i> {{ __('messages.edit_profile') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                             <div class="col-md-6">
                                @if($profile->image)
                                    <img src="{{ asset('storage/'.$profile->image) }}" alt="Profile Image" class="rounded-circle" width="100" height="100">
                                @else
                                    <p>{{ __('messages.no_profile_image') }}</p>
                                @endif
                        </div>
                        {{--  
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image de profil</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            --}}
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">{{ __('messages.last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name',$profile->last_name) }}" placeholder="{{ __('messages.last_name_placeholder') }}">
                                @error('last_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="first_name" class="form-label">{{ __('messages.first_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name',$profile->first_name) }}" placeholder="{{ __('messages.first_name_placeholder') }}">
                                @error('first_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$profile->email) }}" placeholder="{{ __('messages.email_placeholder') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">{{ __('messages.password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" value="initialpassword" class="form-control" id="password" name="password" placeholder="********">
                                </div>
                                @error('password')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">{{ __('messages.password_confirmation') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" value="initialpassword" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="is_admin" class="form-label">{{ __('messages.role') }}</label>
                                <select name="is_admin" id="is_admin" class="form-select">
                                    <option value="1" {{ old('is_admin', $profile->is_admin) == 1 ? 'selected' : '' }}>{{ __('messages.admin') }}</option>
                                    <option value="0" {{ old('is_admin', $profile->is_admin) == 0 ? 'selected' : '' }}>{{ __('messages.user') }}</option>
                                </select>
                                @error('is_admin')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="is_active" class="form-label">{{ __('messages.status') }}</label>
                                <select name="is_active" id="is_active" class="form-select">
                                    <option value="1" {{ old('is_active', $profile->is_active) == 1 ? 'selected' : '' }}>{{ __('messages.active') }}</option>
                                    <option value="0" {{ old('is_active', $profile->is_active) == 0 ? 'selected' : '' }}>{{ __('messages.inactive') }}</option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">

                                  <label for="gouvernorat_id" class="form-label">{{ __('messages.governorate') }}</label>
                                
                                <select name="gouvernorat_id" id="gouvernorat_id" 
                                        class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                                    <option value="" >{{ __('messages.select_governorate') }}</option>
                                    @foreach($gouvernorats as $gouvernorat)
                                        <option value="{{ $gouvernorat->id }}" 
                                            {{ old('gouvernorat_id',$profile->gouvernorat_id) == $gouvernorat->id ? 'selected' : '' }}>
                                            {{ $gouvernorat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gouvernorat_id')
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
