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
                                <h3 class="box-title">@lang('Other Cost List')</h3>
                                <a href="{{ route('other.cost.create') }}" style="float: right;" class="mb-5 waves-effect waves-light btn btn-rounded btn-success">
                                    <i class="ti-plus"></i> @lang("Add Other Cost")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang("Date")</th>
                                            <th>@lang('Amount') </th>
                                            <th>@lang("Description")</th>
                                            <th>@lang("Image")</th>
                                            <th>@lang("Action")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($account_other_costs as $key => $cots)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ date('d-m-Y', strtotime($cots->date)) }}</td>
                                                <td> {{ $cots->amount }}</td>
                                                <td> {{ $cots->description }}</td>
                                                <td>
                                                    <img src="{{ (!empty($cots->image))? url('upload/cost_images/'.$cots->image):url('upload/no_image.jpg') }}" style="width: 70px; height: 50px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('other.cost.edit', $cots->date) }}"
                                                       class="mr-10 text-info" data-toggle="tooltip"
                                                       data-original-title="@lang('Edit')">
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
