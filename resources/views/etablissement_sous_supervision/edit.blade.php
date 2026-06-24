<x-master title="تعديل المؤسسة">

    <div class="content action-charter">

        @include('components.action-charter-text')
        @if (Auth::user()->is_admin)
            @include('partials.sidebar.admin.sidebar')
        @else
            @include('partials.sidebar.user.sidebar')
        @endif

        <div class="container mt-4">
            <div class="charter-box" data-aos="fade-up">

                <div class="charter-title text-center">
                    <h1>تعديل المؤسسة تحت الإشراف</h1>
                </div>

                <table class="table table-bordered mt-4">
                    <tr>
                        <th>اسم البرنامج </th>
                        <th>رئيس البرنامج</th>
                        <th>الولاية</th>
                        <th>استراتيجية البرنامج</th>
                    </tr>
                    <tr>
                        <td>{{ $action_charter->programme->name }}</td>
                        <td>{{ $action_charter->name_responsable_programme }}</td>
                        <td>{{ $action_charter->gouvernorat->name ?? '—' }}</td>
                        <td>{{ $action_charter->strategie_programme }}</td>
                    </tr>
                </table>
                <hr>

                <form action="{{ route('etablissement_sous_supervision.update', $etablissement_sous_supervision->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="action_charter_id" value="{{ $action_charter->id }}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">اسم المؤسسة</label>
                            <select name="name_etablissement_id" class="form-select" required>
                                <option value="">-- اختر المؤسسة --</option>
                                @foreach($names_etablissements as $name)
                                    <option value="{{ $name->id }}"
                                        {{ $name->id == $etablissement_sous_supervision->name_etablissement_id ? 'selected' : '' }}>
                                        {{ $name->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">نوع المؤسسة</label>
                            <select name="is_public" id="is_public" class="form-select">
                                <option value="1" {{ $etablissement_sous_supervision->is_public ? 'selected' : '' }}>عمومية</option>
                                <option value="0" {{ !$etablissement_sous_supervision->is_public ? 'selected' : '' }}>خاصة</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">الفئة المستهدفة</label>
                            <input type="text" name="target_category" class="form-control"
                                value="{{ old('target_category', $etablissement_sous_supervision->target_category) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">المسؤول على تسييرها</label>
                            <input type="text" name="manager_name" class="form-control"
                                value="{{ old('manager_name', $etablissement_sous_supervision->manager_name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">العنوان</label>
                            <input type="text" name="adresse" class="form-control"
                                value="{{ old('adresse', $etablissement_sous_supervision->adresse) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3" id="eventRef" style="{{ $etablissement_sous_supervision->is_public ? 'display:none' : 'display:block' }}">
                        <div class="col-md-6">
                            <label class="form-label">مرجع الإحداث</label>
                            <input type="text" name="event_reference" class="form-control"
                                value="{{ old('event_reference', $etablissement_sous_supervision->event_reference) }}">
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">ذكور</label>
                            <input type="number" name="number_male" class="form-control" min="0"
                                value="{{ old('number_male', $etablissement_sous_supervision->number_male) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">إناث</label>
                            <input type="number" name="number_female" class="form-control" min="0"
                                value="{{ old('number_female', $etablissement_sous_supervision->number_female) }}">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fa-solid fa-save me-1"></i> تحديث
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('is_public').addEventListener('change', function () {
            document.getElementById('eventRef').style.display =
                this.value === '0' ? 'block' : 'none';
        });
    </script>

</x-master>
