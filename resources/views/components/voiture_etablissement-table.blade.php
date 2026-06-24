@props(['voiture_etablissements', 'action_charter'])

<div class="d-flex align-items-center justify-content-between mb-3">
  <h5 class="m-0">
    <i class="fa-solid fa-users-gear me-2"></i> 	وسائل النقل
  </h5>
  <span class="text-muted small">
            <button class="btn btn-primary quick-btn">
                <a href="{{ route('voiture_etablissement.createByCharter', $action_charter) }}" class="text-white text-decoration-none">
                    <i class="fa-solid fa-plus me-2"></i>
                  إضافة وسائل النقل 
                </a>
            </button>
  </span>
</div>

<div class="soft-card p-3 mb-4" data-aos="fade-up">
  <div class="p-0">
    <div class="table-responsive">
      <table class="align-middle mb-0 table-hover" style="width: 100%;">
        <thead class="table-light">
          <tr>
            <th>id</th>
            <th>نوع السيارة</th>
            <th>اللوحة المنجمية</th>
            <th>المؤسسة</th>
            <th>تتبعات</th>
            <th>الاجراءت</th>
          </tr>
        </thead>

        <tbody class="table-modern">
          @foreach($voiture_etablissements as $index => $voiture_etablissement)
          <tr>
            <td>{{ $voiture_etablissement->id }}</td>
            <td>{{ $voiture_etablissement->type_voiture ?? '-' }}</td>
            <td>{{ $voiture_etablissement->matriculation ?? '-' }}</td>
            <td>{{ optional($voiture_etablissement->name_etablissement)->name ?? '-' }}</td>
            <td>
                {!! nl2br(e($voiture_etablissement->suivi_voiture ?? '-')) !!}
            </td>

            <td class="text-center">
              <form action="{{ route('voiture_etablissement.edit', $voiture_etablissement->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-primary me-1">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </form>
              <!--
              <form action="{{ route('voiture_etablissement.destroy', $voiture_etablissement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.delete_question') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>-->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<x-delete />
