@extends('layout.master')

@section('content')



    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông Tin Dịch Vụ</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $register_service->id }}</td>

                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <td>{{ $register_service->code }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $customer_name }}</td>
                                </tr>

                                <tr>
                                    <th>Service Name</th>
                                    <td>{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}</td>
                                </tr>
                                <tr>

                                    <th>Start Date</th>
                                    <td>{{ $register_service->start_date }}</td>
                                </tr>
                                <tr>

                                    <th>End Date</th>
                                    <td>{{ $register_service->end_date }}</td>
                                </tr>
                                <tr>

                                    <th>Exist Date</th>
                                    <td>{{ $register_service->exist_date }}</td>
                                </tr>
                                <tr>

                                    <th>Notes</th>
                                    <td>{{ $register_service->notes }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <a href="{{ route('admin.register_services.index') }}" class="btn btn-default">{{ __('general.back') }}</a>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop
