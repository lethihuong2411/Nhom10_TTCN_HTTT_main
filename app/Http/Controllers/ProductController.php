<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\ProductRepository
     */
    protected $repository;


    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $products = $this->repository->getAll();
        $product = $this->repository->search($request);
        return view('layout_admin.product.products_list', compact('products', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = $this->repository->getTypeAll();
        return view('layout_admin.product.products_create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try{
            return $this->repository->create($request);
        }catch(Exception $e){
            return back()->withError("Lỗi hệ thống! Chưa chọn loại sách")->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->getproduct($id);
        $type = $this->repository->getTypeAll();
        return view('layout_admin.product.products_edit', compact('type', 'product'));
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
        $this->validate(
            $request,
            [
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                'img' => 'mimes:jpg,jpeg,png,gif|max:10048|',
                'name' => 'required|max:255|regex:/(^[\pL0-9 ]+$)/u',
                'publisher' => 'required|regex:/(^[\pL0-9 ]+$)/u',
                'unit_price' => 'required',


                'img' => 'mimes:jpg,jpeg,png,gif|max:10048',
                'description' => 'required'
            ],
            [
                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                'name.regex' => 'Tên sách không được phép có ký tự đặc biệt',
                'name.required' => 'Vui lòng nhập tên sách',
                'name.max' => 'Không vượt quá 255 ký tự',

                'publisher.required' => 'Vui lòng nhập nhà sản xuất',
                'publisher.regex' => 'Tên tác giả không được phép có ký tự đặc biệt',
                'unit_price.required' => 'Vui lòng nhập giá sản phẩm',

                'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'img.max' => 'Hình thẻ giới hạn dung lượng không quá 10M',

                'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            ]
        );
        $this->repository->update($request, $id);
        return redirect()->back()->with('thongbao','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $this->repository->destroy($product);
        return redirect()->back();
    }
    public function getSell($id)
    {
        $on = Product::find($id);
        $on->status = Product::statusOn;
        $on->save();
        return json_encode((object) ['on' => $on]);
    }

    public function getStopSell($id)
    {
        $off = Product::find($id);
        $off->status = Product::statusOff;
        $off->save();
        return json_encode((object) ['off' => $off]);
    }
}
