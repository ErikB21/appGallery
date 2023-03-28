<x-guest-layout>
  <section class="my-5 mx-0 px-0">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}">
                  @csrf

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <x-input-label for="name" class="form-label" :value="__('Name')" />
                          <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <x-input-label class="form-label" for="email" :value="__('Email')" />
                          <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <x-input-label for="password" class="form-label" :value="__('Password')" />

                              <x-text-input id="password" class="form-control"
                                              type="password"
                                              name="password"
                                              required autocomplete="new-password" />

                              <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                          <x-text-input id="password_confirmation" class="form-control"
                                          type="password"
                                          name="password_confirmation" required />

                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center align-items-center mx-4 mb-3 mb-lg-4">
                          <a class="underline nav-link text-sm text-secondary hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 me-2" href="{{ route('login') }}">
                              {{ __('Already registered?') }}
                          </a>

                          <x-primary-button class="ml-4">
                              {{ __('Register') }}
                          </x-primary-button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-guest-layout>