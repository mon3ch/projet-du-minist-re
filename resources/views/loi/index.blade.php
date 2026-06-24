<x-master title="Gestion de gouvernorat">
  <div class="content">
    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')
   
         <x-action-charter-text :loi="$loi" />
    

</x-master>