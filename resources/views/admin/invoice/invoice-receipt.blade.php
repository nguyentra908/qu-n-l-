
@extends('layout.master')
@section('css')
    <style>
        .receipts{
            margin-left: 20%;
            width: 707px;
            text-align: center;
            margin-top: 10px;
            padding: 10px 25px;
        }
    </style>
@stop
@section('content')
    <div class="content">
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
    </div>

    <div class="panel panel-default">
        <div id="color1" class="card abcdef">
            <!-- Card header -->
            <div class="card-header" role="tab" id="heading79">
    <div class="receipts">
        <table width="650" cellpadding="7" cellspacing="0" style="page-break-before: always">
            <tr valign="top">
                <td width="150" style="float: left;font-size: 10px;">
                    <label>CÔNG TY TNHH HI TECH THIÊN QUÂN</label>
                    <p>Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</p>
                </td>
                <td width="280" style="text-align:center;font-size: 15px;">
                    <label>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</label>
                    <p>Độc lập - Tự do - Hạnh phúc</p>
                </td>
                <td width="180"style="font-size: 10px;" >
                    <p>Ban hành theo Thông tư số 133/2016/TT-BTC ngày 26/8/2016 của Bộ Tài chính</p>
                </td>
            </tr>
        </table>
     
        <table width="620" cellpadding="7" cellspacing="0">
            <tr valign="top">
                <td style="text-align: center;">
                    <b>BIÊN LAI THU TIỀN</b>
                    <br>
                    <p>Ngày {{date("d")}} Tháng {{date("m")}} Năm {{date("Y")}}</p>
                </td>

            </tr>
        </table>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Họ, tên người nộp tiền: <label>{{ $customer_name }}</label></p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Địa chỉ: <label>{{ $register_service->address }}</label></p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Lý do nộp: <strong>tiền mua dịch vụ (phần mềm) từ {{$register_service->start_date}} đến ngày {{$register_service->end_date}}</strong></p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Số tiền thu:
            <label>{{$register_service->domain_price}}
                {{$register_service->hosting_price}}
                {{$register_service->vps_price}}
                {{$register_service->email_price}}
                {{$register_service->ssl_price}}
                {{$register_service->website_price}}VNĐ</label>
            </p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Viết bằng chữ:
            <label></label>
        </p>
            <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            </p>
{{--            <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">--}}
{{--                Kèm theo:...............................................Chứng từ gốc:</p>--}}
            <table width="621" cellpadding="7" cellspacing="0">

                <tr valign="top">
                    <td width="137" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <br/>
                        </p>
                    </td>
                    <td width="106" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">

                    </td>
                    <td colspan="3" width="335" style="border: none; padding: 0in"><p class="western" align="right" style="margin-top: 0.08in">
{{--                            <i>Ngày....tháng....năm...</i></p>--}}
                    </td>
                </tr>
                <tr valign="top">
                    <td width="137" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <b>Giám đốc<br/></b><i>(Ký, họ tên, đóng dấu)</i></p>
                    </td>
                    <td width="106" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <b>Kế toán trưởng<br/></b><i>(Ký, họ tên)</i></p>
                    </td>
                    <td width="98" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <b>Người nộp tiền<br/></b><i>(Ký, họ tên)</i></p>
                    </td>
                    <td width="106" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <b>Người lập phiếu<br/></b><i>(Ký, họ tên)</i></p>
                    </td>
                    <td width="103" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                            <b>Thủ quỹ<br/></b><i>(Ký, họ tên)</i></p>
                    </td>
                </tr>
            </table>
            <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
                Đã nhận đủ số tiền (viết bằng chữ):</p>
            <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
                + Tỷ giá ngoại tệ:	</p>
            <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
                + Số tiền quy đổi:	</p>
            <p class="western" style="margin-bottom: 0in; line-height: 100%">(Liên gửi ra ngoài phải đóng dấu)</p>
        </div>
    </div>
        </div>
    </div>

    @stop





    {{--@extends('layout.master')--}}

{{--@section('content')--}}



{{--    <section class="content">--}}
{{--        <div class="">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">Thông Tin Dịch Vụ</h3>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <table class="table table-bordered table-striped">--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <td>{{ $register_service->id }}</td>--}}

{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Code</th>--}}
{{--                                    <td>{{ $register_service->code }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>Customer Name</th>--}}
{{--                                    <td>{{ $customer_name }}</td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <th>Service Name</th>--}}
{{--                                    <td>{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Start Date</th>--}}
{{--                                    <td>{{ $register_service->start_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>End Date</th>--}}
{{--                                    <td>{{ $register_service->end_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Exist Date</th>--}}
{{--                                    <td>{{ $register_service->exist_date }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <th>Notes</th>--}}
{{--                                    <td>{{ $register_service->notes }}</td>--}}
{{--                                </tr>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}

{{--                    <a href="{{ route('admin.register_services.index') }}" class="btn btn-default">{{ __('general.back') }}</a>--}}


{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--        </div>--}}
{{--        <!-- /.container-fluid -->--}}
{{--    </section>--}}

{{--@stop--}}
