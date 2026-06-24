<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'programme page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'programme page']); ?>

    <div class="content action-charter">

        <?php echo $__env->make('components.action-charter-text', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php if(Auth::user()->is_admin): ?>
            <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('partials.sidebar.user.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <div class="container mt-4">
            <div class="charter-box" data-aos="fade-up">

                <div class="charter-title" style="text-align: center;">
                   <h1> ميثاق تصرف جهوي</h1>
                </div>
                <form action="<?php echo e(route('action_charter.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <p>أبرم <strong>ميثاق تصرف جهوي</strong> بين:</p>

                    <p>
                        رئيس برنامج
                        <select name="programme_id" id="programme_id" class="form-select d-inline w-auto <?php $__errorArgs = ['programme_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value=""><?php echo e(__('messages.select_programme')); ?></option>
                            <?php $__currentLoopData = $programmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($programme->id); ?>" <?php echo e(old('programme_id') == $programme->id ? 'selected' : ''); ?>>
                                    <?php echo e($programme->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                       
                        ، ممثلاً في شخص رئيسه السيد(ة)
                        <input type="text" name="name_responsable_programme"
                               class="form-control d-inline w-auto <?php $__errorArgs = ['name_responsable_programme'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="اسم رئيس البرنامج"
                               value="<?php echo e(old('name_responsable_programme')); ?>">
                       
                        ،
                    </p>

                    <p>
                          <?php $__errorArgs = ['programme_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-inline"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <p>من جهة</p>

                    <p>
                       
                        و المندوبية الجهوية لشؤون المرأة و الأسرة، ممثل في شخص المندوب الجهوي لشؤون المرأة والأسرة
                       بـ
                        <select name="gouvernorat_id" class="form-select d-inline w-auto <?php $__errorArgs = ['gouvernorat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">اختر الولاية</option>
                            <?php $__currentLoopData = $gouvernorats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gouvernorat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($gouvernorat->id); ?>" <?php echo e(old('gouvernorat_id') == $gouvernorat->id ? 'selected' : ''); ?>>
                                    <?php echo e($gouvernorat->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      

                        ، السيد(ة)
                        <input type="text" name="name_programmer"
                               class="form-control d-inline w-auto <?php $__errorArgs = ['name_programmer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="اسم المندوب الجهوي"
                               value="<?php echo e(old('name_programmer')); ?>">
                       
                        والمشار إليها لاحقًا بـ "المندوبية"،
                    </p>

                    <p>من جهة أخرى</p>

                    <p>
                        عملا بأحكام النصوص التشريعية والترتيبية الجاري بها العمل في مجال حوكمة التصرف
                        و تطوير أداء برنامج
                    </p>

                    <p class="text-center">
                        <strong id="selectedProgrammeText" class="text-primary" style="font-size:25px;">
                            <?php echo e(old('programme_id') ? $programmes->firstWhere('id', old('programme_id'))->name : '...'); ?>

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
                               class="form-control d-inline w-75 <?php $__errorArgs = ['strategie_programme'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="إستراتجية البرنامج … …"
                               value="<?php echo e(old('strategie_programme')); ?>">
                        <?php $__errorArgs = ['strategie_programme'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <p><strong>➤ أولويات البرنامج</strong></p>

                    <p>
                        الاولوية 1:
                        <input type="text"
                               name="priorite_1"
                               class="form-control d-inline w-75 <?php $__errorArgs = ['priorite_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="……"
                               value="<?php echo e(old('priorite_1')); ?>">
                        <?php $__errorArgs = ['priorite_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <p>
                        الاولوية 2:
                        <input type="text"
                               name="priorite_2"
                               class="form-control d-inline w-75 <?php $__errorArgs = ['priorite_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="……"
                               value="<?php echo e(old('priorite_2')); ?>">
                        <?php $__errorArgs = ['priorite_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <p>
                        الاولوية 3:
                        <input type="text"
                               name="priorite_3"
                               class="form-control d-inline w-75 <?php $__errorArgs = ['priorite_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="……"
                               value="<?php echo e(old('priorite_3')); ?>">
                        <?php $__errorArgs = ['priorite_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <p>
                        الاولوية 4:
                        <input type="text"
                               name="priorite_4"
                               class="form-control d-inline w-75 <?php $__errorArgs = ['priorite_4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="……"
                               value="<?php echo e(old('priorite_4')); ?>">
                        <?php $__errorArgs = ['priorite_4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </p>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fa-solid fa-save me-1"></i>
                            <?php echo e(__('messages.save')); ?>

                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('programme_id').addEventListener('change', function () {
            const text = this.options[this.selectedIndex].text;
            document.getElementById('selectedProgrammeText').textContent = this.value ? text : '';
        });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9881aee3032510140a884de503784c66)): ?>
<?php $attributes = $__attributesOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__attributesOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9881aee3032510140a884de503784c66)): ?>
<?php $component = $__componentOriginal9881aee3032510140a884de503784c66; ?>
<?php unset($__componentOriginal9881aee3032510140a884de503784c66); ?>
<?php endif; ?>
<?php /**PATH D:\5edma\New folder (2)\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/action_charter/create.blade.php ENDPATH**/ ?>