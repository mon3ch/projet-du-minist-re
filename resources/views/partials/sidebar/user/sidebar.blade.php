
  <div class="sidebar">
            <img src="{{ asset('storage/logo/logo.png') }}" 
        style="margin-bottom: 12px;"
                 alt="Login illustration" 
                 class="img-fluid mt-4 rounded-3 ">
          
    <a href="/dashbord" class="active">{{ __('messages.dashboard') }} </a>
    <a href="{{ route('projet.index') }}">{{ __('messages.project') }} </a>
           <a href=""> <hr> </a>
    <a href="{{ route('action_charter.index') }}">ميثاق التصرف الجهوي </a>
            <a href=""> <hr> </a>

  </div>
