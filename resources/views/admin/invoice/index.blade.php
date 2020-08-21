@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title">Quản Lý Thu</h3>
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
                        <th class="thstyleform">STT</th>
                        <th class="thstyleform">Tên Khách hàng</th>
                        <th class="thstyleform">Tên dịch vụ</th>
                        <th class="thstyleform">Ngày Bắt Đầu<p class="pstyleform1">Ngày Kết Thúc</p></th>
                        <th class="thstyleform">Trạng thái</th>
                        <th class="thstyleform">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1?>
                    @forelse($register_services as $register_service)
                        <tr>
                            <td class="thstyleform">{{$stt++}}</td>
                            <td class="thstyleform">{{$register_service->customer_name}}
                                <p class="pstyleform1">{{$register_service->customer_email}}</p></td>
                            <td class="thstyleform">{{$register_service->domain_name}}{{$register_service->hosting_name}}{{$register_service->vps_name}}{{$register_service->email_name}}{{$register_service->ssl_name}}{{$register_service->website_name}}
                                <p class="pstyleform1">{{$register_service->address_domain}}</p></td>

                            <td class="thstyleform">{{$register_service->start_date}}
                                <p class="pstyleform1">{{$register_service->end_date}}</p></td>

                            <td class="thstyleform" @if($register_service->status=='Quá hạn') style="color: red; "
                                @else @if($register_service->status=='Đang hoạt động') style=""
                                @else style="color: #0040FF" @endif @endif>{{$register_service->status}}

                            </td>
                            <td class="thstyleform">
                                <a href="{{route('admin.register_services.show', $register_service->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                            </td>

                        </tr>
                    @empty
                    @endforelse
                    @forelse($register_softs as $register_soft)
                        <tr>
                            <td class="thstyleform">{{$register_soft->id}}</td>
                            <td class="thstyleform">{{$register_soft->customer_name}}
                                <p class="pstyleform1">{{$register_soft->customer_email}}</p>
                            </td>
                            <td class="thstyleform">{{$register_soft->software}}</td>
                            <td class="thstyleform">{{$register_soft->start_date}}
                                <p class="pstyleform1">{{$register_soft->end_date}}</p></td>
                            @if($register_soft->end_date<now())
                                <td class="thstyleform" style="color: red">Quá hạn</td>
                            @else
                                <td class="thstyleform">Đang hoạt động</td>
                            @endif
                            <td class="thstyleform">
                                <a href="{{route('admin.register_softs.show', $register_soft->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                            </td>

                        </tr>
                    @empty
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
