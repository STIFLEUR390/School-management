@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('User list')</h3>
                                <a href="{{ route('user.add') }}" style="float: right;"
                                    class="mb-5 waves-effect waves-light btn btn-rounded btn-success"><i
                                        class="ti-plus"></i> @lang("Add User")</a>
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
                                                <th>@lang('Code')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $user)
                                                <tr>
                                                    <td width="5%">{{ $key + 1 }}</td>
                                                    <td>@lang($user->role)</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->code }}</td>
                                                    <td width="10%">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="mr-10 text-info" data-toggle="tooltip"
                                                            data-original-title="@lang('Edit')">
                                                            <i class="ti-marker-alt"></i>
                                                        </a>
                                                        <a href="{{ route('user.delete', $user->id) }}"
                                                            class="text-danger delete" data-original-title="@lang('Delete')"
                                                            data-toggle="tooltip">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
