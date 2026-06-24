
        @if($loi)
            <div style="background-color: #fff8e1; padding: 20px; border-radius: 10px; border: 1px solid #ffd54f; line-height: 1.7; margin-bottom: 20px;">
                {!! $loi->description !!}
            </div>
             <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('loi.edit', $loi->id) }}"> تعديل قانون </a>
            </button>
        @else
            <div class="alert alert-warning">
                لا يوجد قانون محفوظ حالياً.
            </div>
             <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('loi.create') }}"> <i class="fa-solid fa-plus me-1"></i> اضف قانون </a>
            </button>
        @endif

 
