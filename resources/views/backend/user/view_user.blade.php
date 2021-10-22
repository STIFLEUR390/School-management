@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            {{--<div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Data Tables</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Tables</li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>--}}

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('User list')</h3>
                                <a href="{{ route('user.add') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5"><i class="ti-plus"></i> @lang("Add User")</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>@lang('SL')</th>
                                                <th>@lang('Role')</th>
                                                <th>@lang('Name')</th>
                                                <th>@lang('Email')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                                <tr>
                                                    <td width="5%">{{ $key + 1 }}</td>
                                                    <td>{{ $user->usertype }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td width="10%">
                                                        <a href="javascript:void(0)" class="text-info mr-10" data-toggle="tooltip" data-original-title="@lang('Edit')">
                                                            <i class="ti-marker-alt"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" class="text-danger" data-original-title="@lang('Delete')" data-toggle="tooltip">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('SL')</th>
                                                <th>@lang('role')</th>
                                                <th>@lang('Name')</th>
                                                <th>@lang('Email')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
