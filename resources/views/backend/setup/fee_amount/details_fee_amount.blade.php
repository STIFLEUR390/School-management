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
                                <h3 class="box-title">@lang('Fee Amount Details')</h3>
                                <a href="{{ route('fee.amount.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add Fee Amount")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>@lang('Fee Category'): </strong>{{ $feeCategoryAmounts['0']->fee_category->name }}</h4>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>@lang('SL')</th>
                                            <th>@lang('Class Name')</th>
                                            <th>@lang('Amount')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feeCategoryAmounts as $key => $feeCategoryAmount)
                                            <tr>
                                                <td >{{ $key + 1 }}</td>
                                                <td>{{ $feeCategoryAmount->student_class->name }}</td>
                                                <td width="10%">{{ $feeCategoryAmount->amount }}</td>
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
