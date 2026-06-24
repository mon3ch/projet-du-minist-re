
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
            <x-projet-table :projets="$projets" />
    </div>
    {{ $projets->links() }}

</x-master>