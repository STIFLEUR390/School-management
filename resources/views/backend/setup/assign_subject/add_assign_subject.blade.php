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
                        <h4 class="box-title">@lang('Add Assign subject')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('assign.subject.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>@lang('Class Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required class="form-control">
                                                        <option value="" selected disabled>@lang('Select Class')</option>
                                                        @foreach($studentClasses as $studentClass)
                                                            <option value="{{ old('class_id', $studentClass->id) }}">{{ $studentClass->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add_item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>@lang('Student Subject') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subject_id[]"  required class="form-control">
                                                            <option value="" selected disabled>@lang('Select Fee Category')</option>
                                                            @foreach($schoolSubjects as $schoolSubject)
                                                                <option value="{{ $schoolSubject->id }}">{{ $schoolSubject->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>@lang('Full Mark') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="full_mark[]" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <h5>@lang('Pass Mark') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="pass_mark[]" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <h5>@lang('Subjective Mark') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="subjective_mark[]" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 1.7rem !important;">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                                {{--                                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>--}}
                                            </div>
                                            <hr/>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" value="@lang('Save')" class="btn btn-rounded btn-info">
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

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>@lang('Student Subject') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]"  required class="form-control">
                                    <option value="" selected disabled>@lang('Select Fee Category')</option>
                                    @foreach($schoolSubjects as $schoolSubject)
                                        <option value="{{ $schoolSubject->id }}">{{ $schoolSubject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>@lang('Full Mark') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  name="full_mark[]" class="form-control" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>@lang('Pass Mark') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  name="pass_mark[]" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>@lang('Subjective Mark') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  name="subjective_mark[]" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 1.7rem !important;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            let counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });

            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });
        });
    </script>
@endsection
