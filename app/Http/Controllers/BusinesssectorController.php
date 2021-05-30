<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSector;

class BusinesssectorController extends Controller
{
    public function addBusinessSector(Request $request){

        if($request->isMethod('post')){
            $data=$request->all();
            
            $validatedata = $request->validate([
                'sector_name'=>'required',
                'status'=>'required'   
            ]);
            foreach($data['sector_name'] as $key =>$val){
                if(!empty($val)){
                  
                    $bus = new BusinessSector;
                    $bus->sector_name=$val;
                    $bus->status=$data['status'];
                    $bus->save();
                }
            }
            return redirect('/')->with('flash_message_success',' Business Sector has been Added Successfully!');
        }
        return view('business_sector.add');
    }

    public function viewBusinessSector(){
        $Sector = BusinessSector::orderBy('id','DESC')->get();
        return view('business_sector.view')->with(compact('Sector'));
    }

    public function editBusinessSector(Request $request, $id = null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            
            $validatedata = $request->validate([
                'sector_name'=>'required'
            ]);

            BusinessSector::where('id', $id)->update(['sector_name'=>$data['sector_name'],'status'=>$data['status']]);
            return redirect('/')->with('flash_message_success',' Business Sector has been Edited Successfully!');
        }
        $edit_sector = BusinessSector::where(['id'=>$id])->first();
        //echo"<pre>"; print_r($edit_sector);die;
        
        return view('business_sector.edit')->with(compact('edit_sector'));;
    }

}
