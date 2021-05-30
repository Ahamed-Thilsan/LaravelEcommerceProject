<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\District;
use App\Models\Province;
use Whoops\Run;

class TownController extends Controller
{
    public function addTown(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['town_name'] as $key =>$val){
                if(!empty($val)){
                    $towns = new Town;
                    $towns->district_id=$data['district_id'];
                    $towns->town_code = $data['town_code'][$key];
                    $towns->status = $data['status'][$key];
                    $towns->town_name = $val;
                    $towns->save();
                }
            }
            return redirect('/view-town')->with('flash_message_success',' Town has been Added Successfully!');
        }
        $dis = District::get();
        return view('town.add')->with(compact('dis'));
    }

    public function viewTown(){
        $towns = Town::with('provinces','districts')->get();
    
        $towns = Town::orderBy('id','DESC')->get();
        $dis = District::get();
        return view('town.view')->with(compact('towns','dis'));
    }
    public function editTown(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            Town::where('id', $id)->update(['district_id'=>$data['district_id'],'town_name'=>$data['town_name'],'status'=>$data['status']]);
            return redirect('/view-town')->with('flash_message_success',' Town has been Edited Successfully!');
        }
        $edit_town = Town::where(['id'=>$id])->first();

        $pro = Province::get();
        $province_dropdown ="<option selected disabled>Select</option>";
            foreach($pro as $cat){
                if($cat->id==$edit_town->province_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $province_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->province_name."</option>";
            }
            $dis = District::get();
            $district_dropdown ="<option selected disabled>Select</option>";
                foreach($dis as $cat){
                    if($cat->id==$edit_town->district_id)
                    {
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    $district_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->district_name."</option>";
                }
        return view('town.edit')->with(compact('edit_town','pro','province_dropdown','district_dropdown','dis'));
    }
}
