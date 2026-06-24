<x-master title="تعديل التحليل الرباعي">
    <div class="content">
        {{-- Sidebar --}}
        @include('partials.sidebar.admin.sidebar')

        <div class="container mt-4">
            <form action="{{ route('quatre_analyses.updateLast', $quatre_analyses->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="action_charter_id" value="{{ $action_charter->id }}">

<div class="row">
                {{-- Points forts --}}
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>النقاط القوية</h3>
                        </label>
                        <textarea name="points_forts" id="editor-points_forts">{{ old('points_forts', $quatre_analyses->points_forts) }}</textarea>
                        @error('points_forts')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Points faibles --}}
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>النقاط الضعيفة</h3>
                        </label>
                        <textarea name="points_faibles" id="editor-points_faibles">{{ old('points_faibles', $quatre_analyses->points_faibles) }}</textarea>
                        @error('points_faibles')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
</div>

<div class="row">
                {{-- Opportunités --}}
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>الفرص</h3>
                        </label>
                        <textarea name="opportunites" id="editor-opportunites">{{ old('opportunites', $quatre_analyses->opportunites) }}</textarea>
                        @error('opportunites')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Defis --}}
                <div class="soft-card p-3 col-md-6 mb-3" data-aos="fade-up">
                    <div class="card-body p-4">
                        <label class="form-label fw-bold">
                            <h3>التحديات</h3>
                        </label>
                        <textarea name="defis" id="editor-defis">{{ old('defis', $quatre_analyses->defis) }}</textarea>
                        @error('defis')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
</div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable {
            min-height: 200px;
            direction: rtl;
            text-align: right;
        }
    </style>

    <script>
        const editors = [
            'editor-points_forts',
            'editor-points_faibles',
            'editor-opportunites',
            'editor-defis'
        ];

        editors.forEach(id => {
            ClassicEditor
                .create(document.querySelector(`#${id}`), {
                    language: 'ar',
                    placeholder: 'اكتب هنا...',
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                        'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'codeBlock', '|',
                        'undo', 'redo', 'removeFormat'
                    ],
                    fontSize: {
                        options: [10, 12, 14, 16, 18, 20, 24, 28, 32, 36]
                    },
                    alignment: {
                        options: ['right', 'center', 'left', 'justify']
                    }
                })
                .then(editor => console.log(`${id} loaded`, editor))
                .catch(error => console.error(error));
        });
    </script>
</x-master>
