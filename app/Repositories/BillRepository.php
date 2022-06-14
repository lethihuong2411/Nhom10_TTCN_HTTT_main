<?php

namespace App\Repositories;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Services\GetSession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BillRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {   
        return Bill::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getBillByCompany()
    {   
        $company_id = GetSession::getCompanyId();
        return BillDetail::select('bill_detail.id', 'bill_detail.id_bill', 'bill_detail.status', 'bills.phone', 'bills.email', 'bills.address', 'bills.date_order', 'users.full_name', 'product.image', 'product.name', 'bill_detail.quantity', 'product.unit_price')
                ->join('product', 'bill_detail.id_product', '=', 'product.id')
                ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                ->join('users', 'bills.id_user', '=', 'users.id')
                ->where('product.id_company', $company_id)
                ->orderBy('bill_detail.created_at', 'desc')->paginate(10);
    }
    public function getAllNotReceiving()
    {   
        $company_id = GetSession::getCompanyId();
        return BillDetail::select('bill_detail.id', 'bill_detail.id_bill', 'bill_detail.status', 'bills.phone', 'bills.email', 'bills.address', 'bills.date_order', 'users.full_name', 'product.image', 'product.name', 'bill_detail.quantity', 'product.unit_price')
                ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                ->join('product', 'bill_detail.id_product', '=', 'product.id')
                ->join('users', 'bills.id_user', '=', 'users.id')
                ->where('product.id_company', $company_id)
                ->where('bill_detail.status',0)
                ->orderBy('bill_detail.created_at', 'desc')
                ->paginate(10);
    }
    //
    public function getAllReceiving()
    {   
        $company_id = GetSession::getCompanyId();
        return BillDetail::select('bill_detail.id', 'bill_detail.id_bill', 'bill_detail.status', 'bills.phone', 'bills.email', 'bills.address', 'bills.date_order', 'users.full_name', 'product.image', 'product.name', 'bill_detail.quantity', 'product.unit_price')
                ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                ->join('product', 'bill_detail.id_product', '=', 'product.id')
                ->join('users', 'bills.id_user', '=', 'users.id')
                ->where('product.id_company', $company_id)
                ->where('bill_detail.status',1)
                ->orderBy('bill_detail.created_at', 'desc')
                ->paginate(10);
    }

    public function getAllComplete()
    {   
        $company_id = GetSession::getCompanyId();
        return BillDetail::select('bill_detail.id', 'bill_detail.id_bill', 'bill_detail.status', 'bills.phone', 'bills.email', 'bills.address', 'bills.date_order', 'users.full_name', 'product.image', 'product.name', 'bill_detail.quantity', 'product.unit_price')
                ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                ->join('product', 'bill_detail.id_product', '=', 'product.id')
                ->join('users', 'bills.id_user', '=', 'users.id')
                ->where('product.id_company', $company_id)
                ->where('bill_detail.status',2)
                ->orderBy('bill_detail.created_at', 'desc')
                ->paginate(10);
    }

    public function getAllFail()
    {  
        $company_id = GetSession::getCompanyId();
        return BillDetail::select('bill_detail.id', 'bill_detail.id_bill', 'bill_detail.status', 'bills.phone', 'bills.email', 'bills.address', 'bills.date_order', 'users.full_name', 'product.image', 'product.name', 'bill_detail.quantity', 'product.unit_price')
                ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                ->join('product', 'bill_detail.id_product', '=', 'product.id')
                ->join('users', 'bills.id_user', '=', 'users.id')
                ->where('product.id_company', $company_id)
                ->where('bill_detail.status',3)
                ->orderBy('bill_detail.created_at', 'desc')
                ->paginate(10);
    }

     

    public function getbill($id)
    {
        return BillDetail::find($id);
    }
    
    public function create(Request $request)
    {

       
    }

    public function update($request, $id) {

        
    }

    public function destroy($id) {
       $user = BillDetail::find($id);
       $user->delete();
      
    }

    public function search($request) {

       
    }

}