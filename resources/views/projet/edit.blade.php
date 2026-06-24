<x-master title="Projet page">
    <div class="content">

    @if (Auth::user()->is_admin)
        @include('partials.sidebar.admin.sidebar') 
    @else
        @include('partials.sidebar.user.sidebar') 
    @endif

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fa-solid fa-diagram-project me-2"></i> {{ __('messages.add_project') }} </h4>
    </div>

    <div class="container mt-4">
        <p class="text-muted mb-3 zoom-anim text-danger"> {{ __('messages.obligatory_fields') }}</p>

        <div class="p-3 mb-4" data-aos="fade-up">
            <div class="p-4">


                    <form action="{{ route('projet.update',$projet->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')





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


                            <div class="col-md-6 d-flex align-items-center">
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" 
                                    alt="Profile" 
                                    class="rounded-circle border shadow-sm me-3" 
                                    width="60" height="60">

                                <div>
                                    <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong><br>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </div>

                          {{--  <!-- Nom projet -->
                            <div class="col-md-6">
                                <label for="nom_projet" class="form-label"><span class="text-danger">*</span> {{ __('messages.project_name') }}</label>
                                <input type="text" class="form-control" id="nom_projet" name="nom_projet"
                                    value="{{ old('nom_projet',$projet->nom_projet) }}" placeholder="{{ __('messages.project_name') }}">
                                @error('nom_projet')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>--}}
                       
                            <div class="col-md-6">
                                <label for="description" class="form-label"><span class="text-danger">*</span> {{ __('messages.description') }}</label>
                                <textarea class="form-control" id="description" name="description" readonly placeholder="سيتم تحديد هذه القيمة تلقائيا">{{ old('description',$projet->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--
                            <div class="col-md-12">
                                <label for="details_projet" class="form-label"><span class="text-danger">*</span> {{ __('messages.details_projet') }}</label>
                                <textarea class="form-control" id="details_projet" name="details_projet" placeholder="{{ __('messages.details_projet') }}">{{ old('details_projet',$projet->details_projet) }}</textarea>
                                @error('details_projet')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            --}}

                            <div class="col-md-6">
                                <label for="gouvernorat_id" class="form-label"><span class="text-danger">*</span> {{ __('messages.gouvernorat') }}</label>
                                <select name="gouvernorat_id" id="gouvernorat_id"
                                    class="form-select shadow-sm border-primary select2">
                                    <option value="">{{ __('messages.select_governorate') }}</option>
                                    @foreach($gouvernorats as $gouvernorat)
                                        <option value="{{ $gouvernorat->id }}" {{ old('gouvernorat_id',$projet->gouvernorat_id) == $gouvernorat->id ? 'selected' : '' }}>
                                            {{ $gouvernorat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gouvernorat_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="delegation_id" class="form-label"> <span class="text-danger">*</span> {{ __('messages.delegation') }}</label>
                                <select name="delegation_id" id="delegation_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_delegation') }}</option>
                                    @foreach($delegations as $delegation)
                                        <option value="{{ $delegation->id }}" {{ old('delegation_id',$projet->delegation_id) == $delegation->id ? 'selected' : '' }}>
                                            {{ $delegation->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('delegation_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="programme_id" class="form-label"><span class="text-danger">*</span> {{ __('messages.programme') }}</label>
                                <select name="programme_id" id="programme_id"
                                    class="form-select shadow-sm border-primary select2">
                                    <option value="">{{ __('messages.select_programme') }}</option>
                                    @foreach($programmes as $programme)
                                        <option value="{{ $programme->id }}" {{ old('programme_id',$projet->programme_id) == $programme->id ? 'selected' : '' }}>
                                            {{ $programme->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('programme_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="etablissement_id" class="form-label"> <span class="text-danger">*</span> {{ __('messages.type_etablissement') }}</label>
                                <select name="etablissement_id" id="etablissement_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_type_etablissement') }}</option>
                                    @foreach($etablissements as $etablissement)
                                        <option value="{{ $etablissement->id }}" {{ old('etablissement_id', $projet->etablissement_id) == $etablissement->id ? 'selected' : '' }}>
                                            {{ $etablissement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('etablissement_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="name_etablissement_id" class="form-label"> <span class="text-danger">*</span> {{ __('messages.name_etablissement') }}</label>   
                                <select  name="name_etablissement_id" id="name_etablissement_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_name_etablissement') }}</option>
                                    @foreach($names_etablissements as $name_etablissement)
                                        <option value="{{ $name_etablissement->id }}" {{ old('name_etablissement_id',$projet->name_etablissement_id) == $name_etablissement->id ? 'selected' : '' }}>
                                            {{ $name_etablissement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name_etablissement_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>


                            </div>
    </div>

    <div class="step-content" id="step-1" style="display:none;">
        <h5 class="mb-3">✔ معلومات خاصة بالمشروع</h5>

        <div class="row">               
                            <div class="col-md-6">
                                <label for="nature_projet_id" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.nature_projet') }} 
                                </label>
                                <select name="nature_projet_id" id="nature_projet_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_nature_projet') }}</option>
                                    @foreach($nature_projets as $nature_projet)
                                        <option value="{{ $nature_projet->id }}" {{ old('nature_projet_id',$projet->nature_projet_id) == $nature_projet->id ? 'selected' : '' }}>
                                            {{ $nature_projet->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nature_projet_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="type_projet_id" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.type_projet') }}
                                </label>
                                <select name="type_projet_id" id="type_projet_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_type_projet') }}</option>
                                    @foreach($type_projets as $type_projet)
                                        <option value="{{ $type_projet->id }}" {{ old('type_projet_id',$projet->type_projet_id) == $type_projet->id ? 'selected' : '' }}>
                                            {{ $type_projet->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_projet_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
     
                            <div class="col-md-4">
                                <label for="situation_etablissement_fonctionnelle" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.situation_etablissement_fonctionnelle') }}
                                </label>
                                <select name="situation_etablissement_fonctionnelle" id="situation_etablissement_fonctionnelle" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_situation_etablissement_fonctionnelle') }}</option>
                                    <option value="وظيفية" {{ old('situation_etablissement_fonctionnelle',$projet->situation_etablissement_fonctionnelle) == 'وظيفية'? 'selected' : '' }}>
                                        وظيفية
                                    </option>

                                    <option value="غير وظيفية" {{ old('situation_etablissement_fonctionnelle',$projet->situation_etablissement_fonctionnelle) == 'غير وظيفية'? 'selected' : '' }}>
                                        غير وظيفية
                                    </option>
                                    
                                    <option value="أرض بيضاء" {{ old('situation_etablissement_fonctionnelle',$projet->situation_etablissement_fonctionnelle) == 'أرض بيضاء'? 'selected' : '' }}>
                                        أرض بيضاء
                                    </option>
                                    
                                    <option value="مغلق" {{ old('situation_etablissement_fonctionnelle',$projet->situation_etablissement_fonctionnelle) == 'مغلق'? 'selected' : '' }}>
                                        مغلق 
                                    </option>
                                    
                                    <option value="مغلق جزئيا" {{ old('situation_etablissement_fonctionnelle',$projet->situation_etablissement_fonctionnelle) == 'مغلق جزئيا'? 'selected' : '' }}>
                                        مغلق جزئيا
                                    </option>
                                </select>
                                @error('situation_etablissement_fonctionnelle')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="col-md-4">
                                <label for="tranche" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.tranche') }}
                                </label>
                                <select name="tranche" id="tranche" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_tranche') }}</option>
                                    <option value="القسط الأول" {{ old('tranche',$projet->tranche) == "القسط الأول"? 'selected' : '' }}>
                                        القسط الأول
                                    </option>

                                    <option value="القسط الثاني" {{ old('tranche',$projet->tranche) == "القسط الثاني"? 'selected' : ''  }}>
                                        القسط الثاني
                                    </option>

                                    <option value="القسط الثالث" {{ old('tranche',$projet->tranche) == "القسط الثالث" ? 'selected' : ''  }}>
                                        القسط الثالث
                                    </option>

                                    <option value="القسط الرابع" {{ old('tranche',$projet->tranche) == "القسط الرابع" ? 'selected' : ''  }}>
                                        القسط الرابع
                                    </option>
                                </select>
                                @error('tranche')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="date" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.date') }}
                                </label>
                                <select class="form-control" id="date" name="date">
                                    <option value="">{{ __('messages.select_year') }}</option>
                                    @for ($year = 2000; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}" {{ old('date',$projet->date) == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                                @error('date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for=" situation_immobiliere" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.situation_immobiliere') }}
                                </label>
                                <select name="situation_immobiliere" id="situation_immobiliere" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_situation_immobiliere') }}</option>
                                    <option value="مخصص" {{ old('situation_immobiliere',$projet->situation_immobiliere) == 'مخصص'? 'selected' : '' }}>
                                        مخصص
                                    </option>

                                    <option value="غير مخصص" {{ old('situation_immobiliere',$projet->situation_immobiliere) == 'غير مخصص'? 'selected' : ''  }}>
                                        غير مخصص
                                    </option>

                                    <option value="في طور التخصيص" {{ old('situation_immobiliere',$projet->situation_immobiliere) == 'في طور التخصيص' ? 'selected' : ''  }}>
                                        في طور التخصيص
                                    </option>

                                    <option value="ملك بلدي" {{ old('situation_immobiliere',$projet->situation_immobiliere) == 'ملك بلدي' ? 'selected' : ''  }}>
                                        ملك بلدي
                                    </option>
                                    <option value="مخصص جزئيا" {{ old('situation_immobiliere',$projet->situation_immobiliere) == 'مخصص جزئيا' ? 'selected' : ''  }}>
                                        مخصص جزئيا
                                    </option>
                                </select>
                                @error('situation_immobiliere')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="financement_id" class="form-label"> <span class="text-danger">*</span> {{ __('messages.financement') }}</label>
                                <select name="financement_id" id="financement_id" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.financement') }}</option>
                                    @foreach($financements as $financement)
                                        <option value="{{ $financement->id }}" {{ old('financement_id',$projet->financement_id) == $financement->id ? 'selected' : '' }}>
                                            {{ $financement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('financement_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

        </div>
    </div>
    <div class="step-content" id="step-2" style="display:none;">
                <h5 class="mb-3">✔ الإعتمادات و نسبة تقدم المشروع</h5>

        <div class="row">
        

                             {{--                           
                            <div class="col-md-4">
                                <label for="estimation_budgetaire" class="form-label"><span class="text-danger">*</span> {{ __('messages.budget') }}</label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);" class="form-control" id="estimation_budgetaire" name="estimation_budgetaire"
                                    value="{{ old('estimation_budgetaire',$projet->estimation_budgetaire) }}" placeholder="{{ __('messages.budget') }}">
                                @error('estimation_budgetaire')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--                      

                            <div class="col-md-6">
                                <label for="phase_projet" class="form-label">
                                    <span class="text-danger">*</span> {{ __('messages.phase_projet') }}
                                </label>
                                <select name="phase_projet" id="phase_projet" class="form-select shadow-sm border-primary">
                                    <option value="">{{ __('messages.select_phase_projet') }}</option>
                                    <option value="في طور اعداد الملف المرجعي" {{ old('phase_projet',$projet->phase_projet) == 'في طور اعداد الملف المرجعي'? 'selected' : '' }}>
                                        في طور اعداد الملف المرجعي
                                    </option>
                                    
                                    <option value="بصدد الدراسة" {{ old('phase_projet',$projet->phase_projet) == 'بصدد الدراسة'? 'selected' : '' }}>
                                        بصدد الدراسة
                                    </option>


                                    <option value="بصدد الانجاز" {{ old('phase_projet',$projet->phase_projet) == 'بصدد الانجاز'? 'selected' : '' }}>
                                        بصدد الانجاز
                                    </option>
                                    
                                    <option value="توقف الأشغال" {{ old('phase_projet',$projet->phase_projet) == 'توقف الأشغال'? 'selected' : '' }}>
                                        توقف الأشغال
                                    </option>


                                    <option value="بصدد طلب العروض" {{ old('phase_projet',$projet->phase_projet) == 'بصدد طلب العروض'? 'selected' : '' }}>
                                        بصدد طلب العروض
                                    </option>
                                    
                                    <option value="اعادة طلب العروض" {{ old('phase_projet',$projet->phase_projet) == 'اعادة طلب العروض'? 'selected' : '' }}>
                                        اعادة طلب العروض 
                                    </option>

                                    <option value="قبول وقتي" {{ old('phase_projet',$projet->phase_projet) == 'قبول وقتي'? 'selected' : '' }}>
                                       قبول وقتي 
                                    </option>
                                    
                                    <option value="قبول نهائي" {{ old('phase_projet',$projet->phase_projet) == 'قبول نهائي'? 'selected' : '' }}>
                                        قبول نهائي
                                    </option>


                                </select>
                                @error('phase_projet')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="cout_marche" class="form-label"> <span class="text-danger">*</span> {{ __('messages.cout_marche') }}</label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);" class="form-control" id="cout_marche" name="cout_marche"
                                    value="{{ old('cout_marche',$projet->cout_marche) }}" placeholder="{{ __('messages.cout_marche') }}">
                                @error('cout_marche')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="credit_recommande_engager" class="form-label">{{ __('messages.credit_recommande_engager') }}</label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);" 
                                    class="form-control" id="credit_recommande_engager" 
                                    name="credit_recommande_engager"
                                    value="{{ old('credit_recommande_engager',$projet->credit_recommande_engager) }}" 
                                    placeholder="{{ __('messages.credit_recommande_engager') }}">
                                @error('credit_recommande_engager')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="credit_recommande_Payeur" class="form-label">{{ __('messages.credit_recommande_payeur') }}</label>
                                <input type="number" maxlength="4" oninput="if(this.value.length > 4) this.value = this.value.slice(0, 4);"
                                    class="form-control" id="credit_recommande_Payeur" 
                                    name="credit_recommande_Payeur"
                                    value="{{ old('credit_recommande_Payeur',$projet->credit_recommande_Payeur) }}" 
                                    placeholder="{{ __('messages.credit_recommande_payeur') }}">
                                @error('credit_recommande_Payeur')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="credit_total" class="form-label">إعتمادات الدفع المتبقية</label>
                                <input type="text" class="form-control" id="credit_total" name="credit_total" value="{{$projet->credit_recommande_Payeur + $projet->credit_recommande_engager}}" readonly>
                            </div>
                           
                            <div class="col-md-6">
                                <label for="pourcentage_avancement" class="form-label">
                                    <span class="text-danger">*</span>{{ __('messages.percent_avancement') }}
                                </label>
                                <select class="form-select" id="pourcentage_avancement" name="pourcentage_avancement">
                                    <option value="">{{ __('messages.select_option') }}</option>
                                    @for ($i = 5; $i <= 100; $i += 5)
                                        <option value="{{ $i }}" {{ old('pourcentage_avancement',$projet->pourcentage_avancement) == $i ? 'selected' : '' }}>{{ $i }}%</option>
                                    @endfor
                                </select>
                                @error('pourcentage_avancement')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="Remarque" class="form-label">{{ __('messages.remarque') }}</label>
                                <textarea class="form-control" id="Remarque" name="Remarque" placeholder="{{ __('messages.remarque') }}">{{ old('Remarque',$projet->Remarque) }}</textarea>
                                @error('Remarque')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>


     </div>

    </div>

    <div class="step-content" id="step-3" style="display:none;">
                        <h5 class="mb-3">✔ التواريخ</h5>

<div class="row">



                            <div class="col-md-6">
                                <label for="date_annance_offre" class="form-label"><span class="text-danger">*</span> {{ __('messages.offer_date') }}</label>
                                <input type="date" class="form-control" id="date_annance_offre" name="date_annance_offre"
                                    value="{{ old('date_annance_offre',$projet->date_annance_offre) }}">
                                @error('date_annance_offre')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="date_debut" class="form-label"> <span class="text-danger">*</span> {{ __('messages.start_date') }}</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut"
                                    value="{{ old('date_debut',$projet->date_debut) }}">
                                @error('date_debut')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="duree" class="form-label"> <span class="text-danger">*</span>{{ __('messages.duration') }}</label>
                                <input type="number" class="form-control" id="duree" name="duree"
                                    value="{{ old('duree',$projet->duree) }}" placeholder="{{ __('messages.duration') }}">
                                @error('duree')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="date_fin_travaux" class="form-label">{{ __('messages.date_fin_travaux') }}</label>
                                <input type="date" class="form-control" id="date_fin_travaux" name="date_fin_travaux" value="{{ old('date_fin_travaux',$projet->date_fin_travaux) }}" readonly>
                                @error('date_fin_travaux')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="date_acceptation_temporaire" class="form-label"><span class="text-danger">*</span> {{ __('messages.acceptation_temp') }}</label>
                                <input type="date" class="form-control" id="date_acceptation_temporaire" name="date_acceptation_temporaire"
                                    value="{{ old('date_acceptation_temporaire',$projet->date_acceptation_temporaire) }}">
                                @error('date_acceptation_temporaire')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6"> <label for="date_acceptation_finale" class="form-label">{{ __('messages.date_acceptation_finale') }}</label> 
                                <input type="date" class="form-control" id="date_acceptation_finale" name="date_acceptation_finale" value="{{ old('date_acceptation_finale',$projet->date_acceptation_finale) }}"> 
                                @error('date_acceptation_finale') <div class="text-danger mt-2">{{ $message }}</div> @enderror </div>
            
    </div>


    </div>
             <div class="step-content col-md-12  mt-4" id="step-4" >
                                        
                                        <p></p>
                <p class="text-danger"><b> اختر موقع المشروع من الخريطة </b></p>
                <!-- Latitude -->
                    <div class="col-md-6">
                  {{--  <label for="latitude" class="form-label">
                        <span class="text-danger">*</span> خط العرض
                    </label>--}}
                    <input type="hidden" class="form-control" readonly id="latitude" name="latitude"
                        value="{{ old('latitude',$projet->latitude) }}" placeholder="مثال : 36.8065">
                    @error('latitude')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <input type="hidden" class="form-control" readonly id="longitude" name="longitude"
                        value="{{ old('longitude',$projet->longitude) }}" placeholder="مثال : 10.1815">
                    @error('longitude')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mt-4">
                    <label class="form-label"> حدد الموقع ثم انقر عليه. </label>
                    <div id="map" style="height: 400px; border-radius: 10px; overflow: hidden;"></div>
                </div>


            <div id="resetSection" style="display:none; margin-top:20px;">
                <p class="text-success fw-bold">🎉 جميع الخطوات اكتملت!</p>
                <button type="button" class="btn-reset" onclick="resetStepper()">إعادة</button>
            </div>
            


                    </form>

                </div>
    <div class="step-buttons">
        <button type="button" class="btn-back" id="backBtn" onclick="backStep()">رجوع</button>
        <button type="button" class="btn-next" onclick="nextStep()">التالي</button>
        <button class="btn btn-success">تأكيد وإرسال</button>
    </div>
            </div>
            
        </div>
    </div>

<script>
document.getElementById('gouvernorat_id').addEventListener('change', function () {
    let gouvernoratId = this.value;
    let delegationSelect = document.getElementById('delegation_id');
const selectedDelegation = delegationSelect.getAttribute('data-selected');
  

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
    var existingLat = parseFloat(document.getElementById('latitude').value);
    var existingLng = parseFloat(document.getElementById('longitude').value);
    var initialLat = existingLat || 34.0;
    var initialLng = existingLng || 9.0;
    var initialZoom = existingLat && existingLng ? 13 : 6; 
    var map = L.map('map').setView([initialLat, initialLng], initialZoom);
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

    if (existingLat && existingLng) {
        marker = L.marker([existingLat, existingLng]).addTo(map);
    }

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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const etablissementSelect = document.getElementById('etablissement_id');
    const namesSelect = document.getElementById('name_etablissement_id');
    etablissementSelect.addEventListener('change', function () {
        let etabId = this.value;
        let gouvernoratId = document.getElementById('gouvernorat_id').value;

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
document.addEventListener('DOMContentLoaded', function () {

    const phaseProjet = document.getElementById('phase_projet');

    const coutMarcheInput = document.getElementById('cout_marche');
    const credit_recommande_PayeurInput = document.getElementById('credit_recommande_Payeur');
    const pourcentage_avancementSelect = document.getElementById('pourcentage_avancement');

    const date_annance_offreInput = document.getElementById('date_annance_offre');
    const date_debutInput = document.getElementById('date_debut');
    const dureeInput = document.getElementById('duree');
    const date_fin_travauxInput = document.getElementById('date_fin_travaux');
    const date_acceptation_temporaireInput = document.getElementById('date_acceptation_temporaire');
    const date_acceptation_finaleInput = document.getElementById('date_acceptation_finale');

    function updateFields() {
        const value = phaseProjet.value;

        if (value === 'في طور اعداد الملف المرجعي') {
            coutMarcheInput.disabled = true;
            credit_recommande_PayeurInput.disabled = true;
            pourcentage_avancementSelect.disabled = true;

            date_annance_offreInput.disabled = true;
            date_debutInput.disabled = true;
            dureeInput.disabled = true;
            date_fin_travauxInput.disabled = true;
            date_acceptation_temporaireInput.disabled = true;
            date_acceptation_finaleInput.disabled = true;

        } else if (value === 'بصدد الدراسة') {
            coutMarcheInput.disabled = true;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = true;

            date_annance_offreInput.disabled = true;
            date_debutInput.disabled = true;
            dureeInput.disabled = true;
            date_fin_travauxInput.disabled = true;
            date_acceptation_temporaireInput.disabled = true;
            date_acceptation_finaleInput.disabled = true;

        } else if (value === 'بصدد الانجاز' || value === 'توقف الأشغال') {
            coutMarcheInput.disabled = false;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = false;

            date_annance_offreInput.disabled = false;
            date_debutInput.disabled = false;
            dureeInput.disabled = false;
            date_fin_travauxInput.disabled = false;
            date_acceptation_temporaireInput.disabled = true;
            date_acceptation_finaleInput.disabled = true;

        } else if (value === 'بصدد طلب العروض') {
            coutMarcheInput.disabled = false;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = true;

            date_annance_offreInput.disabled = false;
            date_debutInput.disabled = true;
            dureeInput.disabled = true;
            date_fin_travauxInput.disabled = true;
            date_acceptation_temporaireInput.disabled = true;
            date_acceptation_finaleInput.disabled = true;

        } else if (value === 'اعادة طلب العروض') {
            coutMarcheInput.disabled = false;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = false;

            date_annance_offreInput.disabled = false;
            date_debutInput.disabled = false;
            dureeInput.disabled = false;
            date_fin_travauxInput.disabled = false;
            date_acceptation_temporaireInput.disabled = true;
            date_acceptation_finaleInput.disabled = true;

        } else if (value === 'قبول وقتي') {
            coutMarcheInput.disabled = false;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = false;

            date_annance_offreInput.disabled = false;
            date_debutInput.disabled = false;
            dureeInput.disabled = false;
            date_fin_travauxInput.disabled = false;
            date_acceptation_temporaireInput.disabled = false;
            date_acceptation_finaleInput.disabled = true;

        } else {
            coutMarcheInput.disabled = false;
            credit_recommande_PayeurInput.disabled = false;
            pourcentage_avancementSelect.disabled = false;

            date_annance_offreInput.disabled = false;
            date_debutInput.disabled = false;
            dureeInput.disabled = false;
            date_fin_travauxInput.disabled = false;
            date_acceptation_temporaireInput.disabled = false;
            date_acceptation_finaleInput.disabled = false;
        }
    }

    phaseProjet.addEventListener('change', updateFields);

    updateFields();
});
</script>

</x-master>
<script>
document.addEventListener('DOMContentLoaded', function() {

    const gouvernoratSelect = document.getElementById('gouvernorat_id');
    const delegationSelect = document.getElementById('delegation_id');
    const programmeSelect = document.getElementById('programme_id');
    const etablissementSelect = document.getElementById('etablissement_id');
    const nameEtablissementSelect = document.getElementById('name_etablissement_id');
    gouvernoratSelect.addEventListener('change', function() {
        let govId = this.value;
        fetch(`/delegations/${govId}`)
            .then(res => res.json())
            .then(data => {
                delegationSelect.innerHTML = '<option value="">{{ __("messages.select_delegation") }}</option>';
                data.forEach(d => delegationSelect.innerHTML += `<option value="${d.id}">${d.name}</option>`);
            });
        nameEtablissementSelect.innerHTML = '<option value="">{{ __("messages.select_name_etablissement") }}</option>';
        //document.getElementById('etablissement_id').innerHTML = '<option value="">{{ __("messages.select_type_etablissement") }}</option>';
        document.getElementById('etablissement_id').value = '';
    });

    programmeSelect.addEventListener('change', function() {
        let progId = this.value;

        fetch(`/etablissements/${progId}`)
            .then(res => res.json())
            .then(data => {
                etablissementSelect.innerHTML = '<option value="">{{ __("messages.select_type_etablissement") }}</option>';
                data.forEach(e => etablissementSelect.innerHTML += `<option value="${e.id}">${e.name}</option>`);
                nameEtablissementSelect.innerHTML = '<option value="">{{ __("messages.select_name_etablissement") }}</option>';
            });
    });

    etablissementSelect.addEventListener('change', function() {
        let etabId = this.value;
        let govId = gouvernoratSelect.value;

        if(etabId && govId){
            fetch(`/names_etablissements/${govId}/${etabId}`)
                .then(res => res.json())
                .then(data => {
                    nameEtablissementSelect.innerHTML = '<option value="">{{ __("messages.select_name_etablissement") }}</option>';
                    data.forEach(n => nameEtablissementSelect.innerHTML += `<option value="${n.id}">${n.name}</option>`);
                });
        } else {
            nameEtablissementSelect.innerHTML = '<option value="">{{ __("messages.select_name_etablissement") }}</option>';
        }
    });

});
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
document.addEventListener('DOMContentLoaded', function () {

    const natureSelect = document.getElementById('nature_projet_id');
    const etabSelect   = document.getElementById('name_etablissement_id');
    const description  = document.getElementById('description');

    function buildDescription() {
        const natureText = natureSelect.options[natureSelect.selectedIndex]?.text || '';
        const etabText   = etabSelect.options[etabSelect.selectedIndex]?.text || '';

        if (!natureText || !etabText) return '';

        return natureText + ' - ' + etabText;
    }

    function updateDescription(force = false) {
        const newDesc = buildDescription();
        if (!newDesc) return;

        if (force || description.value.trim() !== newDesc) {
            description.value = newDesc;
        }
    }

    updateDescription(true);

    natureSelect.addEventListener('change', () => updateDescription());
    etabSelect.addEventListener('change', () => updateDescription());

});
</script>
