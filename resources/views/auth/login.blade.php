<x-guest-layout>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{session('status')}}        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="assets/img/logo.png" alt="img" />
                    </div>
                    <div class="login-userheading">
                        <h3>Sign In</h3>
                        <h4>Please login to your account</h4>
                    </div>


                    {{-- :: Begin Email Input :: --}}
                    <div class="form-login">
                        <label>{{_("Email")}}</label>
                        <div class="form-addons">
                            <input type="text" name="email" value="{{old('email')}}"
                                placeholder="Enter your email address" />
                            <img src="assets/img/icons/mail.svg" alt="img" />
                        </div>

                        @if ($errors->get('email'))
                        <ul class="text-sm mt-2 text-danger">
                            @foreach ((array) $errors->get('email') as $message)
                            <li>{{ $message }}</li>
                            @endforeach 
                        </ul>
                        @endif
                    </div>
                    {{-- :: End Email Input :: --}}

                    {{-- :: Begin Password Input :: --}}
                    <div class="form-login">
                        <label>{{_("Password")}}</label>
                        <div class="pass-group">
                            <input type="password" name="password" class="pass-input"
                                placeholder="Enter your password" />
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>

                        @if ($errors->get('password'))
                        <ul class="text-sm mt-2 text-danger">
                            @foreach ((array) $errors->get('password') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    {{-- :: End Password Input :: --}}

                    {{-- :: Begin Sign In Button :: --}}
                    <div class="form-login">
                        <button type="submit" class="btn btn-login">{{_("Sign In")}}</>
                    </div>
                    {{-- :: End Sign In Button :: --}}

                </div>
            </div>
            <div class="login-img">
                <img src="{{asset('assets/img/login.jpg')}}" alt="img" />
            </div>
        </div>
    </form>

</x-guest-layout>