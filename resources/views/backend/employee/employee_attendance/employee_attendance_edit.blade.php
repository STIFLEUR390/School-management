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
                        <h4 class="box-title">@lang('Add Attendance')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('employee.attendance.store') }}">
                                    @csrf
                                    {{-- partie 1 --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang("Attendance Date") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" value="{{ old('date', $employee_attendances[0]->date) }}" name="date"
                                                           class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">@lang('Sl')</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">@lang('Employee List')</th>
                                                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 32%">@lang('Attendance Status')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($employee_attendances as $key => $attendance)
                                                    <tr id="div{{$attendance->id}}" class="text-center">
                                                        <input type="hidden" name="employee_id[]"  value="{{ $attendance->employee_id }}">
                                                        <td>{{ $key+1  }}</td>
                                                        <td>{{ $attendance->user->name }}</td>
                                                        <td colspan="3">
                                                            <div class="switch-toggle switch-3 switch-candy">

                                                                <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked" {{ ($attendance->attend_status == 'Present')?'checked':'' }}>
                                                                <label for="present{{$key}}">@lang('Present')</label>

                                                                <input name="attend_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}"  {{ ($attendance->attend_status == 'Leave')?'checked':'' }} >
                                                                <label for="leave{{$key}}">@lang('Leave')</label>

                                                                <input name="attend_status{{$key}}" value="Absent"  type="radio" id="absent{{$key}}"  {{ ($attendance->attend_status == 'Absent')?'checked':'' }} >
                                                                <label for="absent{{$key}}">@lang('Absent')</label>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-xs-right">
                                                <input type="submit" value="@lang('Save')" class="btn btn-rounded btn-info">
                                            </div>
                                        </div>
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
