@extends('layouts.landing')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('landing.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('brands.index')}}">Trucks</a>
                        </li>
                        <li class="breadcrumb-item">
                            Show #{{$object->id}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Truck Show</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="text-center">
                <h6 class="text-center">Truck Info</h6>
                <p><strong>ID:</strong> {{$object->id}} </p>
                <p><strong> BRAND:</strong> {{$object->brand->name}}</p>
                <p><strong> YEAR:</strong> {{$object->year}}</p>
                <p><strong> OWNER FULL NAME:</strong> {{$object->owner_full_name}}</p>
                <p><strong> NUMBER OF OWNERS:</strong> {{$object->number_of_owners}}</p>
                <p><strong> COMMENT:</strong> {{$object->comment}}</p>

            </div>
        </div>
    </div>
@stop
