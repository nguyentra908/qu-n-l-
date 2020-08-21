<?php

namespace App\Http\Controllers\Admin;

use App\Business\RegisterServicesLogic;
use App\Business\InvoiceLogic;
use App\Business\RegisterSoftLogic;
use App\Model\ConstantsModel;
use App\Model\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class InvoiceController extends AdminController
{
    //
    public function index(Request $request){
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;

        return view('admin.invoice.index', compact('register_services','status'));
    }
    public function show(Request $request)
    {
        $logic_register_services = new  RegisterServicesLogic();
        $register_service = $logic_register_services->getIndexRegisterServices($request->id);

        $customer_name = $register_service->customer_name;

        return view('admin.invoice.show', compact('register_service', 'customer_name'));
    }
    public function invoiceservices(Request $request){
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->getListRegisterServices();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;

        return view('admin.invoice.index', compact('register_services','status'));
    }
    public function invoicesoft(Request $request){
        $logic_register_services = new RegisterSoftLogic();
        $register_services = $logic_register_services->getlistregistersoft();
//        $invoices = Invoice::paginate(Config::get('constants.pagination'));
        $status = ConstantsModel::INVOICE;

        return view('admin.invoice.index', compact('register_services','status'));
    }

    public function receipts(Request $request)
    {
        $transaction_soft = ConstantsModel::TRANSACTION_SERVICES;
        $logic_register_soft=new RegisterSoftLogic();
        $register_softs=$logic_register_soft->getlistregisteredsoft($request);
        $logic_register_services = new RegisterServicesLogic();
        $register_services = $logic_register_services->Search($request);
        return view('admin.invoice.receipts', compact('register_services','register_softs','transaction_soft'));
    }

    public function invocereceipt(Request $request)
    {
        $logic_register_services = new  RegisterServicesLogic();
        $register_service = $logic_register_services->getIndexRegisterServices($request->id);
        $customer_name = $register_service->customer_name;
        return view('admin.invoice.invoice-receipt', compact('register_service', 'customer_name'));
    }

    public function payment(Request $request)
    {
        return view('admin.invoice.payment');
    }


}
