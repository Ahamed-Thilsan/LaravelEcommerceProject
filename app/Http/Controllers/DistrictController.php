<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class DistrictController extends Controller
{
    public function addDistrict(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['district_name'] as $key =>$val){
                if(!empty($val)){
                    $dis = new District;
                    $dis->province_id=$data['province_id'];
                    $dis->status=$data['status'];
                    $dis->district_name = $val;
                    $dis->save();
                }
            }
            return redirect('/view-district/')->with('flash_message_success',' District has been Added Successfully!');
        }
        $pro = Province::get();
        return view('District.add')->with(compact('pro'));
    }
    public function viewDistrict(){

        $dis = District::with('province')->get();
        $dis = District::orderBy('id','DESC')->get();
        $pro = Province::get();
        return view('District.view')->with(compact('dis','pro'));
    }

    public function editDistrict(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            $validatedata = $request->validate([
                'district_name'=>'required'
            ]);

            District::where('id', $id)->update(['province_id'=>$data['province_id'],'district_name'=>$data['district_name'],'status'=>$data['status']]);
            return redirect('/view-district')->with('flash_message_success',' District has been Edited Successfully!');
        }
        $edit_district = District::where(['id'=>$id])->first();
        $pro = Province::get();
            $categories_dropdown ="<option selected disabled>Select</option>";
            foreach($pro as $cat){
                if($cat->id==$edit_district->province_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->province_name."</option>";
            }
        return view('District.edit')->with(compact('categories_dropdown','edit_district','pro'));
    }
}
