<x-master title="programme page">

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
                   <h1> ميثاق تصرف جهوي</h1>
                </div>
                <form action="{{ route('action_charter.update', $actionCharter->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <p>أبرم <strong>ميثاق تصرف جهوي</strong> بين:</p>

                    <p>
                        رئيس برنامج
                        <select name="programme_id"
                                id="programme_id"
                                class="form-select d-inline w-auto @error('programme_id') is-invalid @enderror">

                            <option value="">اختر البرنامج</option>
                            @foreach($programmes as $programme)
                                <option value="{{ $programme->id }}"
                                    {{ old('programme_id', $actionCharter->programme_id) == $programme->id ? 'selected' : '' }}>
                                    {{ $programme->name }}
                                </option>
                            @endforeach
                        </select>
                       
                        ، ممثلاً في شخص رئيسه السيد(ة)
                        <input type="text"
                               name="name_responsable_programme"
                               class="form-control d-inline w-auto @error('name_responsable_programme') is-invalid @enderror"
                               value="{{ old('name_responsable_programme', $actionCharter->name_responsable_programme) }}">
              
                        ،
                    </p>

                    <p>
                          @error('programme_id')
                            <div class="invalid-feedback d-inline">{{ $message }}</div>
                        @enderror
                    </p>
                    <p>من جهة</p>

                    <p>
                       
                        و المندوبية الجهوية لشؤون المرأة و الأسرة، ممثل في شخص المندوب الجهوي لشؤون المرأة والأسرة
                       بـ
                       <select name="gouvernorat_id"
                                class="form-select d-inline w-auto @error('gouvernorat_id') is-invalid @enderror">

                            <option value="">اختر الولاية</option>
                            @foreach($gouvernorats as $gouvernorat)
                                <option value="{{ $gouvernorat->id }}"
                                    {{ old('gouvernorat_id', $actionCharter->gouvernorat_id) == $gouvernorat->id ? 'selected' : '' }}>
                                    {{ $gouvernorat->name }}
                                </option>
                            @endforeach
                        </select>
                      

                        ، السيد(ة)
                         <input type="text"
                               name="name_programmer"
                               class="form-control d-inline w-auto @error('name_programmer') is-invalid @enderror"
                               value="{{ old('name_programmer', $actionCharter->name_programmer) }}">
              
                        والمشار إليها لاحقًا بـ "المندوبية"،
                    </p>

                    <p>من جهة أخرى</p>

                    <p>
                        عملا بأحكام النصوص التشريعية والترتيبية الجاري بها العمل في مجال حوكمة التصرف
                        و تطوير أداء برنامج
                    </p>

                    <p class="text-center">
                        <strong id="selectedProgrammeText" class="text-primary" style="font-size:25px;">
                            {{$programmes->firstWhere('id', old('programme_id', $actionCharter->programme_id))->name ?? ''}}
                        </strong>
                    </p>

                    <p>
                        و في إطار تفعيل مقتضيات القانون الأساسي للمندوبية الجهوية لشؤون المرأة والأسرة
                        و المتمثلة في تعزيز الشراكة والتعاون مع مختلف المتدخلين في مجال التنمية الجهوية
                        و الوطنية و دعم التنسيق بين مختلف الهياكل والمؤسسات العمومية والخاصة والجمعيات
                        والمنظمات الوطنية والدولية الفاعلة في المجال الاجتماعي والاقتصادي والثقافي
                        والبيئي بالجهة، وتحديد الادوار بين مختلف الأطراف المتدخلة في قيادة و تنفيذ
                        السياسة العمومية بما يدعم مبادئ المسؤولية والمساءلة من خلال التنزيل العملياتي
                        للبرنامج و تحديد سلسلة المسؤوليات بما يضمن تحقيق الأهداف و بلوغ المؤشرات
                        ويعزز من فاعلية التدخلات على المستوى الجهوي.
                    </p>

                    <hr class="my-4">

                    <p><strong>I. إستراتجية وأولويات البرنامج</strong><br>
                    ( كما تم التنصيص عليها بمخطط التنمية والمشروع السنوي للأداء لسنة 2026 PAP )</p>

                    <p>
                        ➤ إستراتجية البرنامج
                           <input type="text"
                               name="strategie_programme"
                               class="form-control d-inline w-75 @error('strategie_programme') is-invalid @enderror"
                               value="{{ old('strategie_programme', $actionCharter->strategie_programme) }}">
                        @error('strategie_programme')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
              
                    </p>

                    <p><strong>➤ أولويات البرنامج</strong></p>

                    <p>
                        @for($i = 1; $i <= 4; $i++)
                        <p>
                            الاولوية {{ $i }}:
                            <input type="text"
                                   name="priorite_{{ $i }}"
                                   class="form-control d-inline w-75 @error('priorite_'.$i) is-invalid @enderror"
                                   value="{{ old('priorite_'.$i, $actionCharter->{'priorite_'.$i}) }}">
                            @error('priorite_'.$i)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </p>
                    @endfor
                    </p>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-pen me-1"></i>
                            تحديث
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

      <script>
        document.getElementById('programme_id').addEventListener('change', function () {
            const text = this.options[this.selectedIndex].text;
            document.getElementById('selectedProgrammeText').textContent = text;
        });
    </script>


</x-master>
