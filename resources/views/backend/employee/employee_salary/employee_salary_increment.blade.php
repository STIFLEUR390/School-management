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
                        <h4 class="box-title">@lang('Employee Salary Increment')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('employee.salary.update', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('Salary Amount') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('increment_salary') }}" name="increment_salary"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang("Effected Date") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" value="{{ old('effected_salary') }}" name="effected_salary"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-xs-right">
                                                <input type="submit" value="@lang('Save')" class="btn btn-rounded btn-info">
                                            </div>
                                        </div>
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

@section('styles')
    <link href="{{ asset('js/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('js/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage', {
            presetFiles: [
                "{{ !empty($user->image) ? url('upload/employee_images/' . $user->image) : url('upload/no_image.jpg') }}",
            ]
        })
    </script>
@endsection
