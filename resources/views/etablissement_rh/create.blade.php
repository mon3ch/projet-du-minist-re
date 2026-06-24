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
                    <h1> الموارد البشرية بالمؤسسات تحت الإشراف</h1>
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
                <form action="{{ route('etablissement_rh.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="action_charter_id" value="{{ $action_charter->id }}">
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">اسم المؤسسة</label>
                            <select name="name_etablissement_id" class="form-select" required>
                                <option value="">-- اختر المؤسسة --</option>
                                @foreach($names_etablissements as $name)
                                    <option value="{{ $name->id }}">{{ $name->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       <div class="col-md-3">
                                <label class="form-label">نوع المؤسسة</label>
                                <select name="is_public" id="is_public" class="form-select">
                                    <option value="1">عمومية</option>
                                    <option value="0">خاصة</option>
                                </select>
                        </div>

                        <div id="grade-row" class="col-md-3">
                                <label class="form-label">الرتبة</label>
                                <input type="text" name="grade" class="form-control">
                        </div>
                         <div id="specialisation-row" style="display:none;" class="col-md-3">
                                <label class="form-label">الاختصاص</label>
                                <input type="text" name="specialisation" class="form-control">
                        </div>

                    </div>
                        
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">
                                عدد
                                الذكور
                                  </label>
                            <input type="number" value="0" name="number_male" class="form-control" min="0">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" >
                                عدد
                                الإناث  

                            </label>
                            <input type="number" value="0" name="number_female" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fa-solid fa-save me-1"></i> حفظ
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
<script>
function toggleFields() {
    const select = document.getElementById('is_public');
    const gradeRow = document.getElementById('grade-row');
    const specRow = document.getElementById('specialisation-row');

    if (select.value === '1') {
        gradeRow.style.display = '';
        specRow.style.display = 'none';
    } else {
        gradeRow.style.display = 'none';
        specRow.style.display = '';
    }
}

document.getElementById('is_public').addEventListener('change', toggleFields);

document.addEventListener('DOMContentLoaded', toggleFields);
</script>
</x-master>
