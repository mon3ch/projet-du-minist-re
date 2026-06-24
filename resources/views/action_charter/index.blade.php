
<x-master title="Gestion de gouvernorat">
  <div class="content">

    @if (Auth::user()->is_admin)
        @include('partials.sidebar.admin.sidebar') 
    @else
        @include('partials.sidebar.user.sidebar') 
    @endif

    
    <div class="row">
        <x-action-charter-table :action_charters="$action_charters"  :loi="$loi"/>  
    </div>
    {{ $action_charters->links() }}

</x-master>