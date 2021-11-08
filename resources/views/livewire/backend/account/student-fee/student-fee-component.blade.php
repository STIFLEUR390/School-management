
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('Student Fee List')</h3>
                                <a href="{{ route('student.fee.create') }}" style="float: right;" class="waves-effect waves-light btn btn-rounded btn-success mb-5">
                                    <i class="ti-plus"></i> @lang("Add / Edit Student Fee")
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">@lang('SL')</th>
                                            <th>@lang("ID No")</th>
                                            <th>@lang("Name") </th>
                                            <th>@lang("Year")</th>
                                            <th>@lang("Class") </th>
                                            <th>@lang("Fee Type")</th>
                                            <th>@lang("Amount")</th>
                                            <th>@lang("Date")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($accountStudentFees as $key => $account)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $account->student->id_no }}</td>
                                                <td> {{ $account->student->name }}</td>
                                                <td> {{ $account->student_year->name }}</td>
                                                <td> {{ $account->student_class->name }}</td>
                                                <td> {{ $account->fee_category->name }} </td>
                                                <td> {{ $account->amount }}</td>
                                                <td> {{ date('M Y', strtotime($account->date))  }}</td>
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

