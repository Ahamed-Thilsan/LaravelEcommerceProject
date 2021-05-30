@extends('Layouts.app')
@section('content')
<div class="content-wrap">
    <div class="main">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>VIEW SUB CHANNEL</h1>
                        </div>
                    </div>
                </div><!-- /# column -->
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="">Dashboard</a></li>
                                <li class="active">VIEW SUB CHANNEL</li>
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
                            <div class="card-body">
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Business Sector Name</th>
                                            <th>Channel Name</th>
                                            <th>Sub Channel</th>
                                            <th>Added Date</th>
                                            <th>Edit</th>
                                            <th>Disable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sub_chan as $chan)
                                        <tr>
                                            <th scope="row">{{$chan->channels->sector_name}}</th>
                                            <td class="color-primary">{{$chan->channels->channel_name}}</td>
                                            <td>{{$chan->sub_channel}}</td>
                                            <td>{{$chan->created_at->toDateString()}}</td>
                                            <td>
                                                <a href="{{url('/edit-sub-channel/'.$chan->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td><span class="badge badge-primary">@if($chan->status=='0') Enable @else</span>
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