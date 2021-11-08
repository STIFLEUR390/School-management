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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Year') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <select  wire:model="year_id"  class="form-control">
                                                <option value="" disabled >@lang('Select Year')</option>
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
                                                <option value="" disabled>@lang('Select Class')</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Fee Category') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <select wire:model="fee_category_id" class="form-control">
                                                <option value="" disabled>@lang('Select Fee Category')</option>
                                                @foreach ($fee_categories as $fee_category)
                                                    <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>@lang('Date') <span class="text-danger"> </span></h5>
                                        <div class="controls">
                                            <input type="date" wire:model="date" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="padding-top: 25px;">
                                    <a id="search" wire:click="search" class="btn btn-primary" name="search"> @lang('Search')</a>
                                </div>
                            </div>

                            @if($assignStudents)
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <form method="post" action="{{ route('student.fee.store') }}">
                                             @csrf
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>@lang('ID No')</th>
                                                    <th>@lang('Student Name')</th>
                                                    <th>@lang('Father Name')</th>
                                                    <th>@lang('Original Fee')</th>
                                                    <th>@lang('Discount Amount')</th>
                                                    <th>@lang('Fee (This Student)')</th>
                                                    <th>@lang('Select')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($assignStudents as $key => $assign)
                                                    @php
                                                            $date = date('Y-m',strtotime($date));
                                                            $registrationfee = \App\Models\FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$assign->class_id)->first();
                                                            $accountstudentfees = \App\Models\AccountStudentFee::where('student_id',$assign->student_id)->where('year_id',$assign->year_id)->where('class_id',$assign->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
                                                            if($accountstudentfees !=null) {
                                                                $checked = 'checked';
                                                             }else{
                                                                $checked = '';
                                                             }
                                                            $color = 'success';
                                                            $orginalfee = $registrationfee->amount;
                                                            $discount = $assign->discount->discount;
                                                            $discountablefee = $discount/100*$orginalfee;
                                                            $finalfee = (int)$orginalfee-(int)$discountablefee;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            {{ $assign->student->id_no }}
                                                            <input type="hidden" name="fee_category_id" value="{{ $fee_category_id }}" />
                                                        </td>
                                                        <td>
                                                            {{ $assign->student->name }}
                                                            <input type="hidden" name="year_id" value="{{ $assign->year_id }}" />
                                                        </td>
                                                        <td>
                                                            {{ $assign->student->fname }}
                                                            <input type="hidden" name="class_id" value="{{ $assign->class_id }}" />
                                                        </td>
                                                        <td>
                                                            {{ $registrationfee->amount }}
                                                            <input type="hidden" name="date" value= "{{ $date }}" >
                                                        </td>
                                                        <td>
                                                            {{ $assign->discount->discount }} %
                                                        </td>
                                                        <td>
                                                            <input type="text" name="amount[]" value="{{ $finalfee }}" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="student_id[]" value="{{ $assign->student_id }}">
                                                            <input type="checkbox" name="checkmanage[]" id="{{ $key }}" value="{{ $key }}" {{ $checked }} style="transform: scale(1.5);margin-left: 10px;">
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
