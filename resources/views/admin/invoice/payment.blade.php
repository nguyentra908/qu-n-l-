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
    </div>@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Quản Lý Thu Chi</h3>
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
        <p>
            <a href="{{route('admin.invoices.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('general.list') }}
            </div>
            <div class="form-row">
                <div class="col-12">
                    <div class="card ">
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Customer Name</th>
                                    <th>Domain Name</th>
                                    <th>Hosting Name</th>
                                    <th>Vps Name</th>
                                    <th>Email Name</th>
                                    <th>Ssl Name</th>
                                    <th>Website Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Exist Date</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($register_services as $register_service)
                                    <tr>
                                        <td>{{$register_service->id}}</td>
                                        <td>{{$register_service->code}}</td>
                                        <td>{{$register_service->customer_name}}</td>
                                        <td>{{$register_service->domain_name}}</td>
                                        <td>{{$register_service->hosting_name}}</td>
                                        <td>{{$register_service->vps_name}}</td>
                                        <td>{{$register_service->email_name}}</td>
                                        <td>{{$register_service->ssl_name}}</td>
                                        <td>{{$register_service->website_name}}</td>
                                        <td>{{$register_service->start_date}}</td>
                                        <td>{{$register_service->end_date}}</td>
                                        <td>{{$register_service->exist_date}}</td>
                                        <td>{{$register_service->notes}}</td>
                                        <td>{{$register_service->status}}</td>

                                        <td>
                                            <a href="{{route('admin.invoices.show', $register_service->id)}}"
                                               class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                            <a href="{{route('admin.invoices.edit', [$register_service->id])}}"
                                               class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                            <form style="display: inline-block" action="{{route('admin.invoices.destroy', [$register_service->id])}}"
                                                  method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                            </form>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">{{ __('general.nodata') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="text-right">
                                {{--                    hien thi phan trang--}}
                                {{ $register_services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

<div class="receipts">
        <table width="650" cellpadding="7" cellspacing="0" style="page-break-before: always">
            <tr valign="top">
                <td width="300" style="float: left;font-size: 15px;">
                    <p>Đơn vị: CÔNG TY TNHH HI TECH THIÊN QUÂN</p>
                    <p>Địa chỉ: Lô 09, Tòa nhà 4S Riverside Garden, Đường số 17, Hiệp Bình Chánh, Thủ Đức, TPHCM</p>
                </td>
                <td width="300" >
                    <p>Ban hành theo Thông tư số 133/2016/TT-BTC ngày 26/8/2016 của Bộ Tài chính</p>
                </td>
            </tr>
        </table>
        <br>
        <table width="620" cellpadding="7" cellspacing="0">
            <tr valign="top">
                <td style="text-align: center;">
                    <b>PHIẾU CHI</b>
                    <br><br>
                    <p>Ngày....Tháng....Năm.......</p>
                </td>

            </tr>
        </table>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            H&#7885; v&agrave; t&ecirc;n ng&#432;&#7901;i n&#7897;p ti&#7873;n:	</p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            &#272;&#7883;a ch&#7881;:	</p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            L&yacute; do n&#7897;p:	</p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Số tiền:.............................. (Viết bằng chữ):..............................................................
        </p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
        </p>
        <p class="western" align="justify" style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 130%">
            Kèm theo:...............................................Chứng từ gốc:</p>
        <table width="621" cellpadding="7" cellspacing="0">

            <tr valign="top">
                <td width="137" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">
                        <br/>
                    </p>
                </td>
                <td width="106" style="border: none; padding: 0in"><p class="western" align="center" style="margin-top: 0.08in">

                </td>
                <td colspan="3" width="335" style="border: none; padding: 0in"><p class="western" align="right" style="margin-top: 0.08in">
                        <i>Ngày....tháng....năm...</i></p>
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


@stop
