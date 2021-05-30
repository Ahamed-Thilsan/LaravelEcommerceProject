@extends('Layouts.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>VIEW TOWN</h1>
                        </div>
                    </div>
                </div><!-- /# column -->
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="">Dashboard</a></li>
                                <li class="active">VIEW TOWN</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /# column -->
            </div><!-- /# row -->
            <div class="main-content">
                @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="alert-icon">
                        <i class="icon-close"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong>Danger! </strong>{!! session('flash_message_error') !!}</span>
                    </div>
                </div>
                @endif
                @if(Session::has('flash_message_success'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="alert-icon">
                        <i class="icon-check"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong>Success! </strong>{!! session('flash_message_success') !!}</span>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h4>VIEW TOWN</h4>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Province</th>
                                            <th>District</th>
                                            <th>Town</th>
                                            <th>Added Date</th>
                                            <th>Edit</th>
                                            <th>Disable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($towns as $town)
                                        <tr>
                                            <th scope="row">{{$town->provinces->province_name}}</th>
                                            <td class="color-primary">{{$town->districts->district_name}}</td>
                                            <td>{{$town->town_name}}</td>
                                            <td>{{$town->created_at->toDateString()}}</td>
                                            <td>
                                                <a href="{{url('/edit-town/'.$town->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td><span class="badge badge-primary">@if($town->status=='0') Enable @else</span>
                                                <span class="badge badge-danger">Disable</span>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->
@endsection