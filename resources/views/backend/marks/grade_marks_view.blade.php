@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('Grade Marks List')</h3>
                                <a href="{{ route('marks.grade.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add Grade Marks")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang("Grade Name")</th>
                                            <th>@lang("Grade Point")</th>
                                            <th>@lang("Start Marks")</th>
                                            <th>@lang("End Marks") </th>
                                            <th>@lang("Point Range")</th>
                                            <th>@lang("Remarks")</th>
                                            <th width="10%">@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($marks_grades as $key => $grade)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $grade->grade_name }}</td>
                                                <td> {{ number_format((float)$grade->grade_point,2)  }}</td>
                                                <td> {{ $grade->start_marks }}</td>
                                                <td> {{ $grade->end_marks }}</td>
                                                <td> {{ $grade->start_point }} -  {{ $grade->end_point }}</td>
                                                <td> {{ $grade->remarks }}</td>
                                                <td>
                                                    <a href="{{ route('marks.grade.edit', $grade->id) }}" class="text-info mr-10" data-toggle="tooltip" data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
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
