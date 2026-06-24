
<x-master title="User Management">
  <div class="content">

    {{-- Include the sidebar partial --}}
    @include('partials.sidebar.admin.sidebar')

    <div class="row">
        {{-- Display each profile using the profile-card component --}} 
 
            <x-profile-table :profiles="$profiles" />
       
    </div>
    {{ $profiles->links() }}

</x-master>