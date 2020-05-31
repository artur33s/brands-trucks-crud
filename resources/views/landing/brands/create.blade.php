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
                            Create
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Fill in all the fields</h3>
        </div>
        <div class="block-content block-content-full">
          {!! form($brandForm) !!}
        </div>
    </div>
    <!-- END Basic -->
@stop
