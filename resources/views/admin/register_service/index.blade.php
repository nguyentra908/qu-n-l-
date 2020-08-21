@inject('request', 'Illuminate\Http\Request')
@extends('layout.master')
@section('content')
    <div class="content">
        <h1 class="titleheader">Danh sách đăng ký</h1>
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

        {{--search--}}
        <div class="panel panel-default">
            <form method="post" class="search_frm" action="{{route('admin.register_services.search')}}">
                @csrf
                <h4 class="panel-title">
                    <div id="color1" class="card abcdef">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="heading79">

                            <!-- Heading -->
                            <a class="collapsed bar-search" role="button" data-toggle="collapse"
                               data-parent="#accordion"
                               href="#addstudent" aria-expanded="false" aria-controls="schedule">
                                <h5 class="mt-1 mb-0">
                                    <label class="registerservice">Tìm kiếm</label>

                                </h5>
                            </a>

                            <div class="row">
                                <div class="col-mobile col-sm-11 col-md-11 form-group">
                                    <input autocomplete="off"
                                           placeholder="Tên khách hàng, tên miền, tên dịch vụ, tên phần mềm"
                                           type='text' name="name"
                                           class="form-control"
                                           value=""/>

                                </div>
                                <div class="col-mobile col-sm-1 col-md-1 form-group">
                                    <button type="submit" class="btn btn-success search-schedule">search</button>
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
                                    <a class="dropdown-item" href="#">Phần mềm</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </h4>
                {{--                </div>--}}
            </form>
        </div>
        {{--end search--}}
        <div class="panel panel-default">
            <div class="card">
                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="table_header">
                            <th class="thstyleform">id</th>
                            <th class="thstyleform">Tên Khách hàng</th>
                            <th class="thstyleform">Tên dịch vụ</th>
                            <th class="thstyleform">Ngày Bắt Đầu<p class="pstyleform1">Ngày Kết Thúc</p></th>
                            <th class="thstyleform">Trạng thái</th>
                            <th class="thstyleform">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>


                        @forelse($register_services as $register_service)
                            <tr>
                                <td class="thstyleform">{{$register_service->id}}</td>
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
                                    <a href="{{route('admin.register_services.edit', [$register_service->id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block"
                                          action="{{route('admin.register_services.destroy', [$register_service->id])}}"
                                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                    </form>
                                    @if($register_service->status == 'Quá hạn')
                                        <a href="{{route('admin.register_services.extend', $register_service->id)}}
                                            " class="btn btn-xs btn-info">Gia hạn</a>
                                    @endif
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
                                    <a href="{{route('admin.register_softs.edit', [$register_soft->id])}}"
                                       class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                    <form style="display: inline-block"
                                          action="{{route('admin.register_softs.destroy', [$register_soft->id])}}"
                                          method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-xs btn-danger">{{ __('general.delete') }}</button>
                                    </form>
                                    @if($register_soft->end_date<now())
                                        <a href="{{route('admin.register_softs.extend', $register_soft->id)}}
                                            " class="btn btn-xs btn-info">Gia hạn</a>

                                    @endif

                                </td>

                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    <div class="text-right">

                        {{$register_services->links(),$register_softs->links()}}



                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>

@stop
