
<x-master title="Gestion de gouvernorat">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
 
            <x-etablissement-table :etablissements="$etablissements" />
       
    </div>
    {{ $etablissements->links() }}

</x-master>