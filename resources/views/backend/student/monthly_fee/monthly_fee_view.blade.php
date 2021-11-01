@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <div class="col-12">
                        <div class="box bb-3 border-warning">
                            <div class="box-header">
                                <h4 class="box-title">@lang('Student') <strong>@lang('Monthly Fee')</strong></h4>
                            </div>

                            <div class="box-body">


                                <div class="row">



                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Year <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Class <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>@lang('Month') <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="month" id="month" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Month</option>
                                                    <option value="January">@lang('January')</option>
                                                    <option value="Febuary">@lang('Febuary')</option>
                                                    <option value="March">@lang('March')</option>
                                                    <option value="April">@lang('April')</option>
                                                    <option value="May">@lang('May')</option>
                                                    <option value="Jun">@lang('Jun')</option>
                                                    <option value="July">@lang('July')</option>
                                                    <option value="August">@lang('August')</option>
                                                    <option value="September">@lang('September')</option>
                                                    <option value="October">@lang('October')</option>
                                                    <option value="November">@lang('November')</option>
                                                    <option value="December">@lang('December')</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 4 -->

                                    <div class="col-md-3" style="padding-top: 25px;">

                                        <a id="search" class="btn btn-primary" name="search"> Search</a>

                                    </div> <!-- End Col md 4 -->
                                </div><!--  end row -->


                                <!--  ////////////////// Registration Fee table /////////////  -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="DocumentResults">
                                            <script id="document-template" type="text/x-handlebars-template">
                                                <table class="table table-bordered table-striped" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        @{{{thsource}}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @{{#each this}}
                                                    <tr>
                                                        @{{{tdsource}}}
                                                    </tr>
                                                    @{{/each}}
                                                    </tbody>
                                                </table>
                                            </script>
                                        </div>
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

@endsection


@section('scripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('js/handlebars.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> --}}

    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var month = $('#month').val();
            $.ajax({
                url: "{{ route('student.monthly.fee.classwise.get')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'month':month},
                beforeSend: function() {
                },
                success: function (data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });

    </script>
@endsection
