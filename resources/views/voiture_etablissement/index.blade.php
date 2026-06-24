
<x-master title="Gestion de gouvernorat">
  <div class="content">

    @if (Auth::user()->is_admin)
        @include('partials.sidebar.admin.sidebar') 
    @else
        @include('partials.sidebar.user.sidebar') 
    @endif

    
    <div class="row">
        <x-voiture_etablissement-table :voiture_etablissements="$voiture_etablissements"  :action_charter="$action_charter" />  
    </div>
    {{ $voiture_etablissements->links() }}

</x-master>