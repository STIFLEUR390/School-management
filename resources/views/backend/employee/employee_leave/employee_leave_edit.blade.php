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
                        <h4 class="box-title">@lang('Employee Leave')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('employee.leave.update', $employee_leave->id) }}">
                                    @csrf
                                    @method('PUT')
                                    {{-- partie 1 --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('Employee Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="employee_id" id="employee_id" required class="form-control">
                                                        <option value="" {{ old('employee_id', $employee_leave->employee_id) ? '' : 'selected' }} disabled>@lang('Select Employee Name')</option>
                                                        @foreach($employees as $employee)
                                                            <option {{ old('employee_id', $employee_leave->employee_id) ? 'selected' : '' }} value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang("Start Date") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" value="{{ old('start_date', $employee_leave->start_date) }}" name="start_date"
                                                           class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie2 --}}
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang("Leave Purpose") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="leave_purpose_id" id="leave_purpose_id" required class="form-control">
                                                        <option value="" {{ old('employee_id', $employee_leave->leave_purpose_id) ? '' : 'selected' }} disabled>@lang('Select Leave Purpose')</option>
                                                        @foreach($leave_purposes as $leave)
                                                            <option {{ old('employee_id', $employee_leave->leave_purpose_id) ? 'selected' : '' }} value="{{ $leave->id }}">{{ $leave->name }}</option>
                                                        @endforeach
                                                        <option value="0">@lang('New Purpose')</option>
                                                    </select>
                                                    <input type="text" value="{{ old('name') }}" id="add_another" name="name"
                                                           class="form-control" placeholder="@lang('Write Purpose')" style="display: none;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('End Date') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" value="{{ old('end_date', $employee_leave->end_date) }}" name="end_date"
                                                           class="form-control" />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#leave_purpose_id',function(){
                var leave_purpose_id = $(this).val();
                if (leave_purpose_id == '0') {
                    $('#add_another').show();
                }else{
                    $('#add_another').hide();
                }
            });
        });
    </script>
@endsection
