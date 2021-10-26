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
                                <h3 class="box-title">@lang('Assign Subject Details')</h3>
                                <a href="{{ route('assign.subject.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add Assign Subject")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>@lang('Assign Subject')</strong> : {{ $assignSubjects[0]->student_class->name }}</h4>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('SL')</th>
                                            <th>@lang('Subject')</th>
                                            <th>@lang('Full Mark')</th>
                                            <th>@lang('Pass Mark')</th>
                                            <th>@lang('Subjective Mark')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignSubjects as $key => $assignSubject)
                                            <tr>
                                                <td >{{ $key + 1 }}</td>
                                                <td>{{ $assignSubject->student_class->name }}</td>
                                                <td>{{ $assignSubject->full_mark }}</td>
                                                <td>{{ $assignSubject->pass_mark }}</td>
                                                <td>{{ $assignSubject->subjective_mark }}</td>
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
