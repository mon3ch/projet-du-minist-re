
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="m-0"><i class="fa-solid fa-folder-open"></i> {{ __('messages.projects_list') }} ({{ $projets->count() }})</h5>
      <span class="text-muted small">      
          <button class="btn btn-success quick-btn">
            <a href="{{ url('/projects/export') }}"  class="nav-link">
                <i class="fa-solid fa-file-excel"></i> {{ __('messages.download_Excel') }}
            </a>
        </button>
        <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="{{ route('projet.create') }}"> <i class="fa-solid fa-plus me-1"></i> {{ __('messages.add_project') }} </a>
        </button>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
{{--
<input type="file" id="excel_file" accept=".xls,.xlsx">
<button  class="btn btn-primary quick-btn" onclick="readExcel()">قراءة Excel وتسجيل  </button>
 --}}
<div id="preview"></div>

<script>
function excelDateToJSDate(serial) {
    const utc_days  = Math.floor(serial - 25569);
    const utc_value = utc_days * 86400;
    const date_info = new Date(utc_value * 1000);

    const fractional_day = serial - Math.floor(serial);
    const total_seconds = Math.floor(86400 * fractional_day);

    const seconds = total_seconds % 60;
    const hours = Math.floor(total_seconds / 3600);
    const minutes = Math.floor(total_seconds / 60) % 60;

    date_info.setHours(hours);
    date_info.setMinutes(minutes);
    date_info.setSeconds(seconds);

    return date_info.toISOString().split('T')[0]; // YYYY-MM-DD
}

function readExcel() {
    let file = document.getElementById('excel_file').files[0];
    if (!file) {
        alert("اختر ملف Excel!");
        return;
    }

    let reader = new FileReader();
    reader.onload = function(e) {
        let data = e.target.result;
        let workbook = XLSX.read(data, { type: 'binary' });
        let sheet = workbook.Sheets[workbook.SheetNames[0]];
        let rows = XLSX.utils.sheet_to_json(sheet, { defval: null }); // defval لتجنب undefined

        const dateFields = [
            'تاريخ القبول النهائي',
            'تاريخ القبول الوقتي',
            'تاريخ انتهاء الأشغال',
            'تاريخ بداية الأشغال'
        ];

        rows = rows.map(row => {
            dateFields.forEach(field => {
                if(row[field] && !isNaN(row[field])){
                    row[field] = excelDateToJSDate(row[field]);
                }
            });

            if(row['نوع المشروع_1']){
                row['نوع المشروع'] = row['نوع المشروع_1'];
                delete row['نوع المشروع_1'];
            }

            return row;
        });

        console.log("البيانات المقروءة من Excel:");
        console.table(rows);

        let preview = document.getElementById('preview');
        preview.innerHTML = "<pre>" + JSON.stringify(rows, null, 2) + "</pre>";

        sendDataToServer(rows);
    };
    reader.readAsBinaryString(file);
}

function sendDataToServer(rows) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/import-json', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ data: rows })
    })
    .then(response => {
        if (!response.ok) throw new Error('HTTP error ' + response.status);
        return response.json();
    })
    .then(result => {
        if(result.success){
            alert("تم استيراد البيانات بنجاح!");
        } else {
            alert("حدث خطأ أثناء الاستيراد!");
            console.log(result);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("حدث خطأ أثناء الاتصال بالخادم: " + error.message);
    });
}
</script>


        
        </span>

        </div>
        
         <form method="GET" action="{{ route('projet.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                      placeholder="{{ __('messages.search_placeholder') }}"
                      value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-search"></i> {{ __('messages.search') }}
                </button>
            </div>
        </form>

   <div class="soft-card p-3 mb-4" data-aos="fade-up">


              <div class=" p-0">
                <div class="table-responsive">
                  <table class="align-middle mb-0 table-hover" style="width: 100%;">
                    <thead class="table-light">
                      <tr>
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.responsable') }}</th>
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.gouvernorat') }}</th>
                        {{-- <th scope="col" style="padding-left: 15px;">{{ __('messages.delegation') }}</th>
                        
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.project_name') }}</th>
                        --}}
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.programme') }}</th>
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.name_etablissement') }}</th>
                        <th scope="col" style="padding-left: 15px;">{{ __('messages.description') }}</th>
                        {{--  <th scope="col">{{ __('messages.financement') }}</th>
                        <th scope="col">{{ __('messages.avancement') }}</th>
                        <th scope="col">{{ __('messages.remarque') }}</th>
                        <th scope="col">{{ __('messages.date') }}</th>
                        <th scope="col">{{ __('messages.budget') }}</th>
                        <th scope="col">{{ __('messages.offer_date') }}</th>
                        <th scope="col">{{ __('messages.offer_open_date') }}</th>
                        <th scope="col">{{ __('messages.cout_marche') }}</th>
                        <th scope="col">{{ __('messages.start_date') }}</th>
                        <th scope="col">{{ __('messages.duration') }}</th>
                        <th scope="col">{{ __('messages.percent_avancement') }}</th>
                        <th scope="col">{{ __('messages.acceptation_temp') }}</th>
                        <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Gouvernorat</th>
                        <th scope="col">Délégation</th>
                        <th scope="col">Etablissement</th>
                        <th scope="col">projet</th>
                        <th scope="col">Description</th>
                       <th scope="col">Financement</th>
                        <th scope="col">Avancement</th>
                        <th scope="col">Remarque</th>
 
                        <th scope="col">Date</th>
                        <th scope="col">Estimation budgetaire</th>
                        <th scope="col">Date d'annence de l'offre</th>
                        <th scope="col">Date d'ouverture de l'appele d'offre</th>
                        <th scope="col">Cout du marché</th>
                        <th scope="col">Date début de traveaux</th>
                        <th scope="col">durée de traveaux</th>
                        <th scope="col">porcentage d'avancement du traveaux</th>
                        <th scope="col">date d'acceptation temporaire</th>--}}

                        <th scope="col" class="text-center">{{ __('messages.actions') }}</th>
                      </tr>
                    </thead>
                    <tbody class="table-modern">
                      @foreach($projets as $index => $projet)
                        <td class="text-center" style="padding-left: 15px;">
                            <img 
                                src="{{ asset('storage/' . ($projet->profile->image ?? 'default.png')) }}" 
                                alt="User Image" 
                                class="rounded-circle" 
                                width="30" height="30"
                                data-bs-toggle="popover"
                                data-bs-trigger="hover focus"
                                data-bs-html="true"
                                title="{{ $projet->profile->first_name }} {{ $projet->profile->last_name }}"
                                data-bs-content="
                                    <strong>{{ __('messages.email') }} : </strong> {{ $projet->profile->email ?? 'N/A' }}<br>
                                    <strong>{{ __('messages.active') }} :</strong> {{ $projet->profile->is_active ? '✅' : '❌' }}  
                                    <strong>{{ __('messages.admin') }} :</strong> {{ $projet->profile->is_admin ? '✅' : '❌' }}"
                            >
                        </td>

                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="{{ $projet->gouvernorat->name }}">
                            {{ $projet->gouvernorat->name }}
                        </td>
<!--
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="{{ $projet->delegation->name }}">
                            {{ $projet->delegation->name }}
                        </td>
                    -->
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="{{ $projet->programme?->name }}">
                            {{ $projet->programme?->name }}
                        </td>                    
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $projet->name_etablissement?->name }}
                        </td>
                      
{{-- 
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="{{ $projet->nom_projet }}">
                            {{ $projet->nom_projet }}
                        </td>
--}}

                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="{{ $projet->description }}">
                            {{ $projet->description }}
                        </td>

                        
                      <td class="text-center" style="padding-left: 15px;"> 
                            
                          <form action="{{ route('projet.edit', $projet->id) }}" method="GET" class="d-inline">
                              @csrf
                              <button type="submit" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editUserModal">
                              <i class="fa-solid fa-pen"></i>
                            </button>
                          </form>

                          {{-- if user isAdmin != true masquée button supprimer--}}
                          @if (Auth::user()->is_admin)

                          <form action="{{ route('projet.destroy', $projet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
                              @csrf
                              @method('DELETE')
                          <button  type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </form>
                            @endif
                        </td>
                      </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    });
</script>

<x-delete />