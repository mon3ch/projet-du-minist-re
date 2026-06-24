@props(['action_charter', 'loi', 'quatre_analyses'])

<div class="row">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="m-0">
            <i class="fa-solid fa-users-gear me-2"></i>
            التحليل الرباعي لواقع المندوبية
        </h5>
        <span class="text-muted small">
            @if($quatre_analyses)
           
            <button class="btn btn-primary quick-btn">
                <a href="{{ route('quatre_analyses.edit', $quatre_analyses->id) }}"
   class="btn btn-primary text-white text-decoration-none">
    <i class="fa-solid fa-pen me-2"></i> تعديل التحليل الرباعي
</a>

            </button>

            @else
            <button class="btn btn-primary quick-btn">
                <a href="{{ route('quatre_analyses.createByCharter', $action_charter) }}" class="text-white text-decoration-none">
                    <i class="fa-solid fa-plus me-2"></i> إضافة التحليل الرباعي
                </a>
            </button>

            @endif
           
        </span>
    </div>

    <div class="soft-card p-3 mb-4" data-aos="fade-up">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr class=" text-center">
                    <th>نقاط القوة <br><small>(على المستوى الداخلي)</small></th>
                    <th>نقاط الضعف <br><small>(على المستوى الداخلي)</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if($quatre_analyses && $quatre_analyses->points_forts)
                            {!! $quatre_analyses->points_forts !!}
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        @if($quatre_analyses && $quatre_analyses->points_faibles)
                            {!! $quatre_analyses->points_faibles !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
            </tbody>

            <thead class="table-light">
                <tr class=" text-center">
                    <th>الفرص <br><small>(على المستوى الخارجي)</small></th>
                    <th>التحديات <br><small>(على المستوى الخارجي)</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if($quatre_analyses && $quatre_analyses->opportunites)
                            {!! $quatre_analyses->opportunites !!}
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        @if($quatre_analyses && $quatre_analyses->defis)
                            {!! $quatre_analyses->defis !!}
                        @else
                            ---
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- زر حذف --}}
    <x-delete />
</div>
