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
                                <h3 class="box-title">@lang('Employee Salary Details')</h3>
                                <h5><strong> @lang("Employee Name") </strong> {{ $user->name }} </h5>
                                <h5><strong> @lang("Employee ID No") </strong> {{ $user->id_no }} </h5>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang('Previous Salary')</th>
                                            <th>@lang('Increment Salary')</th>
                                            <th>@lang('Present Salary')</th>
                                            <th>@lang('Effected Date')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($salary_log as $key => $log)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $log->previous_salary }}</td>
                                                <td> {{ $log->increment_salary }}</td>
                                                <td> {{ $log->present_salary }}</td>
                                                <td> {{ $log->effected_salary }}</td>
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
