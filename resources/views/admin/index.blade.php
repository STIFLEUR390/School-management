@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h4 class="box-title">Your Courses</h4>
                                <div class="box-controls pull-right d-md-flex d-none">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                                <span class="font-size-30 icon-Bulb1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                            </div>
                                            <div class="ml-15">
                                                <h5 class="mb-0">UX Design</h5>
                                                <p class="text-fade font-size-12 mb-0">You Watched</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-20">
                                            <div class="w-p70">
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>80%</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                                <span class="font-size-30 icon-Pen-tool-vector"><span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                            <div class="ml-15">
                                                <h5 class="mb-0">UI Design</h5>
                                                <p class="text-fade font-size-12 mb-0">You Watched</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-20">
                                            <div class="w-p70">
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>40%</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                                <span class="font-size-30 icon-Pen-tool-vector"><span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                            <div class="ml-15">
                                                <h5 class="mb-0">UI Design</h5>
                                                <p class="text-fade font-size-12 mb-0">You Watched</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-20">
                                            <div class="w-p70">
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>40%</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-12">
                                <a href="#" class="box pull-up">
                                    <div class="box-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                                <span class="font-size-30 icon-Chat-check"><span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                            <div class="ml-15">
                                                <h5 class="mb-0">Marketing</h5>
                                                <p class="text-fade font-size-12 mb-0">You Watched</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-20">
                                            <div class="w-p70">
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>30%</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Responsive Hover Table</h4>
                                <div class="box-controls pull-right">
                                    <div class="lookup lookup-circle lookup-right">
                                        <input type="text" name="s">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Invoice</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Country</th>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #123456</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$158.00</td>
                                            <td><span class="badge badge-pill badge-danger">Pending</span></td>
                                            <td>CH</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #458789</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$55.00</td>
                                            <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                            <td>US</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #84532</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$845.00</td>
                                            <td><span class="badge badge-pill badge-danger">Prossing</span></td>
                                            <td>IG</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #48956</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$145.00</td>
                                            <td><span class="badge badge-pill badge-success">Paid</span></td>
                                            <td>EN</td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">Order #92154</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                            <td>$450.00</td>
                                            <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                            <td>UK</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
