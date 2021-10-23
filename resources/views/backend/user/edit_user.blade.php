@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

        <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">@lang('Update User')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('user.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Role') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="usertype" id="usertype" required class="form-control">
                                                        <option value="" disabled>Select Role</option>
                                                        <option {{ old('usertype', $user->usertype) == 'Admin' ? 'selected' : '' }} value="Admin">@lang('Admin')</option>
                                                        <option {{ old('usertype', $user->usertype) == 'User' ? 'selected' : '' }} value="User">@lang('User')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('name', $user->name) }}" name="name" class="form-control" required />
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
                                                    <input type="email" value="{{ old('email', $user->email) }}" name="email" class="form-control" required />
                                                </div>
                                                {{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                            </div>
                                        </div>
                                        {{--<div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Password')</h5>
                                                <div class="controls">
                                                    <input type="password" name="password" class="form-control" />
                                                </div>
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
