
<x-master title="Gestion de gouvernorat">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
 
            <x-programme-table :programmes="$programmes" />
       
    </div>
    {{ $programmes->links() }}

</x-master>