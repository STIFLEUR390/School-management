@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

        <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">@lang('Add Fee Amount')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('fee.amount.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>@lang('Fee Category') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" id="fee_category_id" required class="form-control">
                                                        <option value="" selected disabled>@lang('Select Fee Category')</option>
                                                        @foreach($feeCategories as $feeCategory)
                                                            <option value="{{ old('fee_category_id', $feeCategory->id) }}">{{ $feeCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add_item">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <h5>@lang('Student Classe') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id[]"  required class="form-control">
                                                            <option value="" selected disabled>@lang('Select Fee Category')</option>
                                                            @foreach($classes as $class)
                                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <h5>@lang('Amount') <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="amount[]" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 1.7rem !important;">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
{{--                                                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>--}}
                                            </div>
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>@lang('Student Classe') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id[]"  required class="form-control">
                                    <option value="" selected disabled>@lang('Select Fee Category')</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>@lang('Amount') <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  name="amount[]" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 1.7rem !important;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div>
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
