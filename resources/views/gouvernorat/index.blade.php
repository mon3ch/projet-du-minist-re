
<x-master title="Gestion de gouvernorat">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
 
            <x-gouvernorat-table :gouvernorats="$gouvernorats" />
       
    </div>
    {{ $gouvernorats->links() }}

</x-master>