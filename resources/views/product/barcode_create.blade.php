<x-app-layout>

    <x-slot name="header">

        <x-page-header-with-btn>

            <x-slot name="title">Print Barcode</x-slot>

            <x-slot name="breadcrumbs">
                {{Breadcrumbs::render('product.barcode.generate',$product)}}
            </x-slot>

        </x-page-header-with-btn>

    </x-slot>

    {{-- :: Begin Section :: --}}

    <div class="card">
        <div class="card-body">
            <div class="requiredfield">
                <h4>
                    The field labels marked with * are required
                    input fields.
                </h4>
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <div class="input-groupicon">
                    <input type="text" placeholder="Please type product code and select..." id="input-suggestion" />
                    <div class="addonset">
                        <img src="{{asset('assets/img/icons/scanners.svg')}}" alt="img" />
                    </div>
                </div>
                <ul id="suggestion-list"></ul>
            </div>
            <div class="table-responsive table-height">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Qty</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Macbook pro</td>
                            <td>PT001</td>
                            <td>100.00</td>
                            <td class="text-end">
                                <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Apple Earpods</td>
                            <td>PT002</td>
                            <td>1000.00</td>
                            <td class="text-end">
                                <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Macbook Pro</td>
                            <td>PT003</td>
                            <td>5000.00</td>
                            <td class="text-end">
                                <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img" /></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Paper Size</label>
                        <select class="select">
                            <option>36mm (1.4 inch)</option>
                            <option>12mm (1 inch)</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- :: End Section :: --}}

    @section('page_css')
    <style>
        #suggestion-list {
            position: relative;
            z-index: 1000;
            display: none;
            width: 100%;
            background-color: #ccc;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        #suggestion-list li {
            cursor: pointer;
            padding: 10px;
            width: 100% background-color: #eee;
        }

        #suggestion-list li:hover {
            background-color: #FF9F43;
        }

    </style>
    @endsection
    @section('page_script')
    <script>
        $(document).ready(function() {
            $('#input-suggestion').keyup(function() {
                var query = $(this).val();

                if (query != '') {
                    $.ajax({
                        url: "{{ route('product.search') }}"
                        , type: 'GET'
                        , data: {
                            query: query
                            , _token: "{{csrf_token()}}"
                        }
                        , success: function(data) {
                            $('#suggestion-list').html(data);
                            $('#suggestion-list').show();
                        }
                    });
                } else {
                    $('#suggestion-list').html('');
                    $('#suggestion-list').hide();
                }
            });

            $(document).on('click', '#suggestion-list li', function() {
                var suggestionText = $(this).text();
                $('#input-suggestion').val(suggestionText);
                $('#suggestion-list').hide();
            });
        });

    </script>
    @endsection
</x-app-layout>
