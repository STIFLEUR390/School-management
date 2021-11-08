<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">@lang('Add') <strong>@lang('Student Fee')</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>@lang('Date') <span class="text-danger"> </span></h5>
                                        <span wire:dirty wire:target="date">Updating...</span>
                                        <div class="controls">
                                            <input type="date" wire:model.lazy="date" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="padding-top: 25px;">
                                    <a id="search" wire:click="search" class="btn btn-primary" name="search"> @lang('Search')</a>
                                </div>
                            </div>

                            @if($salaries)
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <form method="post" action="{{ route('account.salary.store') }}">
                                            @csrf
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>@lang('SL')</th>
                                                    <th>@lang('ID No')</th>
                                                    <th>@lang('Employee Name')</th>
                                                    <th>@lang('Basic Salary')</th>
                                                    <th>@lang('Salary This Month')</th>
                                                    <th>@lang('Select')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($salaries as $key => $salary)
                                                    @php
                                                        $account_salary = \App\Models\AccountEmployeeSalary::where('employee_id',$salary->employee_id)->where('date',$date)->first();

                                                        $user = $salary->user;
                                                        $employee_id = $salary->employee_id;
                                                        if($account_salary !=null) {
                                                            $checked = 'checked';
                                                        }else{
                                                            $checked = '';
                                                        }
                                                        $totalattend = \App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$salary->employee_id)->get();
    	 	                                            $absentcount = count($totalattend->where('attend_status','Absent'));

    	 	                                            $salary = (!empty($user->salary))? (float)$user->salary : 0;
                                                        $salaryperday = (float)$salary/30;
                                                        $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                                                        $totalsalary = (float)$salary-(float)$totalsalaryminus;
                                                        $totalsalary = round($totalsalary, 0);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            {{ $user->id_no }}
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->salary }}</td>
                                                        <td>
                                                            {{ $totalsalary }}
                                                            <input type="hidden" name="amount[]" value="{{ $totalsalary }}" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="employee_id[]" value="{{ $employee_id }}">
                                                            <input type="checkbox"  name="checkmanage[]" id="{{ $key }}" value="{{ $key }}" {{ $checked }} style="transform: scale(1.5);margin-left: 10px;">
                                                            <label for="{{ $key }}"> </label>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 10px">@lang("Submit")</button>
                                        </form>
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
