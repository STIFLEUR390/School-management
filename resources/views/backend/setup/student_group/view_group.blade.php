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
                                <h3 class="box-title">@lang('Student Group List')</h3>
                                <a href="{{ route('student.group.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5"><i class="ti-plus"></i> @lang("Add Student Group")</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('SL')</th>
                                            <th>@lang('Name')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($studentGroups as $key => $studentGroup)
                                            <tr>
                                                <td >{{ $key + 1 }}</td>
                                                <td>{{ $studentGroup->name }}</td>
                                                <td width="10%">
                                                    <a href="{{ route('student.group.edit', $studentGroup->id) }}" class="text-info mr-10" data-toggle="tooltip" data-original-title="@lang('Edit')">
                                                        <i class="ti-marker-alt"></i>
                                                    </a>
                                                    <a href="{{ route('student.group.delete', $studentGroup->id) }}"  class="text-danger delete" data-original-title="@lang('Delete')" data-toggle="tooltip">
                                                        <i class="ti-trash"></i>
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
