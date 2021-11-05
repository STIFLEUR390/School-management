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
                                <h3 class="box-title">@lang('Employee Leave')</h3>
                                <a href="{{ route('employee.leave.create') }}" style="float: right;" class="mb-5 waves-effect waves-light btn btn-rounded btn-success">
                                    <i class="ti-plus"></i> @lang("Add Employee Leave")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang('Name')</th>
                                            <th>@lang('ID No') </th>
                                            <th>@lang('Purpose') </th>
                                            <th>@lang("Start Date")</th>
                                            <th>@lang("End Date")</th>
                                            <th width="10%">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($employee_leaves as $key => $leave)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $leave->user->name }}</td>
                                                <td> {{ $leave->user->id_no }}</td>
                                                <td> {{ $leave->purpose->name }}</td>
                                                <td> {{ $leave->start_date }}</td>
                                                <td> {{ $leave->end_date }}</td>
                                                <td width="10%">
                                                    <a href="{{ route('employee.leave.edit', $leave->id) }}"
                                                       class="mr-10 text-info" data-toggle="tooltip"
                                                       data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a  href="{{ route('employee.leave.destroy', $leave->id) }}"
                                                       class="mr-10 text-danger delete" data-toggle="tooltip"
                                                       data-original-title="@lang('Delete')">
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
