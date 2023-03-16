<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Edit Customer Detail">
            {{Breadcrumbs::render('customer.edit',$customer)}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('customer.update',$customer)}}" method="POST">
                        @csrf
                        @method('put')

                        {{-- :: Begin name Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="Enter Name" name="name"
                                    value="{{old('name',$customer->name)}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End name Input --}}

                        {{-- :: Begin phone Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="+91 9794xxx940" name="phone"
                                    value="{{old('phone',$customer->phone)}}">
                                @error('phone')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End phone Input --}}

                        {{-- :: Begin email Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="MrAbc@example.com"
                                    name="email" value="{{old('email',$customer->email)}}">
                                @error('email')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End email Input --}}

                        {{-- :: Begin address Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="Address"
                                    name="address">{{old('address',$customer->address)}}</textarea>
                                @error('address')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End address Input --}}

                        {{-- :: Begin remark Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Notes</label>
                            <div class="col-lg-9">
                                <textarea class="form-control " placeholder="A Few Words.."
                                    name="remark">{{old('remark',$customer->remark)}}</textarea>
                                @error('remark')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End remark Input --}}

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