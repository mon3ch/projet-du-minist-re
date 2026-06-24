<style>
.sidebar {
    max-height: 100vh; 
    overflow-y: auto; 
    overflow-x: hidden; 
}
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #555;
}
  </style>

  <div class="sidebar {{ app()->getLocale() == 'ar' ? 'sidebar-rtl' : 'sidebar-ltr' }}">
    <img src="{{ asset('storage/logo/logo.png') }}" 
        style="margin-bottom: 12px;"
                 alt="Login illustration" 
                 class="img-fluid mt-4 rounded-3 ">
    <a href="/dashbord" class="active">{{ __('messages.dashboard') }} </a>
    <a href="{{ route('profile.index') }}" class="active">{{ __('messages.users') }} </a>
    <hr> 
    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu" role="button">
       {{ __('messages.gouvernorat') }}  & {{ __('messages.delegation') }}
    </a>
    <div class="collapse ps-3" id="statsMenu">
      <a href="{{ route('gouvernorat.index') }}">- {{ __('messages.gouvernorat') }} </a>
      <a href="{{ route('delegation.index') }}">- {{ __('messages.delegation') }} </a>
    </div>

    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu2" role="button">
      {{ __('messages.programme') }}  & {{ __('messages.etablissement') }}
    </a>
    <div class="collapse ps-3" id="statsMenu2">
       <a href="{{ route('programme.index') }}">- {{ __('messages.programme') }} </a>
    <a href="{{ route('etablissement.index') }}">- {{ __('messages.type_etablissement') }} </a>
    <a href="{{ route('names_etablissements.index') }}">- {{ __('messages.etablissement') }} </a>
    </div>


    <a class="dropdown-toggle" data-bs-toggle="collapse" href="#statsMenu3" role="button">
      {{ __('messages.nature_projet') }}  & {{ __('messages.type_projet') }}
    </a>
    <div class="collapse ps-3" id="statsMenu3">
      <a href="{{ route('nature_projet.index') }}">- {{ __('messages.nature_projet') }} </a>
      <a href="{{ route('type_projet.index') }}">- {{ __('messages.type_projet') }} </a>
    </div>

    <a href="{{ route('financement.index') }}">{{ __('messages.financement') }} </a>

    <a href="{{ route('projet.index') }}">{{ __('messages.project') }} </a>
        <a href=""> <hr> </a>
    <a href="{{ route('loi.index') }}">القانون</a>
    <a href="{{ route('action_charter.index') }}">ميثاق التصرف الجهوي </a>
            <a href=""> <hr> </a>
 </div>


  