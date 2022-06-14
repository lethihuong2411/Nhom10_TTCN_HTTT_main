<?php

namespace App\Repositories;

use App\Models\Store;
use App\Services\GetSession;
use Illuminate\Http\Request;

class StoreRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        $company_id = GetSession::getCompanyId();
        return Store::join('product', 'store.id_product', '=', 'product.id')
                ->where('product.id_company', $company_id)
                ->get();
    }

    public function create(Request $request)
    {
    }

    public function update($request)
    {
        $store = Store::find($request->id);
        $store->all_product_in_store += $request->input('total');
        $store->stored_product += $request->input('total');
        $store->save();
        return json_encode((object) ['store' => $store]);
    }

    public function destroy($id)
    {
        
    }
}
