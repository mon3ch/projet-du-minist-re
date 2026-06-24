
<x-master title="Gestion de gouvernorat">
  <div class="content">
    @include('partials.sidebar.admin.sidebar')
    <div class="row">
            <x-type-projet-table :typeProjet="$type_projets" />
    </div>
    {{ $type_projets->links() }}

</x-master>