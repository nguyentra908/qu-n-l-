<?php


namespace App\Http\Controllers\Admin;


use App\Business\OrderLogic;
use App\Business\RegisterServicesLogic;
use App\Business\RegisterSoftLogic;
use App\Model\ConstantsModel;
use App\Model\RegisterService;
use App\Model\RegisterSoft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class OrderController extends AdminController
{

    public function software()
    {
        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_soft = new RegisterSoftLogic();
        $register_soft = $logic_register_soft->getlistregistersoft();
        return view('admin.order.index_software',compact('transaction_soft','register_soft'));
    }
    public function searchsoftware(Request $request)
    {
        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_soft = new RegisterSoftLogic();
        $register_soft = $logic_register_soft->Searchsoft($request);
        return view('admin.order.index_software',compact('transaction_soft','register_soft'));


    }
    public function updatetssoft(Request $request)
    {
        $update = RegisterSoft::findOrFail($request->id);
        $update->update($request->all());
        return back();
    }
    public function services()
    {
        $transaction_services = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();
        return view('admin.order.index_services', compact('register_services','transaction_services'));
    }
    public function searchservices(Request $request)
    {
        $transaction_services = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->SearchServices($request);
        return view('admin.order.index_services', compact('register_services','transaction_services'));
    }
    public function updatetservices(Request $request)
    {
        $update = RegisterService::findOrFail($request->id);
        $update->update($request->all());
        return back();
    }

}
