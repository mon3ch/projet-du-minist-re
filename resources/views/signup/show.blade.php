<x-masterLoginSignup title="{{ __('messages.signup_page') }}">

<div class="row w-100 vh-100 g-0 m-0" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-white p-5" 
         style="background: linear-gradient(135deg, #1cc88a, #36b9cc);">
        <h1 id="title" class="fw-bold display-4 mb-3 text-center"></h1>
        <p id="subtitle" class="lead text-center w-75"></p>
    </div>

    <div class="col-md-6 d-flex justify-content-center align-items-center bg-light h-100">
        <div class="w-75"> 
            <img src="{{ asset('storage/logo/logo.png') }}" alt="Signup illustration" class="img-fluid mt-4 mb-3 rounded-3">
            @include('partials.flashbag')
            
            <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">

                        <input type="text" 
                               class="form-control @error('last_name') is-invalid @enderror" 
                               id="last_name" 
                               name="last_name" 
                               placeholder="{{ __('messages.last_name_placeholder') }}"
                               value="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                   
                        <input type="text" 
                               class="form-control @error('first_name') is-invalid @enderror" 
                               id="first_name" 
                               name="first_name" 
                               placeholder="{{ __('messages.first_name_placeholder') }}"
                               value="{{ old('first_name') }}">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">

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
             
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="{{ __('messages.password_placeholder') }}">
                    
                    <br>
                 
                    <input type="password" 
                           class="form-control" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           placeholder="{{ __('messages.password_confirmation_placeholder') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">                    
                    <select name="gouvernorat_id" id="gouvernorat_id" 
                            class="form-select shadow-sm border-primary select2" style="height: 38px !important;">
                        <option value="" >{{ __('messages.select_governorate') }}</option>
                        @foreach($gouvernorats as $gouvernorat)
                            <option value="{{ $gouvernorat->id }}" 
                                {{ old('gouvernorat_id') == $gouvernorat->id ? 'selected' : '' }}>
                                {{ $gouvernorat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('gouvernorat_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                
<div class="mb-3 d-flex flex-wrap align-items-center">
    <canvas id="captchaCanvas" width="150" height="50" class="border rounded me-2 mb-2 mb-md-0"></canvas>
    <div class="d-flex flex-grow-1">
        <input type="text" id="captchaInput" name="captcha_input" class="form-control me-2" placeholder="اكتب الرمز هنا">
        <button type="button" id="refreshCaptcha" class="btn btn-outline-secondary">🔁</button>
    </div>
</div>
<small id="captchaError" class="text-danger d-none">الرمز غير صحيح</small>

                <button type="submit" class="btn btn-success w-100 py-2 rounded-3">
                    {{ __('messages.signup_button') }}
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login.show') }}" class="text-decoration-none small">{{ __('messages.already_account') }}</a> | <a href="/lang/ar"> العربية</a> | <a href="/lang/fr"> Français</a>
            </div>
        </div>
    </div>
</div>

<script>
const titleText = "{{ __('messages.welcome_title') }}";
const subtitleText = "{{ __('messages.welcome_subtitle') }}";

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


<script>
const titleText = "{{ __('messages.welcome_title') }}";
const subtitleText = "{{ __('messages.welcome_subtitle') }}";

const titleEl = document.getElementById("title");
const subtitleEl = document.getElementById("subtitle");

function typeWriter(element, text, speed, callback) {
    let i = 0;
    function typing() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(typing, speed);
        } else if (callback) callback();
    }
    typing();
}

typeWriter(titleEl, titleText, 120, () => {
    typeWriter(subtitleEl, subtitleText, 60);
});
</script>


<script>
const canvas = document.getElementById('captchaCanvas');
const ctx = canvas.getContext('2d');
const captchaInput = document.getElementById('captchaInput');
const refreshBtn = document.getElementById('refreshCaptcha');
const errorMsg = document.getElementById('captchaError');
const form = document.querySelector('form[action="{{ route('signup') }}"]');

let captchaCode = '';

function generateCaptcha() {
    const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    captchaCode = '';
    for (let i = 0; i < 5; i++) {
        captchaCode += chars.charAt(Math.floor(Math.random() * chars.length));
    }

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = '28px Arial';
    for (let i = 0; i < captchaCode.length; i++) {
        const x = 20 + i * 25;
        const y = 30 + Math.random() * 10;
        const angle = Math.random() * 0.4 - 0.2;
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(angle);
        ctx.fillStyle = '#'+Math.floor(Math.random()*16777215).toString(16);
        ctx.fillText(captchaCode[i], 0, 0);
        ctx.restore();
    }

    for (let i = 0; i < 10; i++) { 
    ctx.strokeStyle = '#'+Math.floor(Math.random()*16777215).toString(16); // Random color
    ctx.lineWidth = 1 + Math.random()*1; 
    ctx.beginPath();
    
    const startX = Math.random()*canvas.width;
    const startY = Math.random()*canvas.height;
    const endX = Math.random()*canvas.width;
    const endY = Math.random()*canvas.height;

    ctx.moveTo(startX, startY);
    ctx.lineTo(endX, endY);

    ctx.stroke();
}

    if(!document.getElementById('captchaHidden')) {
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'captcha_code';
        hidden.id = 'captchaHidden';
        hidden.value = captchaCode;
        form.appendChild(hidden);
    } else {
        document.getElementById('captchaHidden').value = captchaCode;
    }
}

refreshBtn.addEventListener('click', generateCaptcha);

form.addEventListener('submit', function(e){
    if(captchaInput.value.trim().toUpperCase() !== document.getElementById('captchaHidden').value) {
        e.preventDefault();
        errorMsg.classList.remove('d-none');
        generateCaptcha();
        captchaInput.value = '';
    } else {
        errorMsg.classList.add('d-none');
    }
});

generateCaptcha();
</script>

</x-masterLoginSignup>
