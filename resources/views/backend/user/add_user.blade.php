@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
{{--
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Form Validation</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Forms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
--}}

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">@lang('Add User')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Role') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="usertype" id="usertype" required class="form-control">
                                                        <option value="" selected disabled>Select Role</option>
                                                        <option value="Admin">@lang('Admin')</option>
                                                        <option value="User">@lang('User')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required />
                                                </div>
{{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Email') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required />
                                                </div>
                                                {{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Password') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password" class="form-control" required />
                                                </div>
                                                {{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                            </div>
                                        </div>
                                        {{--<div class="col-12">
                                            <div class="form-group">
                                                <h5>Email Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" value="@lang('Save')" class="btn btn-rounded btn-info">
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
