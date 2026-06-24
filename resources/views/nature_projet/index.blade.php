
<x-master title="Gestion nature de projet">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
            <x-nature-projet-table :natureProjets="$nature_projets" />
    </div>
    {{ $nature_projets->links() }}

</x-master>