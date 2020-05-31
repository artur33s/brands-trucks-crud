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
                            <a class="link-fx" href="{{route('brands.index')}}">Brands</a>
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
            <h3 class="block-title">Brand Show</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="text-center">
                <h6 class="text-center">Brand Info</h6>
                <p><strong>ID:</strong> {{$object->id}} </p>
                <p><strong> NAME:</strong> {{$object->name}}</p>
            </div>
        </div>
    </div>
@stop
