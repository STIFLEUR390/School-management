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
                        <h4 class="box-title">@lang('Add Employee')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('employee.registration.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- partie 1 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Employee Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('name') }}" name="name"
                                                           class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Father's Name") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('fname') }}" name="fname"
                                                           class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Mother's Name") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('mname') }}" name="mname"
                                                           class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie2 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Mobile Number') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('mobile') }}" name="mobile"
                                                           class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Address") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('address') }}" name="address"
                                                           class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Gender') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="gender" required class="form-control">
                                                        <option value="" {{ old('gender') ? '' : 'selected' }} disabled>
                                                            @lang('Select Gender')</option>
                                                        <option {{ old('gender') == 'Male' ? 'selected' : '' }}
                                                                value="Male">@lang('Male')</option>
                                                        <option {{ old('gender') == 'Female' ? 'selected' : '' }}
                                                                value="Female">@lang('Female')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie 3 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Religion') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required class="form-control">
                                                        <option value="" {{ old('religion') ? '' : 'selected' }} disabled>
                                                            @lang('Select Religion')</option>
                                                        <option {{ old('religion') == 'Christian' ? 'selected' : '' }}
                                                                value="Christian">@lang('Christian')</option>
                                                        <option {{ old('religion') == 'Protestant' ? 'selected' : '' }}
                                                                value="Protestant">@lang('Protestant')</option>
                                                        <option {{ old('religion') == 'Islamic' ? 'selected' : '' }}
                                                                value="Islamic">@lang('Islamic')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Date of Birth') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" value="{{ old('dob') }}" name="dob"
                                                           class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Designation") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="designation_id" id="designation_id" required class="form-control">
                                                        <option value="" {{ old('designation_id') ? '' : 'selected' }} disabled>
                                                            @lang('Select Designation')</option>
                                                        @foreach ($designations as $designation)
                                                            <option {{ old('designation_id') == $designation->id ? 'selected' : '' }}
                                                                    value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie 4 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Salary') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <div class="controls">
                                                        <input type="text" value="{{ old('salary') }}" name="salary"
                                                               class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Joining Date') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <div class="controls">
                                                        <input type="date" value="{{ old('join_date') }}" name="join_date"
                                                               class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Profile Image') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                                        <label>@lang("Upload (Single File)") <a href="javascript:void(0)"
                                                                                                class="custom-file-container__image-clear"
                                                                                                title="Clear Image">x</a></label>
                                                        <label class="custom-file-container__custom-file">
                                                            <input type="file" name="image"
                                                                   class="custom-file-container__custom-file__custom-file-input"
                                                                   accept="image/*" aria-label="@lang('Choose File')...">
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                            <span
                                                                class="custom-file-container__custom-file__custom-file-control"></span>
                                                        </label>
                                                        <div class="custom-file-container__image-preview"></div>
                                                    </div>
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
                "{{ url('upload/no_image.jpg') }}",
            ]
        })
    </script>
@endsection
