<?php


namespace App\Business;

use Illuminate\Http\Request;
use App\Model\Customer;
use App\Model\RegisterService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RegisterServicesLogic extends BaseLogic
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return RegisterService::class;
    }


    public function Search(Request $request)
    {
         $query = $this->model
             ->join('customers as c', 'c.id', 'register_services.id_customer')
             ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
             ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
             ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
             ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
             ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
             ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
             ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                 'c.phone_number as phone',
                 'w.name as website_name', 'w.type_website as website_type',
                 's.name as ssl_name',
                 'e.name as email_name',
                 'v.name as vps_name',
                 'h.name as hosting_name',
                 'd.name as domain_name')
             ->where('register_services.transaction', '!=', "0")
             ->whereNull('register_services.deleted_at')
             ->whereNull('c.deleted_at')
             ->whereNull('d.deleted_at')
             ->whereNull('h.deleted_at')
             ->whereNull('v.deleted_at')
             ->whereNull('e.deleted_at')
             ->whereNull('s.deleted_at')
             ->whereNull('w.deleted_at');
        if ($request) {
            if (isset($request->name)) {
                $query->where('c.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('c.phone_number', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('w.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('s.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('e.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('v.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('h.name', 'LIKE', '%' . $request->name . '%');
                $query->orwhere('d.name', 'LIKE', '%' . $request->name . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }

    public function getListRegisterServices()
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                 'c.phone_number as phone',
                 'w.name as website_name', 'w.type_website as website_type',
                 's.name as ssl_name',
                 'e.name as email_name',
                 'v.name as vps_name',
                 'h.name as hosting_name',
                 'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at');
//        if ($search) {
//            if (isset($search->page) && is_numeric($search->page)) {
//                $query->offset($search->page * Config::get('constants.pagination'));
//            }
//        }
        //DESC GIẢM DÂN
        //ASC TĂNG DẦN
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }

    public function getIndexRegisterServices($register_id)
    {
        return $query = RegisterService::join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.address as address',
                 'w.name as website_name',
                 's.name as ssl_name',
                 'e.name as email_name',
                 'v.name as vps_name',
                 'h.name as hosting_name',
                 'd.name as domain_name',
                'h.price as hosting_price',
                'v.price as vps_price',
                'e.price as email_price',
                's.price as ssl_price',
                'w.price as website_price',
                'd.fee_register as domain_fee_register'


            )
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            //dựa theo id của registerservices để lấy thông tin
            ->where('register_services.id', $register_id)
            ->first();
    }

    public function getListRegisteredService()
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'w.name as website_name', 'w.type_website as website_type',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at')
            ->where('register_services.transaction', '!=', "0");
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }

    public function SearchServices(Request $request)
    {
        $query =   RegisterService::join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'w.name as website_name',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('w.deleted_at')
            ->whereNull('s.deleted_at');
        if ($request) {
            if (isset($request->name)) {
                $query->where('c.name', 'LIKE', '%' . $request->name . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }


    public function SearchSoftServices(Request $request)
    {
        $query = $this->model
            ->join('customers as c', 'c.id', 'register_services.id_customer')
            ->leftJoin('domains as d', 'd.id', 'register_services.id_domain')
            ->leftJoin('hostings as h', 'h.id', 'register_services.id_hosting')
            ->leftJoin('vpss as v', 'v.id', 'register_services.id_vps')
            ->leftJoin('emails as e', 'e.id', 'register_services.id_email')
            ->leftJoin('ssls as s', 's.id', 'register_services.id_ssl')
            ->leftJoin('websites as w', 'w.id', 'register_services.id_website')
            ->select('register_services.*', 'c.name as customer_name','c.email as customer_email',
                'c.phone_number as phone',
                'w.name as website_name', 'w.type_website as website_type',
                's.name as ssl_name',
                'e.name as email_name',
                'v.name as vps_name',
                'h.name as hosting_name',
                'd.name as domain_name')
            ->where('register_services.transaction', '!=', "0")
            ->whereNull('register_services.deleted_at')
            ->whereNull('c.deleted_at')
            ->whereNull('d.deleted_at')
            ->whereNull('h.deleted_at')
            ->whereNull('v.deleted_at')
            ->whereNull('e.deleted_at')
            ->whereNull('s.deleted_at')
            ->whereNull('w.deleted_at');

        if ($request) {
            if (isset($request->name)) {
                $query->where('c.name', 'LIKE', '%' . $request->name . '%');
            }
            if (isset($request->page) && is_numeric($request->page)) {
                $query->offset($request->page * Config::get('constants.pagination'));
            }
        }
        $query->orderBy('register_services.id', 'ASC');
        return $query->paginate(Config::get('constants.pagination'));
    }


}
