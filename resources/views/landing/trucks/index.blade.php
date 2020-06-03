@extends('layouts.landing')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <a class="btn btn-success" href="{{route('trucks.create')}}">CREATE</a>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{route('landing.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">
                            Trucks
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
                <h3 class="block-title">TRUCKS TABLE</h3>
            </div>
            <div class="block-content">
                <table class="table table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#ID</th>
                        <th>Brand</th>
                        <th>Year</th>
                        <th>Owner Full Name</th>
                        <th>Number of owners</th>
                        <th>Comment</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($objects as $object)
                        <tr>
                            <th class="text-center" scope="row"><a href="{{route('trucks.show', $object->id )}}" class="link-fx">{{$object->id}}</a></th>
                            <td class="font-w600 font-size-sm">
                                {{$object->brand->name}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$object->year}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$object->owner_full_name}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$object->number_of_owners}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$object->comment}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('trucks.edit', $object->id)}}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Brand">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('trucks.destroy',$object->id)}}" method="POST">
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
