@extends('layout.master')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-weight: bold; font-family: 'roboto'; font-size: 230%;">Đăng ký phần mềm</h3>
                            <form action="{{route('admin.register_softs.store')}}" method="post">

                                <input type="hidden" name="id"
                                       value="{{isset($register_soft->id) ? $register_soft->id: ''}}">
                                @csrf
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
                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Khách hàng <span class="aster">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="id_customer">
                                                        @foreach($customer as $i)

                                                            <option value="{{$i->id}}"
                                                                    @if(isset($register_soft->id) && $register_soft->id_customer == $i->id)
                                                                    selected
                                                                @endif > {{$i->name}}-{{$i->email}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('id_customer'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('id_customer') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Nhân viên <span class="aster">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="id_staff">
                                                        @foreach($staff as $i)

                                                            <option value="{{$i->id}}"
                                                                    @if(isset($register_soft->id) && $register_soft->id_staff == $i->id)
                                                                    selected
                                                                @endif > {{$i->name}}-{{$i->email}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('id_staff'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('id_staff') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group ">
                                                    <label style="margin-top: 20px;" class="registerservice1">Gói phần mềm <span class="aster">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="id_software">
                                                        @foreach($software as $i)

                                                            <option value="{{$i->id}}"
                                                                    @if(isset($register_soft->id) && $register_soft->id_software == $i->id)
                                                                    selected
                                                                @endif > {{$i->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('id_software'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('id_software') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Loại phần mềm <span class="aster">*</span></label>
                                                    <select class="js-example-basic-single form-control" name="id_typesoftware">
                                                        @foreach($type_software as $i)

                                                            <option value="{{$i->id}}"
                                                                    @if(isset($register_soft->id) && $register_soft->id_typesoftware == $i->id)
                                                                    selected
                                                                @endif > {{$i->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('id_typesoftware'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('id_typesoftware') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Địa chỉ miền <span class="aster">*</span></label>
                                                    <input class="form-control" name="address_domain"
                                                           value="{{isset($register_soft->address_domain) ? old('address_domain', $register_soft->address_domain) : old('address_domain')}}">
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('address_domain'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('address_domain') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label style="margin-top: 20px;" class="registerservice1">Trạng thái <span class="aster">*</span></label>
                                                    <select class="form-control" name="status">
                                                        <option>Chọn trạng thái</option>
                                                        <option value="Chính thức"
                                                                @if(isset($register_soft->status)&&$register_soft->status=='Chính thức')
                                                                selected
                                                            @endif > Chính Thức</option>
                                                        <option value="Dùng thử"
                                                                @if(isset($register_soft->status)&&$register_soft->status=='Dùng thử')
                                                                selected
                                                            @endif > Dùng Thử</option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('status'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('status') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group ">
                                                    <label class="registerservice1">Ngày bắt đầu <span class="aster">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="start_date" name="start_date"
                                                               value="{{isset($register_soft->start_date) ?date('Y-m-d\TH:i', strtotime($register_soft->start_date)) : ''}}" type="text"/>
                                                        <div class="input-group-addon">
                                                        </div>
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
{{--                                                    <div class="input-group">--}}
{{--                                                        <input class="form-control" id="start_date" name="start_date"--}}
{{--                                                              value="{{isset($register_soft->start_date) ?--}}
{{--                                   date('Y-m-d\TH:i', strtotime($register_soft->start_date)) : ''}}" type="text"/>--}}
{{--                                                        <div class="input-group-addon">--}}
{{--                                                        </div>--}}
{{--                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
{{--                                                    </div>--}}

                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('start_date'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('start_date') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-xs-12 form-group">
                                                    <label class="registerservice1">Ngày kết thúc <span class="aster">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="end_date" name="end_date"
                                                               value="{{isset($register_soft->end_date) ?
                                   date('Y-m-d\TH:i', strtotime($register_soft->end_date)) : ''}}" type="text"/>
                                                        <div class="input-group-addon">
                                                        </div>
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
{{--                                                                                                        <div class="input-group">--}}
{{--                                                        <input class="form-control" id="end_date" name="end_date"--}}
{{--                                                               value="{{isset($register_soft->end_date) ?--}}
{{--                                   date('Y-m-d\TH:i', strtotime($register_soft->end_date)) : ''}}" type="text"/>--}}
{{--                                                        <div class="input-group-addon">--}}
{{--                                                        </div>--}}
{{--                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
{{--                                                    </div>--}}

                                                    <p class="help-block text-danger"></p>
                                                    @if($errors->has('end_date'))
                                                        <p class="help-block text-danger">
                                                            {{ $errors->first('end_date') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="col-xs-12 form-group">
                                                    <label class="registerservice1">Ghi Chú </label>
                                                    <textarea rows="5" type="text" class="form-control"
                                                              name="notes">{{isset($register_soft->notes) ? old('notes', $register_soft->notes) : old('notes')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-info">{{ __('general.save') }}</button>
                                        <a href="{{ route('admin.register_services.index') }}"
                                           class="btn btn-default">{{ __('general.back') }}</a>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $("#start_date").datepicker({
                format: 'dd-mm-yyyy ',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#end_date').datepicker('setStartDate', minDate);
            });

            $("#end_date").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#start_date').datepicker('setEndDate', minDate);
            });

            $('.js-example-basic-single').select2();
        });
    </script>
@stop

