
<x-master title="Gestion de gouvernorat">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
 
            <x-delegation-table :delegations="$delegations" />
       
    </div>
    {{ $delegations->links() }}

</x-master>