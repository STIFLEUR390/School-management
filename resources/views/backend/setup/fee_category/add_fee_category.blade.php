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
                        <h4 class="box-title">@lang('Add Fee Category')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('fee.category.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>@lang('Fee Category Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" required />
                                                </div>
                                                {{--                                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>--}}
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
@endsection
