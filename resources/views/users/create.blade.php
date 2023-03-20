<x-app-layout>

    <x-slot name="header">
        <x-page-header title="User Management">
            {{Breadcrumbs::render('users.create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Name" name="name"
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin email Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control " placeholder="abc@example.com" name="email"
                                    value="{{old('email')}}">
                                @error('email')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End email Input --}}

                        {{-- :: Begin email Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password</label>
                            <div class="col-lg-9">
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="********" />
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End email Input --}}

                        {{-- :: Begin email Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Confirm password</label>
                            <div class="col-lg-9">
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" class="pass-input"
                                        placeholder="********" />
                                </div>
                                @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End email Input --}}


                        {{-- :: Begin Role Input :: --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Roles</label>
                            <div class="col-lg-9">
                                <select class="select" name="role">
                                    <option value="">Choose Role</option>
                                    @foreach($roles as $item)
                                    <option value="{{$item->name}}" @if(old('role') == $item->name)  selected="selected" @endif
                                        >{{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End email Input --}}

                        {{-- :: Begin Login Status Input :: --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Login Status</label>
                            <div class="col-lg-9">
                                <select class="select" name="login_enable">
                                    <option value="">Choose Status</option>
                                    <option value="0" @if(old('login_enable') == "0") selected="selected" @endif>Disable</option>
                                    <option value="1" @if(old('login_enable') == "1") selected="selected" @endif>Enable</option>
                                </select>
                                @error('login_enable')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-submit">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- :: End Section :: --}}

</x-app-layout>