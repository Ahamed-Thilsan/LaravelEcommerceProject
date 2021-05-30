<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function addProvince(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            foreach($data['province_name'] as $key =>$val){
                if(!empty($val)){
                    $bus = new Province;
                    $bus->province_name=$val;
                    $bus->status=$data['status'];
                    $bus->save();
                }
            }
            return redirect('/view-province')->with('flash_message_success',' Province has been Added Successfully!');
        }
        return view('province.add');
    }

    public function viewProvince(){
        $provinces = Province::orderBy('id','DESC')->get();
        return view('province.view')->with(compact('provinces'));
    }

    public function editProvince(Request $request, $id=null) {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $validatedata = $request->validate([
                'province_name'=>'required'
            ]);

            Province::where('id', $id)->update(['province_name'=>$data['province_name'],'status'=>$data['status']]);
            return redirect('/view-province')->with('flash_message_success',' Province has been Edited Successfully!');
        }
        $edit_province = Province::where(['id'=>$id])->first();
        return view('province.edit')->with(compact('edit_province'));
    }
}
