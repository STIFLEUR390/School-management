<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">@lang('Student') <strong>@lang('Registration Fee')</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row" wire:ignore>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Year') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <select  wire:model="year_id"  class="form-control">
                                                <option value="" disabled >Select Year</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Class') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <select wire:model="class_id" class="form-control">
                                                <option value="" disabled>Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Month') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <select wire:model="month" class="form-control">
                                                <option value="" selected="" disabled="">Select Month</option>
                                                <option value="January">@lang('January')</option>
                                                <option value="Febuary">@lang('Febuary')</option>
                                                <option value="March">@lang('March')</option>
                                                <option value="April">@lang('April')</option>
                                                <option value="May">@lang('May')</option>
                                                <option value="Jun">@lang('Jun')</option>
                                                <option value="July">@lang('July')</option>
                                                <option value="August">@lang('August')</option>
                                                <option value="September">@lang('September')</option>
                                                <option value="October">@lang('October')</option>
                                                <option value="November">@lang('November')</option>
                                                <option value="December">@lang('December')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="padding-top: 25px;">
                                    <a id="search" wire:click="search" class="btn btn-primary" name="search"> @lang('Search')</a>
                                </div>
                            </div>

                            @if($assignStudents)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>@lang('SL')</th>
                                                <th>@lang('ID No')</th>
                                                <th>@lang('Student Name')</th>
                                                <th>@lang('Roll No')</th>
                                                <th>@lang('Monthly Fee')</th>
                                                <th>@lang('Discount')</th>
                                                <th>@lang('Student Fee')</th>
                                                <th>@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($assignStudents as $key => $assignStudent)
                                                @php
                                                    $registrationfee = \App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id', $assignStudent->class_id)->first();
                                                    $color = 'success';

                                                    $originalfee = $registrationfee->amount;
                                                    $discount = $assignStudent->discount->discount;
                                                    $discounttablefee = $discount / 100 * $originalfee;
                                                    $finalfee = (float)$originalfee - (float)$discounttablefee;
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $assignStudent->student->id_no }}</td>
                                                    <td>{{ $assignStudent->student->name }}</td>
                                                    <td>{{ $assignStudent->roll }}</td>
                                                    <td>{{ priceFormat($registrationfee->amount) }}</td>
                                                    <td>{{ $assignStudent->discount->discount }}</td>

                                                    <td>{{ priceFormat($finalfee) }}</td>
                                                    <td>
                                                        <a class="btn btn-{{ $color }}" title="PaySlip" target="_blank" href="{{ route('student.monthly.fee.payslip', ['class_id' => $assignStudent->class_id, 'student_id' => $assignStudent->student_id, 'month' => $month]) }}">@lang('Fee Slip')</a>
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
