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
                                <h3 class="box-title">@lang('Employee List')</h3>
                                <a href="{{ route('employee.registration.create') }}" style="float: right;" class="mb-5 waves-effect waves-light btn btn-rounded btn-success">
                                    <i class="ti-plus"></i> @lang("Add Employee")
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
                                            <th>@lang('ID NO')</th>
                                            <th>@lang('Mobile')</th>
                                            <th>@lang('Gender')</th>
                                            <th>@lang('Join Date')</th>
                                            <th>@lang('Salary')</th>
                                            @if(Auth::user()->role == "Admin")
                                                <th>@lang('Code')</th>
                                            @endif
                                            <th width="10%">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $key => $employee)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $employee->name }}</td>
                                                <td> {{ $employee->id_no }}</td>
                                                <td> {{ $employee->mobile }}</td>
                                                <td> {{ $employee->gender }}</td>
                                                <td> {{ $employee->join_date }}</td>
                                                <td> {{ $employee->salary }}</td>
                                                @if(Auth::user()->role == "Admin")
                                                    <td> {{ $employee->code }}</td>
                                                @endif
                                                <td width="10%">
                                                    <a href="{{ route('employee.registration.edit', $employee->id) }}"
                                                       class="mr-10 text-info" data-toggle="tooltip"
                                                       data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a target="_blank" href="{{ route('employee.registration.detail', $employee->id) }}"
                                                       class="mr-10 text-primary" data-toggle="tooltip"
                                                       data-original-title="@lang('Details')">
                                                        <i class="fa fa-check"></i>
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
