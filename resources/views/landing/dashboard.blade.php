@extends('layouts.landing')
@section('content')
    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url('/media/photos/photo3@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Auther: <a href="https://www.linkedin.com/in/artur-khachatryan-790841169/" style="color: white;">Artur Khachtryan</a> for <strong>UAB Inovatyvus partneris</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row">
            <div class="col-lg-6">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Brands</div>
                        <div class="font-size-h2 font-w400 text-dark">{{$brandsCount}}</div>
                    </div>
                </a>

                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">BRANDS TABLE</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th width="50%" class="font-w700" style="width: 80px;">ID</th>
                                    <th width="50%" class="font-w700">Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($brands as $brand)
                                        <tr>
                                            <td>
                                                <span class="font-w600 link-fx"><a href="{{route('brands.show', $brand->id)}}">#{{$brand->id}}</a></span>
                                            </td>
                                            <td class="font-w600">
                                                {{$brand->name}}
                                            </td>
                                        </tr>
                                        @empty
                                        <h6 class="text-danger">Empty Record</h6>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $brands->links() !!}
                    </div>
                <!-- END Latest Customers -->
            </div>
            <div class="col-lg-6">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Trucks</div>
                        <div class="font-size-h2 font-w400 text-dark">{{$trucksCount}}</div>
                    </div>
                </a>
                <!-- Latest Orders -->
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">TRUCKS TABLE</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                <tr class="text-uppercase">
                                    <th width="10%" class="font-w700">ID</th>
                                    <th width="10%" class="d-none d-sm-table-cell font-w700">BRAND</th>
                                    <th  width="10%" class="font-w700">YEAR</th>
                                    <th  width="20%" class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">OWNER FULL NAME</th>
                                    <th  width="10%" class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">NUMBER OF OWNERS</th>
                                    <th width="40%" class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">COMMENT</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($trucks as $truck)
                                    <tr>
                                        <td>
                                            <span class="font-w600 link-fx"><a href="{{route('trucks.show', $truck->id)}}">#{{$truck->id}}</a></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="font-size-sm text-muted">{{$truck->brand->name}}</span>
                                        </td>
                                        <td>
                                            <span class="font-w600">{{$truck->year}}</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-right">
                                            {{$truck->owner_full_name}}
                                        </td>
                                        <td class="d-none d-sm-table-cell text-right">
                                            {{$truck->number_of_owners}}
                                        </td>
                                        <td class="d-none d-sm-table-cell text-right">
                                            {{$truck->comment}}
                                        </td>
                                    </tr>
                                    @empty
                                    <h6 class="text-danger">Empty Record</h6>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        {!! $trucks->links() !!}
                    </div>
                <!-- END Latest Orders -->
            </div>
        </div>
        <!-- END Stats -->


        <!-- Customers and Latest Orders -->
        <div class="row row-deck">



        </div>
        <!-- END Customers and Latest Orders -->
    </div>
    <!-- END Page Content -->
@stop
