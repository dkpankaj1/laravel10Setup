<x-app-layout>

    <x-slot name="header">
        <x-page-header title="System Settion">
            {{Breadcrumbs::render('system.settion.manage','system')}}
        </x-page-header>
    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="card">
        <div class="card-body">
            <form action="{{route('setting.system.manage','system')}}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    {{-- :: Company Name Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company Name <span class="manitory">*</span></label>
                            <input type="text" placeholder="Company Name" name="company_name"
                                value="{{old('company_name',$systemSetting->company_name)}}" />
                            @error('company_name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: Company email Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company Email <span class="manitory">*</span></label>
                            <input type="text" placeholder="Company Email" name="company_email"
                                value="{{old('company_email',$systemSetting->company_email)}}" />
                            @error('company_email')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: Company phone Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Company Phone <span class="manitory">*</span></label>
                            <input type="text" placeholder="Company Phone" name="company_phone"
                                value="{{old('company_phone',$systemSetting->company_phone)}}" />
                            @error('company_phone')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: default time zone Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Default Time Zone <span class="manitory">*</span></label>
                            <select class="select" name="time_zone">
                                <option value="">Choose Time Zone</option>
                                @foreach($defaultTimeZone as $item)
                                <option value="{{$item}}" @if(old('time_zone',$systemSetting->time_zone) == $item) selected="selected" @endif>{{$item}}</option>
                                @endforeach
                            </select>
                            @error('time_zone')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                     {{-- :: default warehouse Input :: --}}
                     <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Default Warehouses <span class="manitory">*</span></label>
                            <select class="select" name="default_warehouse">
                                <option value="">Choose warehouses</option>
                                @foreach($warehouses as $item) 
                                <option value="{{$item->id}}" @if(old('default_warehouse',$systemSetting->default_warehouse) == $item->id) selected="selected" @endif >{{$item->name}}</option>
                                    @endforeach
                            </select>
                            @error('default_currency')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    {{-- :: default currency Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Default Currency <span class="manitory">*</span></label>
                            <select class="select" name="default_currency">
                                <option value="">Choose Currency</option>
                                @foreach($currencys as $item) 
                                <option value="{{$item->id}}" @if(old('default_currency',$systemSetting->default_currency) == $item->id) selected="selected" @endif>{{$item->name}} [ {{$item->symbol}} ]</option>
                                    @endforeach
                            </select>
                            @error('default_currency')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: default date format Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Default Date Format<span class="manitory">*</span></label>
                            <select class="select" name="date_format">
                                <option value="">Choose Date Format</option>
                                @foreach($defaultDateFormat as $item)
                                <option value="{{$item}}" @if(old('date_format',$systemSetting->date_format) == $item) selected="selected" @endif >{{$item}}</option>
                                @endforeach
                            </select>
                            @error('date_format')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: default session Input :: --}}
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Default Session<span class="manitory">*</span></label>
                            <select class="select" name="default_app_session">
                                <option value="">Choose Session</option>
                                @foreach($appSessions as $item)
                                <option value="{{$item->id}}" @if(old('default_app_session',$systemSetting->default_app_session) == $item->id) selected="selected" @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('default_app_session')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: Company address Input :: --}}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Address<span class="manitory">*</span>
                            </label>
                            <textarea placeholder="Enter Address"
                                name="company_address">{{old('company_address',$systemSetting->company_address)}}</textarea>
                            @error('company_address')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- :: Company lofo Input :: --}}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Logo Image</label>
                            <div class="image-upload">
                                <input type="file" name="logo_image" />
                                <div class="image-uploads">
                                    <img src="{{asset('assets/img/icons/upload.svg')}}" alt="img" />
                                    <h4>
                                        Drag and drop a file to
                                        upload
                                    </h4>
                                </div>
                            </div>
                            @error('company_name')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- :: End Section :: --}}

</x-app-layout>