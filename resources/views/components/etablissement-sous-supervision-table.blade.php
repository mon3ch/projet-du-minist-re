@props(['etablissement_sous_supervisions', 'action_charter'])

<div class="row">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="m-0">
            <i class="fa-solid fa-users-gear me-2"></i>
            المؤسسات (حسب برنامج: {{ $action_charter->programme->name }})، تحت الإشراف
        </h5>
        <span class="text-muted small">
            <button class="btn btn-primary quick-btn">
                <a href="{{ route('etablissement_sous_supervision.createByCharter', $action_charter) }}" class="text-white text-decoration-none">
                    <i class="fa-solid fa-plus me-2"></i>
                    إضافة مؤسسة تحت الإشراف
                </a>
            </button>
            <select  id="filter-select" class="btn btn-success quick-btn ms-2" style="color:#000; background-color: transparent">
                <option value="public" selected>مؤسسة عمومية</option>
                <option value="private">مؤسسة خاصة</option>
                <option value="all">كل المؤسسات </option>
            </select>
        </span>
    </div>

    <div class="soft-card p-3 mb-4" data-aos="fade-up">
        <div class="p-0">
            <table class="align-middle mb-0 table table-bordered table-hover" style="width:100%; direction: rtl;">
                <thead class="table-light text-center">
                    <tr>
                        <th rowspan="2">نوع المؤسسة</th>
                        <th rowspan="2">اسم المؤسسة</th>
                        <th rowspan="2">المسؤول على تسييرها</th>
                        <th rowspan="2">العنوان</th>
                        <th rowspan="2">الفئة المستهدفة</th>
                        <th colspan="3">طاقة استيعابها</th>
                        <th rowspan="2">إجراءات</th>
                    </tr>
                    <tr>
                        <th>ذكور</th>
                        <th>إناث</th>
                        <th>المجموع</th>
                    </tr>
                </thead>

                <tbody class="table-modern text-center">
                    @php
                        $total_males = 0;
                        $total_females = 0;
                        $total_all = 0;
                    @endphp

                    @foreach($etablissement_sous_supervisions as $etablissement)
                        @php
                            $males = $etablissement->number_male ?? 0;
                            $females = $etablissement->number_female ?? 0;
                            $sum = $males + $females;

                            $total_males += $males;
                            $total_females += $females;
                            $total_all += $sum;
                        @endphp

                        <tr data-is-public="{{ $etablissement->is_public ? 'public' : 'private' }}">
                            <td>{{ $etablissement->is_public ? 'عمومية' : 'خاصة' }}</td>
                            <td>{{ $etablissement->name_etablissement->name }}</td>
                            <td>{{ $etablissement->manager_name }}</td>
                            <td>{{ $etablissement->adresse }}</td>
                            <td>{{ $etablissement->target_category }}</td>
                            <td>{{ $males }}</td>
                            <td>{{ $females }}</td>
                            <td><strong>{{ $sum }}</strong></td>
                            <td>
                                <form action="{{ route('etablissement_sous_supervision.edit', $etablissement->id) }}"
                                      method="GET" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </form>
                                <form action="{{ route('etablissement_sous_supervision.destroy', $etablissement->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="table-success fw-bold" id="total-row">
                        <td colspan="5">المجموع العام</td>
                        <td>{{ $total_males }}</td>
                        <td>{{ $total_females }}</td>
                        <td>{{ $total_all }}</td>
                        <td>—</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function filterTable() {
    const filter = document.getElementById('filter-select').value; // public, private, all
    const rows = document.querySelectorAll('tbody tr[data-is-public]');

    let total_males = 0;
    let total_females = 0;
    let total_all = 0;

    rows.forEach(row => {
        const type = row.getAttribute('data-is-public');

        const males = parseInt(row.cells[5].textContent) || 0;
        const females = parseInt(row.cells[6].textContent) || 0;

        if (filter === 'all' || type === filter) {
            row.style.display = ''; 
            total_males += males;
            total_females += females;
            total_all += (males + females);
        } else {
            row.style.display = 'none'; 
        }
    });

    const totalRow = document.getElementById('total-row');
    totalRow.cells[1].textContent = total_males;
    totalRow.cells[2].textContent = total_females;
    totalRow.cells[3].textContent = total_all;
    totalRow.style.display = ''; 
}

document.getElementById('filter-select').addEventListener('change', filterTable);

document.addEventListener('DOMContentLoaded', filterTable);
</script>


<x-delete />
