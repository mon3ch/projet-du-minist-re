<x-masterLoginSignup title="Login page">

    <div class="row w-100 vh-100 g-0 m-0" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-md-6 d-none d-md-flex 
                    flex-column justify-content-center align-items-center 
                    text-white p-5" 
             style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
            
            <h1 id="title" class="fw-bold display-4 mb-3 text-center"></h1>
            <p id="subtitle" class="lead text-center w-75"></p>
            

        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center bg-light h-100">
            
            <div class="w-75"> 
                <img src="{{ asset('storage/logo/logo.png') }}" 
                 alt="Login illustration" 
                 class="img-fluid mt-4 rounded-3 ">
                 <br>
                 @include('partials.flashbag')
                 <br>
                <h2 class="text-center mb-4 fw-bold text-primary"></h2>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">{{ __('messages.email') }}</label>
                        <input type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email" 
                            placeholder="{{ __('messages.email_placeholder') }}"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">{{ __('messages.password') }}</label>
                        <input type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="{{ __('messages.password_placeholder') }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                         {{ __('messages.login_button') }}
                    </button>
                                 
                </form>

                <!-- Extra Links -->
                <div class="text-center mt-3">
                    {{--<a href="#" class="text-decoration-none small">Forgot Password?</a>
                    <br>--}}
                    <a href="/signup" class="text-decoration-none small">{{ __('messages.create_account') }}</a> | <a href="/lang/ar"> العربية</a> | <a href="/lang/fr"> Français</a>
                </div>

            </div>
        </div>
    </div>

<script>
    const titleText = "{{ __('messages.titleText_login') }}";
    const subtitleText = "{{ __('messages.subtitleText_login') }}";
 
    const titleEl = document.getElementById("title");
    const subtitleEl = document.getElementById("subtitle");

 
    function typeWriter(element, text, speed, callback) {
        let i = 0;
        function typing() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(typing, speed);
            } else if (callback) {
                callback();
            }
        }
        typing();
    }

    typeWriter(titleEl, titleText, 120, () => {
        typeWriter(subtitleEl, subtitleText, 60);
    });
</script>

</x-masterLoginSignup>
