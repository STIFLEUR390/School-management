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
                                <h3 class="box-title">@lang('Assign Subject List')</h3>
                                <a href="{{ route('assign.subject.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add Assign Subject")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('SL')</th>
                                            <th>@lang('Class Name')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignSubjects as $key => $assignSubject)
                                            <tr>
                                                <td >{{ $key + 1 }}</td>
                                                <td>{{ $assignSubject->student_class->name }}</td>
                                                <td width="10%">
                                                    <a href="{{ route('assign.subject.edit', $assignSubject->class_id) }}" class="text-info mr-10" data-toggle="tooltip" data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a href="{{ route('assign.subject.show', $assignSubject->class_id) }}"  class="text-primary" data-original-title="@lang('Details')" data-toggle="tooltip">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    {{--<a href="{{ route('fee.amount.destroy', $feeCategoryAmount->fee_category_id) }}"  class="text-danger delete" data-original-title="@lang('Delete')" data-toggle="tooltip">
                                                        <i class="ti-trash"></i>
                                                    </a>--}}
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
