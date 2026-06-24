@props(['action_charters'])
    <div class="row">
<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users-gear me-2"></i>
     ميثاق التصرف الجهوي
  </h5>
  <span class="text-muted small">

    @if (Auth::user()->is_admin)
         <button class="btn btn-primary quick-btn">
    <a href="{{ route('action_charter.create') }}" class="text-white text-decoration-none">
      <i class="fa-solid fa-plus me-2"></i> إضافة ميثاق تصرف جهوي
          </a>
        </button>
  
    @endif
           
  </span>
</div>
@include('components.action-charter-text')

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th scope="col">  رئيس البرنامج</th>
            <th scope="col">ممثلا في شخص رئيسه </th>
            <th scope="col">الولاية</th>  
            <th scope="col">استراتيجية البرنامج</th> 
            <th scope="col">الاجراءت</th>  
          </tr>
        </thead>
        <tbody class="table-modern">
          @foreach($action_charters as $index => $action_charter)
          <tr>
            <td>{{ $action_charter->id }}</td>
            <td>{{ $action_charter->name_responsable_programme }}</td>
            <td>{{ $action_charter->name_programmer }}</td>
            
              <td>
              <span class="badge bg-info text-dark">
                {{ $action_charter->gouvernorat->name ?? '—' }}
              </span>
            </td>
            <td>{{ $action_charter->strategie_programme }}</td> 
            
            <td class="text-center">
              <div class="dropdown">
                <button  class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  اجراءت
                </button>
                <ul class="dropdown-menu">
                  @if ( Auth::user()->is_admin )
                    <li>
                    <form action="{{ route('action_charter.edit', $action_charter->id) }}" method="GET" class="d-inline">
                      @csrf
                      <button type="submit" style="width: -webkit-fill-available;" class="btn btn-sm btn-outline-primary me-1">
                        تعديل ميثاق التصرف <i class="fa-solid fa-pen"></i>
                      </button>
                    </form>
                  </li>
                  @endif                  
                  <li><a class="dropdown-item" href="{{ route('voiture_etablissement.indexByCharter', $action_charter->id) }}">  	وسائل النقل</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('etablissement_sous_supervision.indexByCharter', $action_charter->id) }}">
                      المؤسسات تحت الإشراف
                  </a>
                  </li>
                  <li><a class="dropdown-item" href="{{ route('etablissement_rh.indexByCharter', $action_charter->id) }}">	توزيع الموارد البشرية بالمؤسسات تحت الإشراف  </a></li>
                  <li><a class="dropdown-item" href="{{ route('quatre_analyses.indexByCharter', $action_charter->id) }}">	التحليل الرباعي لواقع المندوبية   </a></li>
                
                </ul>
              
              <!-- Delete
              <form action="{{ route('action_charter.destroy', $action_charter->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form> -->
            </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<x-delete />
