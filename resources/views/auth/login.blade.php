@include ('welcomeHeader')

<section >
<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5" style="margin-top:-30px;">
                  
                   <br>
                    <div class="card">
                       
                        <div class="card-body">
                           
                            <x-guest-layout>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="mb-3 form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                    </div>

                                    <div class="d-grid">
                                        <x-primary-button type="submit" class="btn  btn-block " style="">
                                           {{ __('Connexion') }}
                                        </x-primary-button>
                                        @if (Route::has('password.request'))
                                         <a class="text-sm text-muted" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                         </a>
                                        @endif
                                    </div>
                                </form>
                            </x-guest-layout>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>