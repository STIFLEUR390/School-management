@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">@lang('Student') <strong>@lang('Search')</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('students.year.class.wise') }}" method="GET">
                                    {{--                                @csrf--}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Year') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required class="form-control">
                                                        <option value="" {{ old('year_id') ? '' : 'selected' }} disabled>Select Year</option>
                                                        @foreach($studentYears as $year)
                                                            <option {{ (old('year_id', $year_id) == $year->id) ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->name }}</option>
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
                                                        <option value="" {{ old('class_id', $class_id) ? '' : 'selected' }} disabled>Select Class</option>
                                                        @foreach($studentClasses as $class)
                                                            <option {{ (old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4" style="padding-top: 25px;">
                                            <input type="submit" value="@lang('Search')" class="btn btn-rounded btn-dark">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('Student List')</h3>
                                <a href="{{ route('students.registration.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add Student")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang('Name')</th>
                                            <th>@lang('Id No')</th>
                                            <th>@lang('Roll')</th>
                                            <th>@lang('Year')</th>
                                            <th>@lang('Class')</th>
                                            <th>@lang('Image')</th>
                                            @if(Auth::user()->role == "Admin")
                                                <th>@lang('code')</th>
                                            @endif
                                            <th width="15%">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($asssignStudents as $key => $asssignStudent)
                                            <tr>
                                                <td >{{ $key + 1 }}</td>
                                                <td>{{ $asssignStudent->student->name }}</td>
                                                <td>{{ $asssignStudent->student->id_no }}</td>
                                                <td>{{ $asssignStudent->roll }}</td>
                                                <td>{{ $asssignStudent->student_year->name }}</td>
                                                <td>{{ $asssignStudent->student_class->name }}</td>
                                                <td>
                                                    <img src="{{ (!empty($asssignStudent->student->image)) ? url('upload/student_images/'.$asssignStudent->student->image) : url('upload/no_image.jpg') }}" style="width: 60px; height: 60px;" />
                                                </td>
                                                @if(Auth::user()->role == "Admin")
                                                    <td>{{ $asssignStudent->student->code }}</td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('students.registration.edit', $asssignStudent->id) }}" class="text-info mr-10" data-toggle="tooltip" data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a href="{{ route('students.registration.promotion', $asssignStudent->id) }}" class="text-primary mr-10" data-toggle="tooltip" data-original-title="@lang('Promotion')">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a target="_blank" href="{{ route('students.registration.destroy', $asssignStudent->id) }}"  class="text-danger " data-original-title="@lang('Details')" data-toggle="tooltip">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
