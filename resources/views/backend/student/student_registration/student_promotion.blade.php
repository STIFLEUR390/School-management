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
                        <h4 class="box-title">@lang('Student Promotion')</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post"
                                    action="{{ route('promotion.student.registration', $assignStudent->student_id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="assign_student_id" value="{{ $assignStudent->id }}" />
                                    {{-- partie 1 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Student Name') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ old('name', $assignStudent->student->name) }}"
                                                        name="name" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Father's Name") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ old('fname', $assignStudent->student->fname) }}"
                                                        name="fname" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Mother's Name") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ old('mname', $assignStudent->student->mname) }}"
                                                        name="mname" class="form-control" required />
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
                                                    <input type="text"
                                                        value="{{ old('mobile', $assignStudent->student->mobile) }}"
                                                        name="mobile" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Address") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ old('address', $assignStudent->student->address) }}"
                                                        name="address" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Gender') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="gender" required class="form-control">
                                                        <option value=""
                                                            {{ old('gender', $assignStudent->student->gender) ? '' : 'selected' }}
                                                            disabled>Select Gender</option>
                                                        <option
                                                            {{ old('gender', $assignStudent->student->gender) == 'Male' ? 'selected' : '' }}
                                                            value="Male">@lang('Male')</option>
                                                        <option
                                                            {{ old('gender', $assignStudent->student->gender) == 'Female' ? 'selected' : '' }}
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
                                                        <option value=""
                                                            {{ old('religion', $assignStudent->student->religion) ? '' : 'selected' }}
                                                            disabled>@lang('Select Religion')</option>
                                                        <option
                                                            {{ old('religion', $assignStudent->student->religion) == 'Christian' ? 'selected' : '' }}
                                                            value="Christian">@lang('Christian')</option>
                                                        <option
                                                            {{ old('religion', $assignStudent->student->religion) == 'Protestant' ? 'selected' : '' }}
                                                            value="Protestant">@lang('Protestant')</option>
                                                        <option
                                                            {{ old('religion', $assignStudent->student->religion) == 'Islamic' ? 'selected' : '' }}
                                                            value="Islamic">@lang('Islamic')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Date of Birth') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date"
                                                        value="{{ old('dob', $assignStudent->student->dob) }}" name="dob"
                                                        class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang("Discount") <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ old('discount', $assignStudent->discount->discount) }}"
                                                        name="discount" class="form-control" required />
                                                </div>
                                                {{-- <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie 4 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Year') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required class="form-control">
                                                        <option value=""
                                                            {{ old('year_id', $assignStudent->year_id) ? '' : 'selected' }}
                                                            disabled>@lang('Select Year')</option>
                                                        @foreach ($studentYears as $year)
                                                            <option
                                                                {{ old('year_id', $assignStudent->year_id) == $year->id ? 'selected' : '' }}
                                                                value="{{ $year->id }}">{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Class') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required class="form-control">
                                                        <option value=""
                                                            {{ old('class_id', $assignStudent->class_id) ? '' : 'selected' }}
                                                            disabled>@lang('Select Class')</option>
                                                        @foreach ($studentClasses as $class)
                                                            <option
                                                                {{ old('class_id', $assignStudent->class_id) == $class->id ? 'selected' : '' }}
                                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Group') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="group_id" id="group_id" required class="form-control">
                                                        <option value=""
                                                            {{ old('group_id', $assignStudent->group_id) ? '' : 'selected' }}
                                                            disabled>@lang('Select Group')</option>
                                                        @foreach ($studentGroups as $group)
                                                            <option
                                                                {{ old('group_id', $assignStudent->group_id) == $group->id ? 'selected' : '' }}
                                                                value="{{ $group->id }}">{{ $group->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- partie 5 --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Shift') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="shift_id" id="shift_id" required class="form-control">
                                                        <option value=""
                                                            {{ old('shift_id', $assignStudent->shift_id) ? '' : 'selected' }}
                                                            disabled>@lang('Select Shift')</option>
                                                        @foreach ($studentShifts as $shift)
                                                            <option
                                                                {{ old('shift_id', $assignStudent->shift_id) == $shift->id ? 'selected' : '' }}
                                                                value="{{ $shift->id }}">{{ $shift->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
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
                                        <input type="submit" value="@lang('Promotion')" class="btn btn-rounded btn-info">
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
                "{{ !empty($assignStudent->student->image) ? url('upload/student_images/' . $assignStudent->student->image) : url('upload/no_image.jpg') }}",
            ]
        })
    </script>
@endsection
