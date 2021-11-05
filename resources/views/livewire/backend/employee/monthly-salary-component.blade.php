<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">@lang('Employee') <strong>@lang('Monthly Salary')</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row" wire:ignore>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <h5>@lang('Attendace Date') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <input type="date" class="form-control" wire:model="date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="padding-top: 25px;">
                                    <a id="search" wire:click="search" class="btn btn-primary" name="search"> @lang('Search')</a>
                                </div>
                            </div>

                            @if($employee_attendances)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>@lang('SL')</th>
                                                <th>@lang('Employee Name')</th>
                                                <th>@lang('Basic Salary')</th>
                                                <th>@lang('Salary This Month')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($employee_attendances as $key => $attend)
                                                @php
                                                    $totalattend = \App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
    	 	                                        $absentcount = count($totalattend->where('attend_status','Absent'));

    	 	                                        $color = 'success';

                                                $salary = (float)$attend->user->salary;
                                                $salaryperday = (float)$salary/30;
                                                $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                                                $totalsalary = (float)$salary-(float)$totalsalaryminus;
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $attend->user->name }}</td>
                                                    <td>{{ $attend->user->salary }}</td>
                                                    <td>{{ priceFormat($totalsalary) }}</td>
                                                    <td>
                                                        <a class="btn btn-{{ $color }}" title="PaySlip" target="_blank" href="{{ route("employee.monthly.salary.payslip", $attend->employee_id) }}">@lang('Fee Slip')</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
