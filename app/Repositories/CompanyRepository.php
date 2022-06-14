<?php

namespace App\Repositories;

use App\Models\Company;
use App\Services\GetSession;
use Illuminate\Http\Request;

class CompanyRepository
{
    /**
     * Get member collection paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {   
        $company_id= GetSession::getCompanyId();
        if ($company_id > 0) 
        {
            $company = Company::where('id', $company_id)->get();
        }
        else
        {
            $company = Company::orderBy('created_at', 'desc')->paginate(10);
        }
        return $company;
    }

    public function getcompanies($id)
    {
        return Company::find($id);
    }

    public function create(Request $request)
    {

        $image="";
        if($request->hasfile('img'))
        {
             $file = $request->file('img');
             $image = time().'_'.$file->getClientOriginalName();
             $destinationPath=public_path('images/companies');
             $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image        
        }
       $companies = new Company();
       $companies->name=$request->input('name');
       $companies->email=$request->input('email');
       $companies->address=$request->input('address');
       $companies->phone_number=$request->input('phone');
       $companies->image= $image;
       $companies->save();
       
    }

    public function update($request, $id) {
        $image="";
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $image=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images/companies'); //project\public\image\cars, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $image); //lưu hình ảnh vào thư mục public/image
        }

        $companies = Company::find($id);
        $companies->name=$companies->name;
        $companies->email=$request->input('email');
        $companies->address=$request->input('address');
        $companies->phone_number=$request->input('phone');
        if($image ==""){
            $image=$companies->image;
        }
        $companies->image = $image;
        $companies->save();
        
    }

    public function destroy($id) {
        $companies = Company::find($id);
        $companies->delete();
      
    }

    public function search($request) {

        $search = $request->table_search;
        return Company::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('phone_number', 'like', "%$search%");
            })->paginate(10);
    }


}
