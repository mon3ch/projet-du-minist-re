<x-master title="Gestion de gouvernorat">
  <div class="content">
    {{-- Include the sidebar partial --}}

        @if (Auth::user()->is_admin)
            {{-- Include the sidebar partial --}}
            @include('partials.sidebar.admin.sidebar') 
        @else
            {{-- Include the sidebar partial --}}
            @include('partials.sidebar.user.sidebar') 
        @endif
         <x-quatre_analyses-table :quatre_analyses="$quatre_analyses" :action_charter="$action_charter"  :loi="$loi" />
    

</x-master>