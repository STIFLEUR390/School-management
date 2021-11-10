@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">@lang('Manage') <strong>@lang('MarkSheet Generate')</strong></h4>
                        </div>

                        <div class="box-body">
                            <form method="POST" action="{{ route('report.marksheet.get') }}" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>@lang('Year') <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id"  required class="form-control">
                                                    <option value="" {{ old('year_id')? '' : 'selected' }} disabled>@lang('Select Year')</option>
                                                        @foreach($years as $year)
                                                            <option {{ old('year_id', $year->id)? 'selected' : '' }} value="{{ $year->id }}">{{ $year->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>@lang('Class') <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id"  required class="form-control">
                                                    <option value="" {{ old('class_id')? '' : 'selected' }} disabled>@lang('Select Class')</option>
                                                        @foreach($classes as $class)
                                                            <option {{ old('class_id', $class->id)? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>@lang('Exam Type') <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id"  required class="form-control">
                                                    <option value="" {{ old('exam_type_id')? '' : 'selected' }} disabled>@lang('Select Exam Type')</option>
                                                        @foreach($exam_types as $exam)
                                                            <option {{ old('exam_type_id', $exam->id)? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>@lang('ID No') <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <input type="text" name="id_no" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">@lang('Submit')</button>
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