<x-master title="Etablissement page">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fa-solid fa-school"></i> {{ __('messages.add_etablissement') }} </h4>
                </div>
        <div class="container mt-4">
   <div class="soft-card p-3 mb-4" data-aos="fade-up">

                <div class="card-body p-4">
                    <form action="{{ route('names_etablissements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="name" class="form-label">{{ __('messages.etablissement_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('messages.etablissement_name_placeholder') }}">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="etablissement_id" class="form-label"><span class="text-danger">*</span> {{ __('messages.type_etablissement') }}</label>
                                <select name="etablissement_id" id="etablissement_id"
                                    class="form-select shadow-sm border-primary select2">
                                    <option value="">{{ __('messages.select_type_etablissement') }}</option>
                                    @foreach($etablissements as $etablissement)
                                        <option value="{{ $etablissement->id }}" {{ old('etablissement_id') == $etablissement->id ? 'selected' : '' }}>
                                            {{ $etablissement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('etablissement_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="programme_name" class="form-label">---</label>
                                <input type="text" id="programme_name" value="{{ __('messages.programme') }}" class="form-control shadow-sm border-primary" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="gouvernorat_id" class="form-label"><span class="text-danger">*</span> {{ __('messages.gouvernorat') }}</label>
                                <select name="gouvernorat_id" id="gouvernorat_id" 
                                    class="form-select shadow-sm border-primary select2">
                                    <option value="">{{ __('messages.select_governorate') }}</option>
                                    @foreach($gouvernorats as $gouvernorat)
                                        <option value="{{ $gouvernorat->id }}" {{ old('gouvernorat_id') == $gouvernorat->id ? 'selected' : '' }}>
                                            {{ $gouvernorat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gouvernorat_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
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
<script>
document.getElementById('etablissement_id').addEventListener('change', function() {
    let etablissementId = this.value;
    let programmeNameInput = document.getElementById('programme_name');

    programmeNameInput.value = ''; 

    if (etablissementId) {
        fetch(`/etablissement/${etablissementId}/programme`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    programmeNameInput.value = data.programme.name;
                } else {
                    programmeNameInput.value = 'Aucun programme disponible';
                }
            })
            .catch(() => {
                programmeNameInput.value = 'Erreur !';
            });
    } else {
        programmeNameInput.value = '';
    }
});
</script>


</x-master>
