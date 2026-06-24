<x-master title="تعديل القانون">
    <div class="content">
        @include('partials.sidebar.admin.sidebar')

        <div class="container mt-4">
            <div class="soft-card p-3 mb-4" data-aos="fade-up">
                <div class="card-body p-4">
                    <form action="{{ route('loi.update', $loi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                <h3>نص القانون</h3>
                            </label>
                            <textarea name="description" id="editor">{{ $loi->description }}</textarea>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                حفظ التعديل
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable {
            min-height: 300px;
            direction: rtl;
            text-align: right;
        }
    </style>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'ar',
                placeholder: 'اكتب نص القانون هنا...',
                toolbar: [
                    'heading','|',
                    'bold','italic','underline','strikethrough','|',
                    'fontSize','fontColor','fontBackgroundColor','|',
                    'bulletedList','numberedList','outdent','indent','|',
                    'alignment','|',
                    'link','blockQuote','codeBlock','|',
                    'undo','redo','removeFormat'
                ],
                fontSize: { options: [10,12,14,16,18,20,24,28,32,36] },
                alignment: { options: ['right','center','left','justify'] }
            })
            .then(editor => console.log('Editor loaded', editor))
            .catch(error => console.error(error));
    </script>
</x-master>
