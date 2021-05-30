@extends('Layouts.app')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>EDIT PROVINCE</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="">Dashboard</a></li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h4>EDIT PROVINCE</h4>
                            </div>
                            <br>
                            <div class="card-body">
                                <div class="horizontal-form-elements">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/edit-province/'.$edit_province->id)}}" name="add-category" id="add-category" noalidate="noalidate">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Province </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="province_name" id="province_name" value="{{$edit_province->province_name}}" placeholder="Slug" required>
                                                        @error('province_name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" id="input-6" name="status">
                                                            <option value="0" <?php if ($edit_province->status == 0) { ?>selected="selected" <?php } ?>>Enable</option>
                                                            <option value="1" <?php if ($edit_province->status == 1) { ?>selected="selected" <?php } ?>>Disable</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                </div><!-- /# row -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->
@endsection