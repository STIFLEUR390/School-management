<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">@lang('Manage') <strong>@lang('Monthly/Yearly Profit')</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span wire:dirty wire:target="date_start">@lang('Updating...')</span>
                                        <h5>@lang('Start Date') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <input type="date" class="form-control" wire:model.lazy="date_start">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span wire:dirty wire:target="date_start">@lang('Updating...')</span>
                                        <h5>@lang('End Date') <span class="text-date_end"> </span></h5>
                                        <div class="controls">
                                            <input type="date" class="form-control" wire:model.lazy="date_end">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4" style="padding-top: 25px;">
                                    <a id="search" wire:click="search" class="btn btn-primary" name="search"> @lang('Search')</a>
                                </div> --}}
                            </div>

                            @if($account_student_fees)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>@lang('Student Fee')</th>
                                                    <th>@lang('Other Cost')</th>
                                                    <th>@lang('Employee Salary')</th>
                                                    <th>@lang('Total Cost')</th>
                                                    <th>@lang('Profit')</th>
                                                    <th>@lang('Action')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $student_fee }}</td>
                                                    <td>{{ $other_cost }}</td>
                                                    <td>{{ $emp_salary }}</td>
                                                    <td>{{ $total_cost }}</td>
                                                    <td>{{ $profit }}</td>
                                                    <td>
                                                        <a class="btn btn-success" title="PDF" target="_blank" href="{{ route("report.profit.pdf", ['start_date' => $sdate, 'end_date' => $edate]) }}">@lang('Pay Slip')</a>
                                                    </td>
                                                </tr>
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
