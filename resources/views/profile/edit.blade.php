<x-app-layout>
    <x-slot name="header">
        <x-page-header title="Profile">
            {{ Breadcrumbs::render('profile') }}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    {{-- Begin edit profile --}}

    <div class="card">
        <div class="card-body">
            <div class="profile-set">
                <div class="profile-head"></div>
                <div class="profile-top">
                    <div class="profile-content">
                        <div class="profile-contentimg">
                            <img src="{{asset('assets/img/avatar.svg')}}" alt="img" id="blah" />
                        </div>
                        <div class="profile-contentname">
                            <h2>{{$user->name}}</h2>
                            <h4>
                                Updates Your Personal Details.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{route('profile.edit')}}">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="{{$user->name}}"
                                value="{{old('name',$user->name)}}" />
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="{{$user->email}}"
                                value="{{old('email',$user->email)}}" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- End edit profile --}}

    {{-- Begin Update password --}}

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Update Password</h3>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>{{__('Current Password')}}</label>
                            <div class="pass-group">
                                <input type="password" name="current_password" class="pass-input" />
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>

                            @if ($errors->updatePassword->get('current_password'))
                            <ul class="text-sm mt-2 text-danger">
                                @foreach ((array) $errors->updatePassword->get('current_password') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>{{__('New Password')}}</label>
                            <div class="pass-group">
                                <input type="password" name="password" class="pass-input" />
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>

                        @if ($errors->updatePassword->get('password'))
                        <ul class="text-sm mt-2 text-danger">
                            @foreach ((array) $errors->updatePassword->get('password') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>{{__('Confirm Password')}}</label>
                            <div class="pass-group">
                                <input type="password" name="password_confirmation" class="pass-input" />
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>

                        @if ($errors->updatePassword->get('password_confirmation'))
                        <ul class="text-sm mt-2 text-danger">
                            @foreach ((array) $errors->updatePassword->get('password_confirmation') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <div class="col-12">
                        <button href="javascript:void(0);" class="btn btn-submit me-2">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- End Update password --}}

    {{-- :: End Section :: --}}

    @section('page_script')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>
    @endsection

</x-app-layout>