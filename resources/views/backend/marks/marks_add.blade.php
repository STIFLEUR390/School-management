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
                                <h4 class="box-title">@lang('Student') <strong>@lang('Marks Entry')</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('marks.entry.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>@lang('Year') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required class="form-control">
                                                        <option value="" {{ old('year_id') ? '' : 'selected' }} disabled>@lang('Select Year')</option>
                                                        @foreach($years as $year)
                                                            <option {{ (old('year_id') == $year->id) ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>@lang('Class') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id" id="class_id" required class="form-control">
                                                        <option value="" {{ old('class_id') ? '' : 'selected' }} disabled>@lang('Select Class')</option>
                                                        @foreach($classes as $class)
                                                            <option {{ (old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>@lang('Subject') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="assign_subject_id" id="assign_subject_id" required class="form-control">
                                                        <option selected>@lang('Select Subject')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>@lang('Exam Type') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="exam_type_id" id="exam_type_id" required class="form-control">
                                                        <option value="" {{ old('exam_type_id') ? '' : 'selected' }} disabled>@lang('Select Class')</option>
                                                        @foreach($exam_types as $exam)
                                                            <option {{ (old('exam_type_id') == $exam->id) ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 25px;">
                                            <a id="search" class="btn btn-primary" name="search">@lang('Search')</a>
                                            {{--                                            <input type="submit" value="@lang('Search')" class="btn btn-rounded btn-dark">--}}
                                        </div>
                                    </div>

                                    {{--                                    Roll genereta table--}}
                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped mb-0" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>@lang('ID No')</th>
                                                    <th>@lang("Student Name") </th>
                                                    <th>@lang("Father Name") </th>
                                                    <th>@lang("Gender")</th>
                                                    <th>@lang("Marks")</th>
                                                </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info" value="@lang('Submit')" />
                                </form>
                            </div>
                        </div>
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

@section('scripts')
    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var assign_subject_id = $('#assign_subject_id').val();
            var exam_type_id = $('#exam_type_id').val();
            $.ajax({
                url: "{{ route('student.marks.getstudents')}}",
                type: "GET",
                data: {'year_id':year_id,'class_id':class_id},
                success: function (data) {
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });

    </script>



    <!--   // for get Student Subject  -->

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#class_id',function(){
                var class_id = $('#class_id').val();
                $.ajax({
                    url:"{{ route('marks.getsubject') }}",
                    type:"GET",
                    data:{class_id:class_id},
                    success:function(data){
                        var html = '<option value="">@lang('Select Subject')</option>';
                        $.each( data, function(key, v) {
                            html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });
        });
    </script>
@endsection
