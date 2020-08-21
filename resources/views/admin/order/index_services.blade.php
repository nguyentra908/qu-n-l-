@extends('layout.master')

@section('content')

    <div class="content">
        <h1 class="titleheader">Đơn hàng dịch vụ</h1>
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger">
                    {{session('fail')}}
                </div>
            @endif
        </div>
        <div class="panel panel-default">
            <form method="get" class="search_frm" action="{{route('admin.order.searchservices')}}">
                @csrf
                <h4 class="panel-title">
                    <div id="color1" class="card abcdef" >
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="heading79">
                            <!-- Heading -->
                            <a class="collapsed bar-search" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#addstudent" aria-expanded="false" aria-controls="schedule">
                                <h5 class="mt-1 mb-0">
                                    <label class="registerservice">Tìm kiếm</label>

                                </h5>
                            </a>

                            <div class="row">
                                <div class="col-mobile col-sm-11 col-md-11 form-group">
                                    <input autocomplete="off" placeholder="Tên khách hàng, tên miền, tên dịch vụ, tên phần mềm"
                                           type='text' name="name"
                                           class="form-control"
                                           value=""/>

                                </div>
                                <div class="col-mobile col-sm-1 col-md-1 form-group">
                                    <button type="submit"class="btn btn-success search-schedule">search</button>
                                </div>
                            </div>
                            <div style="float: right" class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Tất cả dịch vụ
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Tên miền</a>
                                    <a class="dropdown-item" href="#">Hosting</a>
                                    <a class="dropdown-item" href="#">VPS</a>
                                    <a class="dropdown-item" href="#">Website</a>
                                    <a class="dropdown-item" href="#">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </h4>
                {{--                </div>--}}
            </form>
        </div>
        <div class="panel panel-default">

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="table_header">
                        <th class="thstyleform">STT</th>
                        <th class="thstyleform">Tên Khách hàng</th>
                        <th class="thstyleform">Tên dịch vụ</th>
                        <th class="thstyleform">Giao dịch</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt=1?>
                    @forelse($register_services as $register_service)
                        <tr>
                            <td class="thstyleform">{{$stt++}}</td>
                            <td class="thstyleform">{{$register_service->customer_name}}
                                <p class="pstyleform1">{{$register_service->customer_email}}</p></td>
                            <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                                <p class="pstyleform1">{{$register_service->address_domain}}</p></td>
                            <td class="thstyleform">
                                <button id="btnStatus" type="button" class="btn btn-primary"
                                        data-id="{{$register_service->id}}"
                                        data-transaction="{{$register_service->transaction}}"
                                        data-toggle="modal" data-target="#myModal"> {{ucfirst(array_search($register_service->transaction,$transaction_services))}}</button>
                            </td>

                        </tr>
                    @empty

                    @endforelse
{{--cập nhật tình trạng --}}
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Cập nhật trạng thái</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{route('admin.order.updatetservices')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="form-group">

                                            <select
                                                class="form-control" name="transaction" id="transaction">
                                                @foreach($transaction_services as $transaction)
                                                    <option value="" selected disabled hidden>Cập nhật giao dịch</option>
                                                    <option  value="{{$transaction}}"
                                                             @if($register_service->id && $transaction==$register_service->transaction) selected @endif>
                                                        {{ucfirst(array_search($transaction,$transaction_services))}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button style="background: green;color: white;" type="submit" class="btn btn-default">Save</button>
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </tbody>
                </table>
                <div class="text-right">
                    {{ $register_services->links() }}
                </div>
            </div>
        </div>
        <p id="test"></p>
    </div>

    <script>
        {{--$(document).ready(function () {--}}
        {{--    fetch_customer_data();--}}
        {{--    function fetch_customer_data(query = '') {--}}
        {{--        $.ajax({--}}
        {{--            url: "{{ route('admin.order.searchservices') }}",--}}
        {{--            method: 'GET',--}}
        {{--            data: {query: query},--}}
        {{--            dataType: 'json',--}}
        {{--            success: function (data) {--}}
        {{--                $('tbody').html(data.table_data);--}}
        {{--                $('#total_records').text(data.total_data);--}}
        {{--            }--}}
        {{--        })--}}
        {{--    }--}}

        {{--    $(document).on('keyup', '#search', function () {--}}
        {{--        var query = $(this).val();--}}
        {{--        fetch_customer_data(query);--}}
        {{--    });--}}
        {{--});--}}

        //update transaction
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var transaction = button.data('transaction')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #transaction option:selected').text();
            modal.find('.modal-body #id').val(id);
        })
    </script>


@stop


