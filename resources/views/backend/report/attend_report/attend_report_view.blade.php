@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">@lang('Manage') <strong>@lang('Employee Attendance Report')</strong></h4>
                            </div>

                            <div class="box-body">
                                <form method="POST" action="{{ route('report.attendance.get') }}" target="_blank">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>@lang('Employee Name') <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <select name="employee_id" id="employee_id"  required class="form-control">
                                                        <option value="" {{ old('employee_id')? '' : 'selected' }} disabled>@lang('Select Year')</option>
                                                        @foreach($employees as $employee)
                                                            <option {{ old('employee_id', $employee->id)? 'selected' : '' }} value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>@lang('Date') <span class="text-danger"> </span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">@lang('Search')</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
