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
                        <h4 class="box-title">@lang('Manage Profile')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                                        class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Email') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" value="{{ old('email', $user->email) }}"
                                                        name="email" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Mobile') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('mobile', $user->mobile) }}"
                                                        name="mobile" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Address') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{ old('address', $user->address) }}"
                                                        name="address" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <h5>@lang('User Gender') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="gender" required class="form-control">
                                                        <option value="" disabled>@lang('Select gender')</option>
                                                        <option
                                                            {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}
                                                            value="Male">@lang('Male')</option>
                                                        <option
                                                            {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}
                                                            value="Female">@lang('Female')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
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

@section('styles')
    <link href="{{ asset('js/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('js/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage', {
            presetFiles: [
                "{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}",
            ]
        })
    </script>
@endsection
