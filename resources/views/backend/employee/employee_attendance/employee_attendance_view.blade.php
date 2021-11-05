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
                                <h3 class="box-title">@lang('Employee Attendance List')</h3>
                                <a href="{{ route('employee.attendance.create') }}" style="float: right;" class="mb-5 waves-effect waves-light btn btn-rounded btn-success">
                                    <i class="ti-plus"></i> @lang("Add Attendance")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang('Date')</th>
                                            <th width="10%">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($employee_attendaces as $key => $attendance)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ date('d-m-Y', strtotime($attendance->date)) }}</td>
                                                <td>
                                                    <a href="{{ route('employee.attendance.edit', $attendance->date) }}"
                                                       class="mr-10 text-info" data-toggle="tooltip"
                                                       data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a  href="{{ route('employee.attendance.show', $attendance->date) }}"
                                                        class="mr-10 text-danger" data-toggle="tooltip"
                                                        data-original-title="@lang('Details')">
                                                        <i class="fa fa-eye"></i>
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
