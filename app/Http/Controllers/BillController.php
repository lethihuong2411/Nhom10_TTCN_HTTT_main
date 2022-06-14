<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BillRepository;
use App\Models\Bill;
use App\Models\Store;
use App\Models\BillDetail;
use App\Services\GetSession;

class BillController extends Controller
{  /**
    * The ProductRepository instance.
    *
    * @var \App\Repositories\BillRepository
    */
   protected $repository;


  /**
   * Create a new PostController instance.
   *
   * @param  \App\Repositories\BillRepository $repository
   */
  public function __construct(BillRepository $repository)
  {
      $this->repository = $repository;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_all = $this->repository->getAll();
        $bill = $this->repository->getBillByCompany();
        
        return view('layout_admin.bookbill.list_bill',compact('bill'));
    }
    public function NotReceived()
    {
        $bill = $this->repository-> getAllNotReceiving();
        return view('layout_admin.bookbill.order_not_received',compact('bill'));
    }
    public function  Received()
    {
        $bill = $this->repository-> getAllReceiving();
        return view('layout_admin.bookbill.order_received',compact('bill'));
    }

    public function Complete()
    {
        $bill = $this->repository-> getAllComplete();
        return view('layout_admin.bookbill.order_complete',compact('bill'));
    }

    public function Fails()
    {
        $bill = $this->repository-> getAllFail();
        return view('layout_admin.bookbill.order_fail',compact('bill'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('layout_admin.bookbill.detail_bill');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getProcessing($id){
        $quantity = BillDetail::where('id', $id)
                    ->value('quantity');
        $id_product = BillDetail::where('id', $id)
                    ->value('id_product');
        $id_store = Store::where('id_product', $id_product)
                    ->value('id');

        $store = Store::find($id_store);
        $xl = BillDetail::find($id);

        $store->stored_product = $store->stored_product - $quantity;
        $store->sold_product = $store->sold_product + $quantity;
        $xl->status = BillDetail::processing;
        $store->save();
        $xl->save();
        return redirect()->back();
    }

    public function getReceiving($id){
        $tn = BillDetail::find($id);
        $tn->status = BillDetail::receiving;
        $tn->save();
        return redirect()->back();
    }

    public function getDelivered($id){
        $dg = BillDetail::find($id);
        $dg->status = BillDetail::delivered;
        $dg->save();
        return redirect()->back();
    }
    public function getFail($id){
        $quantity = BillDetail::where('id', $id)
                    ->value('quantity');
        $id_product = BillDetail::where('id', $id)
                    ->value('id_product');
        $id_store = Store::where('id_product', $id_product)
                    ->value('id');
        $store = Store::find($id_store);
        $tb = BillDetail::find($id);
        $store->stored_product = $store->stored_product + $quantity;
        $store->sold_product = $store->sold_product - $quantity;
        $tb->status = BillDetail::fail;
        $store->save();
        $tb->save();
        return redirect()->back();
    }
}