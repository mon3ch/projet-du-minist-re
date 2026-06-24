
<x-master title="Gestion de gouvernorat">
  <div class="content">

    @if (Auth::user()->is_admin)
        {{-- Include the sidebar partial --}}
        @include('partials.sidebar.admin.sidebar') 
    @else
        {{-- Include the sidebar partial --}}
        @include('partials.sidebar.user.sidebar') 
    @endif

    
    <div class="row">
        <x-etablissement-sous-supervision-table :etablissement_sous_supervisions="$etablissement_sous_supervisions" :action_charter="$action_charter" /> 
    </div>
    {{ $etablissement_sous_supervisions->links() }}

</x-master>