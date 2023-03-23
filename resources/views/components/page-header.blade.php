@props(['title'])
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title text-uppercase">{{$title}}</h3>

            {{-- :: Begin Breadcrumb :: --}}

            {{$slot}}
            

            {{-- :: End Breadcrumb :: --}}

        </div>
    </div>
</div>