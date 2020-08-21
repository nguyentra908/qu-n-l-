@extends('layout.master')
@section('content')
    <div class="content">
        <h3 class="page-title" style="font-weight: bold;  font-size: 250%;">Quản Lý Nhân Viên</h3>
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
            <a href="{{route('admin.staffs.create')}}" class="btn btn-success">{{ __('general.create') }}</a>
        </p>
        {{--search--}}
        <div class="panel panel-default">
            <form method="post" class="search_frm" action="">
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
                                           placeholder="Tên nhân viên"
                                           type='text' name="name"
                                           class="form-control"
                                           value=""/>

                                </div>
                                <div class="col-mobile col-sm-1 col-md-1 form-group">
                                    <button type="submit" class="btn btn-success search-schedule">search</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </h4>
                {{--                </div>--}}
            </form>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #17a2b8; color: white; ">
                        <th style="text-align: center; ">ID</th>
{{--                        <th style="text-align: center; ">CODE</th>--}}
                        <th style="text-align: center;">Tên </th>
                        <th style="text-align: center; ">Địa chỉ</th>
                        <th style="text-align: center; ">Email</th>
                        <th style="text-align: center; ">Ngày sinh</th>
                        <th style="text-align: center; ">Số điện thoại</th>


                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($staffs as $staff)
                        <tr>
                            <td>{{$staff->id}}</td>
{{--                            <td>{{$staff->code}}</td>--}}
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->address}}</td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->birthday}}</td>
                            <td>{{$staff->phone_number}}</td>

                            <td>
                                <a href="{{route('admin.staffs.show', $staff->id)}}"
                                   class="btn btn-xs btn-info">{{ __('general.view') }}</a>
                                <a href="{{route('admin.staffs.edit', [$staff->id])}}"
                                   class="btn btn-xs btn-success">{{ __('general.edit') }}</a>
                                <form style="display: inline-block" action="{{route('admin.staffs.destroy', [$staff->id])}}"
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
                    {{ $staffs->links() }}
                </div>
            </div>
        </div>
    </div>

@stop
