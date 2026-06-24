
<x-master title="Gestion de financement">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
 
            <x-financement-table :financements="$financements" />
       
    </div>
    {{ $financements->links() }}

</x-master>