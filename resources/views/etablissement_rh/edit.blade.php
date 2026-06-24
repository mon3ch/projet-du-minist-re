<x-master title="programme page">

    <div class="content action-charter">

        @include('components.action-charter-text')

        {{-- Sidebar --}}
        @if (Auth::user()->is_admin)
            @include('partials.sidebar.admin.sidebar')
        @else
            @include('partials.sidebar.user.sidebar')
        @endif

        <div class="container mt-4">
            <div class="charter-box" data-aos="fade-up">

                <div class="charter-title text-center">
                    <h1> تعديل الموارد البشرية بالمؤسسات تحت الإشراف</h1>
                </div>

                <table class="table table-bordered mt-4">
                    <tr>
                        <th>اسم البرنامج</th>
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

                <form action="{{ route('etablissement_rh.update', $etablissement_rh->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="action_charter_id" value="{{ $action_charter->id }}">

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <label class="form-label">اسم المؤسسة</label>
                            <select name="name_etablissement_id" class="form-select" required>
                                @foreach($names_etablissements as $name)
                                    <option value="{{ $name->id }}"
                                        {{ $etablissement_rh->name_etablissement_id == $name->id ? 'selected' : '' }}>
                                        {{ $name->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">نوع المؤسسة</label>
                            <select name="is_public" id="is_public" class="form-select">
                                <option value="1" {{ $etablissement_rh->is_public == 1 ? 'selected' : '' }}>عمومية</option>
                                <option value="0" {{ $etablissement_rh->is_public == 0 ? 'selected' : '' }}>خاصة</option>
                            </select>
                        </div>

                        <div id="grade-row" class="col-md-3">
                            <label class="form-label">الرتبة</label>
                            <input type="text" name="grade" class="form-control"
                                   value="{{ $etablissement_rh->grade }}">
                        </div>

                        <div id="specialisation-row" class="col-md-3 d-none">
                            <label class="form-label">الاختصاص</label>
                            <input type="text" name="specialisation" class="form-control"
                                   value="{{ $etablissement_rh->specialisation }}">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">عدد الذكور</label>
                            <input type="number" name="number_male" class="form-control"
                                   min="0" value="{{ $etablissement_rh->number_male }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">عدد الإناث</label>
                            <input type="number" name="number_female" class="form-control"
                                   min="0" value="{{ $etablissement_rh->number_female }}">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-pen-to-square me-1"></i> تحديث
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        function toggleFields() {
            const select = document.getElementById('is_public');
            const gradeRow = document.getElementById('grade-row');
            const specRow = document.getElementById('specialisation-row');

            if (select.value === '1') {
                gradeRow.classList.remove('d-none');
                specRow.classList.add('d-none');
            } else {
                gradeRow.classList.add('d-none');
                specRow.classList.remove('d-none');
            }
        }

        document.addEventListener('DOMContentLoaded', toggleFields);
        document.getElementById('is_public').addEventListener('change', toggleFields);
    </script>

</x-master>
