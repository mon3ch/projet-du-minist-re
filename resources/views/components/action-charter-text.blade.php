@props(['action_charters', 'loi' => null])
@if($loi)
    <div style="background-color:#fff8e1;padding:20px;border-radius:10px;border:1px solid #ffd54f; line-height:1.8;">
        {!! $loi->description !!}
        @if(Auth::check() && Auth::user()->is_admin)
            <div class="text-end mt-3">
                <a href="{{ route('loi.edit', $loi) }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-pen"></i> تعديل القانون
                </a>
            </div>
        @endif
    </div>
@else
    @if(Auth::check() && Auth::user()->is_admin)
        <div class="alert alert-warning">
            لا يوجد قانون محفوظ حالياً
            <a href="{{ route('loi.create') }}" class="btn btn-sm btn-success ms-2">
                <i class="fa-solid fa-plus"></i> إضافة قانون
            </a>
        </div>
    @endif
@endif
