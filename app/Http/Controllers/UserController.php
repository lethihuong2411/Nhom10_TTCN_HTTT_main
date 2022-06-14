<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePassRequest;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\GetSession;
use Exception;

class UserController extends Controller
{
    /**
     * The MemberRepository instance.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $repository;


    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\UserRepository $repository
     */
    public function __construct(UserRepository $repository)
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
        $company_id =  GetSession::getCompanyId();
        $username = Auth::user()->username;
        if ($company_id != '' && Auth::user()->id_role == 2) {
            $user = User::where('id_company', $company_id)
                ->where('username', $username)
                ->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($company_id != '' && $company_id != 0 && Auth::user()->id_role == 1) {
            $user = User::where('id_company', $company_id)
                ->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $user = User::where('id_role', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('layout_admin.user.list_users', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('layout_admin.user.create_users', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            return $this->repository->create($request);
        } catch (Exception $e) {
            return back()->withError("Lỗi hệ thống! Chưa chọn nhà xuất bản")->withInput();
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
        $user = $this->repository->getuser($id);
        return view('layout_admin.user.proflie', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangePassRequest $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function getRole($id)
    {
        $all_role = Role::all();
        $user = $this->repository->getuser($id);
        return view('layout_admin.user.role_users', compact('user', 'all_role'));
    }

    public function changeRole(Request $request, $id)
    {
        $this->validate($request, 
                [
                //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
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
                ]
            );
        $user = $this->repository->getuser($id);
        if($request->input('cate') != null) {
            $user->id_role = $request->input('cate');
        }        
        $user->full_name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->back()->with('thongbao', 'Cập nhật thành công');
    }
}
