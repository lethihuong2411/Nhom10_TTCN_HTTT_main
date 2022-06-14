<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Models\Company;
use App\Http\Requests\CompaniesRequest;

class CompanyController extends Controller
{
  /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\CompanyRepository
     */
    protected $repository;


   /**
    * Create a new PostController instance.
    *
    * @param  \App\Repositories\CompanyRepository $repository
    */
   public function __construct(CompanyRepository $repository)
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
        $company = $this->repository->getAll();
        $companies = $this->repository->search($request);
        return view('layout_admin.companies.companies_list', compact('companies', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.companies.companies_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompaniesRequest $request)
    {
        $this->repository->create($request);
        return redirect(route('companies.index'));
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
        $companies = $this->repository->getcompanies($id);
        return view('layout_admin.companies.companies_edit', compact('companies'));
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
        $this->validate($request, 
                [
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                'img' => 'mimes:jpg,jpeg,png,gif|max:10048|',
                'name' => 'required|max:255|regex:/(^[\pL0-9 ]+$)/u',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|digits:10',
                ],          
                [
                //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                'name.required' => 'Bạn chưa nhập tên',
                'name.regex' => 'Tên nhà xuất bản không được phép có ký tự đặc biệt',
                'name.max' => 'Không vượt quá 255 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.digits' => 'Điện thoại chỉ có 10 số',
                'phone.numeric' => 'Điện thoại chỉ được nhập số',
    
                'img.required' => 'Vui lòng chọn ảnh',
                'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'img.max' => 'Hình thẻ giới hạn dung lượng không quá 10M',
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
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->back();
    }

}
