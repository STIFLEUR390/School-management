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
                                <h4 class="box-title">@lang('Student') <strong>@lang('Roll Generator')</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('roll.generate.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>@lang('Year') <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" id="year_id" required class="form-control">
                                                        <option value="" {{ old('year_id') ? '' : 'selected' }} disabled>Select Year</option>
                                                        @foreach($years as $year)
                                                            <option {{ (old('year_id') == $year->id) ? 'selected' : '' }} value="{{ $year->id }}">{{ $year->name }}</option>
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
                                                        <option value="" {{ old('class_id') ? '' : 'selected' }} disabled>Select Class</option>
                                                        @foreach($classes as $class)
                                                            <option {{ (old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4" style="padding-top: 25px;">
                                            <a id="search" class="btn btn-primary" name="search">@lang('Search')</a>
{{--                                            <input type="submit" value="@lang('Search')" class="btn btn-rounded btn-dark">--}}
                                        </div>
                                    </div>

{{--                                    Roll genereta table--}}
                                    <div class="row d-none" id="roll-generate">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped mb-0" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID No</th>
                                                        <th>@lang("Student Name")</th>
                                                        <th>@lang("Father Name")</th>
                                                        <th>@lang("Gender")</th>
                                                        <th>@lang("Roll")</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="roll-generate-tr">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info" value="@lang('Roll Generator')" />
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
            $.ajax({
                url: "{{ route('student.registration.get')}}",
                type: "GET",
                data: {'year_id':year_id,'class_id':class_id},
                success: function (data) {
                    $('#roll-generate').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                }
            });
        });

    </script>
@endsection
