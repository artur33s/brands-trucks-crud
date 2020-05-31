@extends('layouts.landing')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <a class="btn btn-success" href="{{route('brands.create')}}">CREATE</a>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('landing.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">
                            Brands
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
            <div class="col-lg-12">
                <!-- Default Table -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">BRANDS TABLE</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#ID</th>
                                <th>Name</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($objects as $object)
                                    <tr>
                                        <th class="text-center" scope="row">{{$object->id}}</th>
                                        <td class="font-w600 font-size-sm">
                                            <a href="{{route('brands.show', $object->id )}}">{{$object->name}}</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{route('brands.edit', $object->id)}}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Brand">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('brands.destroy',$object->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Brand">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                      <h6 class="text-danger">Empty Record</h6>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $objects->links() !!}
                    </div>
                </div>
            <!-- END Default Table -->
            </div>
@stop
