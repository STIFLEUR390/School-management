@extends('admin.admin_master')

@section('admin')
    <style>
        hr {
            width: 100%;
            height: 1px;
            color: aliceblue;
            background-color: aliceblue;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">@lang('Edit Grade Marks')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('marks.grade.update', $grade->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Grade Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('grade_name', $grade->grade_name) }}" name="grade_name"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Grade Point') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('grade_point', $grade->grade_point) }}" name="grade_point"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Start Marks') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('start_marks', $grade->start_marks) }}" name="start_marks"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('End Marks') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('end_marks', $grade->end_marks) }}" name="end_marks"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Start Point') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('start_point', $grade->start_point) }}" name="start_point"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('End Point') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('end_point', $grade->end_point) }}" name="end_point"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Remarks') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('remarks', $grade->remarks) }}" name="remarks"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" value="@lang('Submit')" class="btn btn-rounded btn-info">
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

