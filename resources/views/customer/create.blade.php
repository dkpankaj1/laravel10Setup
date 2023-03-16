<x-app-layout>

    <x-slot name="header">
        <x-page-header title="Create New Customer">
            {{Breadcrumbs::render('customer.create')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('customer.store')}}" method="POST">
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

                        {{-- :: Begin phone Input --}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control " placeholder="+91 9794xxx940" name="phone"
                                    value="{{old('phone')}}">
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
                                    name="email" value="{{old('email')}}">
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
                                    name="address">{{old('address')}}</textarea>
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
                                    name="remark">{{old('remark')}}</textarea>
                                @error('remark')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- :: End remark Input --}}

                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-submit">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- :: End Section :: --}}

</x-app-layout>