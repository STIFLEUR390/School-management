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
                                <h3 class="box-title">@lang('Employee Attendance Details')</h3>
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
                                            <th>@lang('Date') </th>
                                            <th>@lang('Attend Status')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details as $key => $value )
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td> {{ $value->user->name }}</td>
                                                    <td> {{ $value->user->id_no }}</td>
                                                    <td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
                                                    <td> @lang($value->attend_status)</td>
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
