<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section class="vh-100">
        <div class="container-fluid h-custom" style="height: 90vh;">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form class="" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-facebook"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-linkedin"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                <!-- Email input -->
                    <div class="form-outline mb-4">
                            <x-input-label for="email" class="form-label" :value="__('Email')" />
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" placeholder="Enter a valid email address" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                <!-- Password input -->
                    <div class="form-outline mb-3">
                        <x-input-label class="form-label" for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control form-control-lg"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="Enter password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <label for="remember_me" class="form-check-label">
                                <input id="remember_me" type="checkbox" class="form-check-input me-2" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            @if (Route::has('password.request'))
                                <a class="me-2 underline nav-link text-sm text-secondary hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ml-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>