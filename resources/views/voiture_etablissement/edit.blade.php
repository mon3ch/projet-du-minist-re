<x-master title="Modifier Voiture">

    <div class="content action-charter">

        @include('components.action-charter-text')

        @if (Auth::user()->is_admin)
            @include('partials.sidebar.admin.sidebar')
        @else
            @include('partials.sidebar.user.sidebar')
        @endif

        <div class="container mt-4">
            <div class="charter-box" data-aos="fade-up">

                <div class="charter-title" style="text-align: center;">
                   <h1>وسائل النقل</h1>
                </div>

                <form action="{{ route('voiture_etablissement.update', $voiture_etablissement->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="action_charter_id" value="{{ $action_charter->id }}">
                    <input type="hidden" name="gouvernorat_id" value="{{ auth()->user()->gouvernorat_id }}">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">نوع السيارة</label>
                            <input type="text" name="type_voiture" class="form-control" required
                                   value="{{ old('type_voiture', $voiture_etablissement->type_voiture) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">الصنف</label>
                            <input type="text" name="categorie" class="form-control"
                                   value="{{ old('categorie', $voiture_etablissement->categorie) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">تاريخ أول استعمال</label>
                            <input type="date" name="date_premier_circulation" class="form-control"
                                   value="{{ old('date_premier_circulation', $voiture_etablissement->date_premier_circulation) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">اللوحة المنجمية</label>
                            <input type="text" name="matriculation" class="form-control"
                                   value="{{ old('matriculation', $voiture_etablissement->matriculation) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">المؤسسة</label>
                            <select name="name_etablissement_id" class="form-select" required>
                                <option value="">-- اختر المؤسسة --</option>
                                @foreach($names_etablissements as $name)
                                    <option value="{{ $name->id }}"
                                        {{ old('name_etablissement_id', $voiture_etablissement->name_etablissement_id) == $name->id ? 'selected' : '' }}>
                                        {{ $name->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-pen me-1"></i> تعديل
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-master>
