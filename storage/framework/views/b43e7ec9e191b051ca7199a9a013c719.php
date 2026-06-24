<?php if (isset($component)) { $__componentOriginal9881aee3032510140a884de503784c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9881aee3032510140a884de503784c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Projet page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Projet page']); ?>
    <div class="content">

    <?php if(Auth::user()->is_admin): ?>
        <?php echo $__env->make('partials.sidebar.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    <?php else: ?>
        <?php echo $__env->make('partials.sidebar.user.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    <?php endif; ?>

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fa-solid fa-diagram-project me-2"></i> <?php echo e(__('messages.add_project')); ?> </h4>
    </div>

    <div class="container mt-4">
        <p class="text-muted mb-3 zoom-anim text-danger"> <?php echo e(__('messages.obligatory_fields')); ?></p>

        <div class="p-3 mb-4" data-aos="fade-up">
            <div class="p-4">

                <form action="<?php echo e(route('projet.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

<div class="modern-stepper">

    <div class="steps-wrapper">
        <div class="step-item" onclick="goToStep(0)">
            <div class="step-circle">1</div>
            <div class="step-label">المعلومات الأساسية</div>
        </div>

        <div class="step-item" onclick="goToStep(1)">
            <div class="step-circle">2</div>
            <div class="step-label">معلومات خاصة بالمشروع</div>
        </div>

        <div class="step-item" onclick="goToStep(2)">
            <div class="step-circle">3</div>
            <div class="step-label">الإعتمادات و نسبة تقدم المشروع</div>
        </div>

        <div class="step-item" onclick="goToStep(3)">
            <div class="step-circle">4</div>
            <div class="step-label">التواريخ</div>
        </div>

        <div class="step-item" onclick="goToStep(4)">
            <div class="step-circle">5</div>
            <div class="step-label">موقع المشروع في الخريطة </div>
        </div>
    </div>

    <div class="step-content" id="step-0">
        <h5 class="mb-3">✔ المعلومات الأساسية</h5>

        <div class="row">
                                       <!-- Image utilisateur connecté -->
                            <div class="col-md-6 d-flex align-items-center">
                                <img src="<?php echo e(asset('storage/' . Auth::user()->image)); ?>" 
                                    alt="Profile" 
                                    class="rounded-circle border shadow-sm me-3" 
                                    width="60" height="60">

                                <div>
                                    <strong><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></strong><br>
                                    <small class="text-muted"><?php echo e(Auth::user()->email); ?></small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="description" class="form-label"><span class="text-danger">*</span> <?php echo e(__('messages.description')); ?></label>
                                <textarea class="form-control" readonly id="description" name="description" placeholder="سيتم تحديد هذه القيمة تلقائيا"><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                             
<div class="col-md-6">
    <label for="gouvernorat_id" class="form-label">
        <span class="text-danger">*</span> <?php echo e(__('messages.gouvernorat')); ?>

    </label>
    <select name="gouvernorat_id" id="gouvernorat_id" class="form-select shadow-sm border-primary select2">
        <option value=""><?php echo e(__('messages.select_governorate')); ?></option>
        <?php $__currentLoopData = $gouvernorats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gouvernorat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($gouvernorat->id); ?>" <?php echo e(old('gouvernorat_id') == $gouvernorat->id ? 'selected' : ''); ?>>
                <?php echo e($gouvernorat->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['gouvernorat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-2"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="col-md-6">
    <label for="delegation_id" class="form-label">
        <span class="text-danger">*</span> <?php echo e(__('messages.delegation')); ?>

    </label>
    <select name="delegation_id" id="delegation_id" class="form-select shadow-sm border-primary">
        <option value=""><?php echo e(__('messages.select_delegation')); ?></option>
        <?php if(old('gouvernorat_id')): ?>
            <?php $__currentLoopData = App\Models\Delegation::where('gouvernorat_id', old('gouvernorat_id'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($delegation->id); ?>" <?php echo e(old('delegation_id') == $delegation->id ? 'selected' : ''); ?>>
                    <?php echo e($delegation->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <?php $__errorArgs = ['delegation_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-2"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="col-md-4">
    <label for="programme_id" class="form-label">
        <span class="text-danger">*</span> <?php echo e(__('messages.programme')); ?>

    </label>
    <select name="programme_id" id="programme_id" class="form-select shadow-sm border-primary select2">
        <option value=""><?php echo e(__('messages.select_programme')); ?></option>
        <?php $__currentLoopData = $programmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($programme->id); ?>" <?php echo e(old('programme_id') == $programme->id ? 'selected' : ''); ?>>
                <?php echo e($programme->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['programme_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-2"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="col-md-4">
    <label for="etablissement_id" class="form-label">
        <span class="text-danger">*</span> <?php echo e(__('messages.type_etablissement')); ?>

    </label>
    <select name="etablissement_id" id="etablissement_id" class="form-select shadow-sm border-primary">
        <option value=""><?php echo e(__('messages.select_type_etablissement')); ?></option>
        <?php if(old('programme_id')): ?>
            <?php $__currentLoopData = App\Models\Etablissement::where('programme_id', old('programme_id'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($etab->id); ?>" <?php echo e(old('etablissement_id') == $etab->id ? 'selected' : ''); ?>>
                    <?php echo e($etab->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <?php $__errorArgs = ['etablissement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-2"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="col-md-4">
    <label for="name_etablissement_id" class="form-label">
        <span class="text-danger">*</span> <?php echo e(__('messages.name_etablissement')); ?>

    </label>
    <select name="name_etablissement_id" id="name_etablissement_id" class="form-select shadow-sm border-primary">
        <option value=""><?php echo e(__('messages.select_name_etablissement')); ?></option>
        <?php if(old('etablissement_id') && old('gouvernorat_id')): ?>
            <?php $__currentLoopData = App\Models\names_etablissements::where('etablissement_id', old('etablissement_id'))
                ->where('gouvernorat_id', old('gouvernorat_id'))  
                ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($name->id); ?>" <?php echo e(old('name_etablissement_id') == $name->id ? 'selected' : ''); ?>>
                    <?php echo e($name->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <?php $__errorArgs = ['name_etablissement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger mt-2"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

        </div>
    </div>

    <!-- STEP 1 -->
    <div class="step-content" id="step-1" style="display:none;">
        <h5 class="mb-3">✔ معلومات خاصة بالمشروع</h5>

        <div class="row">
                                         
                             <!-- Nature projet --> 
                            <div class="col-md-6">
                                <label for="nature_projet_id" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.nature_projet')); ?> 
                                </label>
                                <select name="nature_projet_id" id="nature_projet_id" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_nature_projet')); ?></option>
                                    <?php $__currentLoopData = $nature_projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nature_projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nature_projet->id); ?>" <?php echo e(old('nature_projet_id') == $nature_projet->id ? 'selected' : ''); ?>>
                                            <?php echo e($nature_projet->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['nature_projet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="type_projet_id" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.type_projet')); ?>

                                </label>
                                <select name="type_projet_id" id="type_projet_id" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_type_projet')); ?></option>
                                    <?php $__currentLoopData = $type_projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type_projet->id); ?>" <?php echo e(old('type_projet_id') == $type_projet->id ? 'selected' : ''); ?>>
                                            <?php echo e($type_projet->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['type_projet_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label for="situation_etablissement_fonctionnelle" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.situation_etablissement_fonctionnelle')); ?>

                                </label>
                                <select name="situation_etablissement_fonctionnelle" id="situation_etablissement_fonctionnelle" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_situation_etablissement_fonctionnelle')); ?></option>
                                    <option value="وظيفية" <?php echo e(old('situation_etablissement_fonctionnelle') == 'وظيفية'? 'selected' : ''); ?>>
                                        وظيفية
                                    </option>

                                    <option value="غير وظيفية" <?php echo e(old('situation_etablissement_fonctionnelle') == 'غير وظيفية'? 'selected' : ''); ?>>
                                        غير وظيفية
                                    </option>
                                    
                                    <option value="أرض بيضاء" <?php echo e(old('situation_etablissement_fonctionnelle') == 'أرض بيضاء'? 'selected' : ''); ?>>
                                        أرض بيضاء
                                    </option>
                                    
                                    <option value="مغلق" <?php echo e(old('situation_etablissement_fonctionnelle') == 'مغلق'? 'selected' : ''); ?>>
                                        مغلق 
                                    </option>
                                    
                                    <option value="مغلق جزئيا" <?php echo e(old('situation_etablissement_fonctionnelle') == 'مغلق جزئيا'? 'selected' : ''); ?>>
                                        مغلق جزئيا
                                    </option>
                                </select>
                                <?php $__errorArgs = ['situation_etablissement_fonctionnelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                                <div class="col-md-4">
                                <label for="tranche" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.tranche')); ?>

                                </label>
                                <select name="tranche" id="tranche" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_tranche')); ?></option>
                                    <option value="القسط الأول" <?php echo e(old('tranche') == "القسط الأول"? 'selected' : ''); ?>>
                                        القسط الأول
                                    </option>

                                    <option value="القسط الثاني" <?php echo e(old('tranche') == "القسط الثاني"? 'selected' : ''); ?>>
                                        القسط الثاني
                                    </option>

                                    <option value="القسط الثالث" <?php echo e(old('tranche') == "القسط الثالث" ? 'selected' : ''); ?>>
                                        القسط الثالث
                                    </option>

                                    <option value="القسط الرابع" <?php echo e(old('tranche') == "القسط الرابع" ? 'selected' : ''); ?>>
                                        القسط الرابع
                                    </option>
                                </select>
                                <?php $__errorArgs = ['tranche'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label for="date" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.date')); ?>

                                </label>
                                <select class="form-control" id="date" name="date">
                                    <option value=""><?php echo e(__('messages.select_year')); ?></option>
                                    <?php for($year = 2000; $year <= date('Y'); $year++): ?>
                                        <option value="<?php echo e($year); ?>" <?php echo e(old('date') == $year ? 'selected' : ''); ?>>
                                            <?php echo e($year); ?>

                                        </option>
                                    <?php endfor; ?>
                                </select>
                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for=" situation_immobiliere" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.situation_immobiliere')); ?>

                                </label>
                                <select name="situation_immobiliere" id="situation_immobiliere" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_situation_immobiliere')); ?></option>
                                    <option value="مخصص" <?php echo e(old('situation_immobiliere') == 'مخصص'? 'selected' : ''); ?>>
                                        مخصص
                                    </option>

                                    <option value="غير مخصص" <?php echo e(old('situation_immobiliere') == 'غير مخصص'? 'selected' : ''); ?>>
                                        غير مخصص
                                    </option>

                                    <option value="في طور التخصيص" <?php echo e(old('situation_immobiliere') == 'في طور التخصيص' ? 'selected' : ''); ?>>
                                        في طور التخصيص
                                    </option>

                                    <option value="ملك بلدي" <?php echo e(old('situation_immobiliere') == 'ملك بلدي' ? 'selected' : ''); ?>>
                                        ملك بلدي
                                    </option>
                                      <option value="مخصص جزئيا" <?php echo e(old('situation_immobiliere') == 'مخصص جزئيا' ? 'selected' : ''); ?>>
                                         مخصص جزئيا
                                    </option>
                                </select>
                                <?php $__errorArgs = ['situation_immobiliere'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="financement_id" class="form-label"> <span class="text-danger">*</span> <?php echo e(__('messages.financement')); ?></label>
                                <select name="financement_id" id="financement_id" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.financement')); ?></option>
                                    <?php $__currentLoopData = $financements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($financement->id); ?>" <?php echo e(old('financement_id') == $financement->id ? 'selected' : ''); ?>>
                                            <?php echo e($financement->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['financement_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>








        </div>
    </div>

    <div class="step-content" id="step-2" style="display:none;">
                <h5 class="mb-3">✔ الإعتمادات و نسبة تقدم المشروع</h5>

        <div class="row">
        
                            

 
                            <div class="col-md-6">
                                <label for="phase_projet" class="form-label">
                                    <span class="text-danger">*</span> <?php echo e(__('messages.phase_projet')); ?>

                                </label>
                                <select name="phase_projet" id="phase_projet" class="form-select shadow-sm border-primary">
                                    <option value=""><?php echo e(__('messages.select_phase_projet')); ?></option>
                                    <option value="في طور اعداد الملف المرجعي" <?php echo e(old('phase_projet') == 'في طور اعداد الملف المرجعي'? 'selected' : ''); ?>>
                                        في طور اعداد الملف المرجعي
                                    </option>
                                    
                                    <option value="بصدد الدراسة" <?php echo e(old('phase_projet') == 'بصدد الدراسة'? 'selected' : ''); ?>>
                                        بصدد الدراسة
                                    </option>


                                    <option value="بصدد الانجاز" <?php echo e(old('phase_projet') == 'بصدد الانجاز'? 'selected' : ''); ?>>
                                        بصدد الانجاز
                                    </option>
                                    
                                    <option value="توقف الأشغال" <?php echo e(old('phase_projet') == 'توقف الأشغال'? 'selected' : ''); ?>>
                                        توقف الأشغال
                                    </option>


                                    <option value="بصدد طلب العروض" <?php echo e(old('phase_projet') == 'بصدد طلب العروض'? 'selected' : ''); ?>>
                                        بصدد طلب العروض
                                    </option>
                                    
                                    <option value="اعادة طلب العروض" <?php echo e(old('phase_projet') == 'اعادة طلب العروض'? 'selected' : ''); ?>>
                                        اعادة طلب العروض 
                                    </option>

                                    <option value="قبول وقتي" <?php echo e(old('phase_projet') == 'قبول وقتي'? 'selected' : ''); ?>>
                                       قبول وقتي 
                                    </option>
                                    
                                    <option value="قبول نهائي" <?php echo e(old('phase_projet') == 'قبول نهائي'? 'selected' : ''); ?>>
                                        قبول نهائي
                                    </option>


                                </select>
                                <?php $__errorArgs = ['phase_projet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                             <!-- Coût du marché -->
                            <div class="col-md-6">
                                <label for="cout_marche" class="form-label"> <span class="text-danger">*</span> <?php echo e(__('messages.cout_marche')); ?></label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);" class="form-control" id="cout_marche" name="cout_marche"
                                    value="<?php echo e(old('cout_marche')); ?>" placeholder="<?php echo e(__('messages.cout_marche')); ?>">
                                <?php $__errorArgs = ['cout_marche'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                  
                            <div class="col-md-6">
                                <label for="credit_recommande_engager" class="form-label"><?php echo e(__('messages.credit_recommande_engager')); ?></label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);" 
                                    class="form-control" id="credit_recommande_engager" 
                                    name="credit_recommande_engager"
                                    value="<?php echo e(old('credit_recommande_engager')); ?>" 
                                    placeholder="<?php echo e(__('messages.credit_recommande_engager')); ?>">
                                <?php $__errorArgs = ['credit_recommande_engager'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="credit_recommande_Payeur" class="form-label"><?php echo e(__('messages.credit_recommande_payeur')); ?></label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);"
                                    class="form-control" id="credit_recommande_Payeur" 
                                    name="credit_recommande_Payeur"
                                    value="<?php echo e(old('credit_recommande_Payeur')); ?>" 
                                    placeholder="<?php echo e(__('messages.credit_recommande_payeur')); ?>">
                                <?php $__errorArgs = ['credit_recommande_Payeur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="credit_total" class="form-label">إعتمادات الدفع المتبقية</label>
                                <input type="text" class="form-control" id="credit_total" name="credit_total" value="" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="pourcentage_avancement" class="form-label">
                                    <span class="text-danger">*</span><?php echo e(__('messages.percent_avancement')); ?>

                                </label>
                                <select class="form-select" id="pourcentage_avancement" name="pourcentage_avancement">
                                    <option value=""><?php echo e(__('messages.select_option')); ?></option>
                                    <?php for($i = 5; $i <= 100; $i += 5): ?>
                                        <option value="<?php echo e($i); ?>" <?php echo e(old('pourcentage_avancement') == $i ? 'selected' : ''); ?>><?php echo e($i); ?>%</option>
                                    <?php endfor; ?>
                                </select>
                                <?php $__errorArgs = ['pourcentage_avancement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12">
                                <label for="Remarque" class="form-label"><?php echo e(__('messages.remarque')); ?></label>
                                <textarea class="form-control" id="Remarque" name="Remarque" placeholder="<?php echo e(__('messages.remarque')); ?>"><?php echo e(old('Remarque')); ?></textarea>
                                <?php $__errorArgs = ['Remarque'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


        </div>

    </div>


    <div class="step-content" id="step-3" style="display:none;">
                        <h5 class="mb-3">✔ التواريخ</h5>

<div class="row">
                           
                            <div class="col-md-6">
                                <label for="date_annance_offre" class="form-label"><span class="text-danger">*</span> <?php echo e(__('messages.offer_date')); ?></label>
                                <input type="date" class="form-control" id="date_annance_offre" name="date_annance_offre"
                                    value="<?php echo e(old('date_annance_offre')); ?>">
                                <?php $__errorArgs = ['date_annance_offre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <div class="col-md-6">
                                <label for="date_debut" class="form-label"> <span class="text-danger">*</span> <?php echo e(__('messages.start_date')); ?></label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut"
                                    value="<?php echo e(old('date_debut')); ?>">
                                <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="duree" class="form-label"> <span class="text-danger">*</span><?php echo e(__('messages.duration')); ?></label>
                                <input type="number" class="form-control" id="duree" name="duree"
                                    value="<?php echo e(old('duree')); ?>" placeholder="<?php echo e(__('messages.duration')); ?>">
                                <?php $__errorArgs = ['duree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="date_fin_travaux" class="form-label"><?php echo e(__('messages.date_fin_travaux')); ?></label>
                                <input type="date" class="form-control" id="date_fin_travaux" name="date_fin_travaux" value="<?php echo e(old('date_fin_travaux')); ?>" readonly>
                                <?php $__errorArgs = ['date_fin_travaux'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="date_acceptation_temporaire" class="form-label"><span class="text-danger">*</span> <?php echo e(__('messages.acceptation_temp')); ?></label>
                                <input type="date" class="form-control" id="date_acceptation_temporaire" name="date_acceptation_temporaire"
                                    value="<?php echo e(old('date_acceptation_temporaire')); ?>">
                                <?php $__errorArgs = ['date_acceptation_temporaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6"> <label for="date_acceptation_finale" class="form-label"><?php echo e(__('messages.date_acceptation_finale')); ?></label> 
                                <input type="date" class="form-control" id="date_acceptation_finale" name="date_acceptation_finale" value="<?php echo e(old('date_acceptation_finale')); ?>"> 
                                <?php $__errorArgs = ['date_acceptation_finale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-2"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </div>
            
                

    </div>


    </div>
       <div class="step-content col-md-12  mt-4" id="step-4" >
                                
                                        <p></p>
                <p class="text-danger"><b> اختر موقع المشروع من الخريطة </b></p>
                    <div class="col-md-6">
                  
                    <input type="hidden" class="form-control" readonly id="latitude" name="latitude"
                        value="<?php echo e(old('latitude')); ?>" placeholder="مثال : 36.8065">
                    <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger mt-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6">
                   
                    <input type="hidden" class="form-control" readonly id="longitude" name="longitude"
                        value="<?php echo e(old('longitude')); ?>" placeholder="مثال : 10.1815">
                    <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger mt-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>


                    <label class="form-label"> حدد الموقع ثم انقر عليه. </label>
                    <div id="map" style="height: 400px; border-radius: 10px; overflow: hidden;"></div>
                </div>
  
 

    <!-- BUTTONS -->
    <div class="step-buttons">
        <button type="button" class="btn-back" id="backBtn" onclick="backStep()">رجوع</button>
        <button type="button" class="btn-next" onclick="nextStep()">التالي</button>
        <button class="btn btn-success">تأكيد وإرسال</button>
    </div>

    <div id="resetSection" style="display:none; margin-top:20px;">
        <p class="text-success fw-bold"> جميع الخطوات اكتملت!</p>
        <button type="button" class="btn-reset" onclick="resetStepper()">إعادة</button>
    </div>
</div>

                </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const etablissementSelect = document.getElementById('etablissement_id');
    const namesSelect = document.getElementById('name_etablissement_id');

    etablissementSelect.addEventListener('change', function () {
        let etabId = this.value;
        let gouvernoratId = document.getElementById('gouvernorat_id').value;
        namesSelect.innerHTML = '<option value="">اختر اسم المؤسسة</option>';
        
        if (etabId) {
            fetch(`/get-names-etablissements/${etabId}/${gouvernoratId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(name => {
                        let option = document.createElement('option');
                        option.value = name.id;
                        option.textContent = name.name;
                        namesSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
});

        </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const natureSelect = document.getElementById('nature_projet_id');
    const typeSelect = document.getElementById('type_projet_id');

    natureSelect.addEventListener('change', function () {
        let natureId = this.value;

        typeSelect.innerHTML = '<option value="">اختر نوع المشروع</option>';

        if (natureId) {
            fetch(`/get-types/${natureId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(type => {
                        let option = document.createElement('option');
                        option.value = type.id;
                        option.textContent = type.name;
                        typeSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
});

    </script>
<script>
document.getElementById('gouvernorat_id').addEventListener('change', function () {
    let gouvernoratId = this.value;
    let delegationSelect = document.getElementById('delegation_id');

  
    delegationSelect.innerHTML = '<option value=""><?php echo e(__('messages.select_delegation')); ?>';

    if (gouvernoratId) {
        fetch('/get-delegations/' + gouvernoratId)
            .then(response => response.json())
            .then(data => {
                data.forEach(delegation => {
                    let opt = document.createElement('option');
                    opt.value = delegation.id;
                    opt.textContent = delegation.name;
                    delegationSelect.appendChild(opt);
                });
            });
    }
});

</script>
<script>
document.getElementById('programme_id').addEventListener('change', function () {
    const programmeId = this.value;
    const etablissementSelect = document.getElementById('etablissement_id');
    etablissementSelect.innerHTML = '<option value=""><?php echo e(__('messages.select_etablissement')); ?></option>';
    const nameEtablissementSelect = document.getElementById('name_etablissement_id');
    nameEtablissementSelect.innerHTML = '<option value=""><?php echo e(__('messages.select_name_etablissement')); ?></option>';
    
    if (programmeId) {
        fetch(`/get-etablissements/${programmeId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(etablissement => {
                    const option = document.createElement('option');
                    option.value = etablissement.id;
                    option.textContent = etablissement.name;
                    etablissementSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erreur:', error));
    }
});
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([34.0, 9.0], 6);
    var streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        maxZoom: 19
    });
    var satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/' +
        'World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles © Esri'
    });
    streetLayer.addTo(map);
    var baseMaps = {
        "خريطة عادية": streetLayer,
        "خريطة القمر الصناعي": satelliteLayer
    };
    L.control.layers(baseMaps).addTo(map);

    var marker;
    map.on('click', function (e) {
        var lat = e.latlng.lat.toFixed(6);
        var lng = e.latlng.lng.toFixed(6);

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const gouvernoratSelect = document.getElementById('gouvernorat_id');
    const delegationSelect = document.getElementById('delegation_id');
    gouvernoratSelect.addEventListener('change', function () {
        if (this.value === '') {
            delegationSelect.disabled = true;   
            delegationSelect.value = '';        
        } else {
            delegationSelect.disabled = false;  
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const programmeSelect = document.getElementById('programme_id');
    const etablissementSelect = document.getElementById('etablissement_id');
    programmeSelect.addEventListener('change', function () {
        if (this.value === '') {
            etablissementSelect.value = '';        
        } else {
            etablissementSelect.disabled = false;  
        }
    });
});
</script>
<script>
function updateCreditTotal() {
    const engager = parseInt(document.getElementById('credit_recommande_engager').value) || 0;
    const payeur = parseInt(document.getElementById('credit_recommande_Payeur').value) || 0;

    document.getElementById('credit_total').value = engager - payeur;
}

document.getElementById('credit_recommande_engager').addEventListener('input', updateCreditTotal);
document.getElementById('credit_recommande_Payeur').addEventListener('input', updateCreditTotal);
document.addEventListener('DOMContentLoaded', updateCreditTotal);
</script>
<script>
function updateDateFinTravaux() {
    const dateDebut = document.getElementById('date_debut').value;
    const duree = parseInt(document.getElementById('duree').value) || 0;

    if(dateDebut && duree > 0){
        const debut = new Date(dateDebut);
        debut.setDate(debut.getDate() + duree);
        const yyyy = debut.getFullYear();
        const mm = String(debut.getMonth() + 1).padStart(2, '0');
        const dd = String(debut.getDate()).padStart(2, '0');
        document.getElementById('date_fin_travaux').value = `${yyyy}-${mm}-${dd}`;
    } else {
        document.getElementById('date_fin_travaux').value = '';
    }
}

document.getElementById('date_debut').addEventListener('change', updateDateFinTravaux);
document.getElementById('duree').addEventListener('input', updateDateFinTravaux);

document.addEventListener('DOMContentLoaded', updateDateFinTravaux);
</script>

<style>

.modern-stepper {
    max-width: 900px;
    margin: 30px auto;
    font-family: 'Poppins', sans-serif;
}

.steps-wrapper {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    position: relative;
}

.steps-wrapper::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 5%;
    width: 90%;
    height: 4px;
    background: #e0e0e0;
    z-index: 1;
    transform: translateY(-50%);
}

.step-item {
    position: relative;
    z-index: 2;
    text-align: center;
    cursor: pointer;
    transition: .3s ease;
}

.step-circle {
    width: 45px;
    height: 45px;
    line-height: 45px;
    background: #ccc;
    color: white;
    border-radius: 50%;
    margin: auto;
    font-weight: bold;
    transition: .3s ease;
}

.step-item.active .step-circle {
    background: #0d6efd;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(13,110,253, 0.5);
}

.step-item.completed .step-circle {
    background: #198754;
}

.step-label {
    margin-top: 6px;
    font-size: 14px;
    color: #333;
}

.step-content {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    animation: fadeIn .4s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
}

.step-buttons {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.step-buttons button {
    padding: 9px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: .3s ease;
}

.btn-next { background: #0d6efd; color: white; }
.btn-back { background: #6c757d; color: white; }
.btn-complete { background: #198754; color: white; }
.btn-reset { background: #0d6efd; color: white; }

.step-buttons button:hover {
    opacity: .8;
}
</style>

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

<script>
document.addEventListener("DOMContentLoaded", function () {

    let activeStep = 0;
    let completed = {};

    const steps = document.querySelectorAll(".step-item");
    const contents = document.querySelectorAll(".step-content");

    function showStep(step) {
        contents.forEach((section, index) => {
            section.style.display = index === step ? "block" : "none";
        });
    }

    function updateUI() {
        steps.forEach((step, index) => {
            step.classList.remove("active", "completed");
            if (index === activeStep) step.classList.add("active");
            if (completed[index]) step.classList.add("completed");
        });

        document.getElementById("backBtn").style.display =
            activeStep === 0 ? "none" : "inline-block";

        showStep(activeStep);
    }

    window.goToStep = function(step) {
        activeStep = step;
        updateUI();
    };

    window.nextStep = function() {
        if (activeStep < steps.length - 1) activeStep++;
        updateUI();
    };

    window.backStep = function() {
        if (activeStep > 0) activeStep--;
        updateUI();
    };

    window.completeStep = function() {
        completed[activeStep] = true;
        nextStep();
    };

    window.resetStepper = function() {
        activeStep = 0;
        completed = {};
        updateUI();
    };

    updateUI();
});
</script>
<script>
document.getElementById('phase_projet').addEventListener('change', function () {
    const coutMarcheInput = document.getElementById('cout_marche');
    const credit_recommande_PayeurInput = document.getElementById('credit_recommande_Payeur');
    const pourcentage_avancementSelect = document.getElementById('pourcentage_avancement');
    const date_annance_offreInput = document.getElementById('date_annance_offre');
    const date_debutInput = document.getElementById('date_debut');
    const dureeInput = document.getElementById('duree');
    const date_fin_travauxInput = document.getElementById('date_fin_travaux');
    const date_acceptation_temporaireInput = document.getElementById('date_acceptation_temporaire');
    const date_acceptation_finaleInput = document.getElementById('date_acceptation_finale');
    
    if (this.value === 'في طور اعداد الملف المرجعي') {
        coutMarcheInput.disabled = true;
        credit_recommande_PayeurInput.disabled = true ;
        pourcentage_avancementSelect.disabled = true ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = true;
        date_debutInput.disabled = true;
        dureeInput.disabled = true;
        date_fin_travauxInput.disabled = true;
        date_acceptation_temporaireInput.disabled = true;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        credit_recommande_PayeurInput.value = '';
        pourcentage_avancementSelect.value = '';    
    } 

else if (this.value === 'بصدد الدراسة') {
        coutMarcheInput.disabled = true;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = true ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = true;
        date_debutInput.disabled = true;
        dureeInput.disabled = true;
        date_fin_travauxInput.disabled = true;
        date_acceptation_temporaireInput.disabled = true;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        pourcentage_avancementSelect.value = '';    
    }  else if (this.value === 'بصدد الانجاز' || this.value === 'توقف الأشغال' ) {
        coutMarcheInput.disabled = false;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = false ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = false;
        date_debutInput.disabled = false;
        dureeInput.disabled = false;
        date_fin_travauxInput.disabled = false;
        date_acceptation_temporaireInput.disabled = true;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        pourcentage_avancementSelect.value = '';    
    }
    
    else if (this.value === 'بصدد طلب العروض') {
        coutMarcheInput.disabled = false;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = true ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = false;
        date_debutInput.disabled = true;
        dureeInput.disabled = true;
        date_fin_travauxInput.disabled = true;
        date_acceptation_temporaireInput.disabled = true;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        pourcentage_avancementSelect.value = '';    
    }

    else if (this.value === 'اعادة طلب العروض') {
        coutMarcheInput.disabled = false;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = false ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = false;
        date_debutInput.disabled = false;
        dureeInput.disabled = false;
        date_fin_travauxInput.disabled = false;
        date_acceptation_temporaireInput.disabled = true;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        pourcentage_avancementSelect.value = '';    
    }
    
    
    else if (this.value === 'قبول وقتي') {
        coutMarcheInput.disabled = false;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = false ;
        date_annance_offreInput.value = '';
        date_debutInput.value = '';
        dureeInput.value = '';
        date_fin_travauxInput.value = '';
        date_acceptation_temporaireInput.value = '';
        date_acceptation_finaleInput.value = '';
        date_annance_offreInput.disabled = false;
        date_debutInput.disabled = false;
        dureeInput.disabled = false;
        date_fin_travauxInput.disabled = false;
        date_acceptation_temporaireInput.disabled = false;
        date_acceptation_finaleInput.disabled = true;    
        coutMarcheInput.value = '';
        pourcentage_avancementSelect.value = '';    
    }
    else {
        coutMarcheInput.disabled = false;
        credit_recommande_PayeurInput.disabled = false ;
        pourcentage_avancementSelect.disabled = false ;
        date_annance_offreInput.disabled = false;
        date_debutInput.disabled = false;
        dureeInput.disabled = false;
        date_fin_travauxInput.disabled = false;
        date_acceptation_temporaireInput.disabled = false;
        date_acceptation_finaleInput.disabled = false;
    }
}); 
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const natureSelect = document.getElementById('nature_projet_id');
    const etabSelect   = document.getElementById('name_etablissement_id');
    const description  = document.getElementById('description');

    function updateDescription() {
        const natureText = natureSelect.options[natureSelect.selectedIndex]?.text || '';
        const etabText   = etabSelect.options[etabSelect.selectedIndex]?.text || '';
        if (natureText && etabText) {
            description.value = natureText + ' - ' + etabText;
        }
    }

    natureSelect.addEventListener('change', updateDescription);
    etabSelect.addEventListener('change', updateDescription);

});
</script><?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/projet/create.blade.php ENDPATH**/ ?>