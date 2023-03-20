<x-app-layout>

    <x-slot name="header">
        <x-page-header title="User Management">
            {{Breadcrumbs::render('users.edit',$user)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('users.update',$user)}}" method="POST">
                        @csrf
                        @method('put')

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Name" name="name"
                                    value="{{old('name',$user->name)}}">
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
                                    value="{{old('email',$user->email)}}">
                                @error('email')
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
                                    <option value="{{$item->name}}" @if(old('role',$user->role) == $item->name)  selected="selected" @endif
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
                                    <option value="0" @if(old('login_enable',$user->login_enable) == 0) selected="selected" @endif>Disable
                                    </option>
                                    <option value="1" @if(old('login_enable',$user->login_enable) == 1) selected="selected" @endif>Enable
                                    </option>
                                </select>
                                @error('login_enable')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-submit">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- :: End Section :: --}}

</x-app-layout>