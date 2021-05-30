<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
class SiteController extends Controller
{
    public function addSite(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            foreach($data['site_name'] as $key =>$val){
                if(!empty($val)){
                    $bus = new Site;
                    $bus->site_name=$val;
                    $bus->status=$data['status'];
                    $bus->save();
                }
            }
            return redirect('/view-site')->with('flash_message_success',' Site has been Added Successfully!');
        }
        return view('site.add');
    }

    public function viewSite(){
        $sites = Site::orderBy('id','DESC')->get();
        return view('site.view')->with(compact('sites'));
    }
    public function editSite(Request $request,$id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            Site::where('id', $id)->update(['site_name'=>$data['site_name'],'status'=>$data['status']]);
            return redirect('/view-site')->with('flash_message_success',' Site has been Edited Successfully!');
        }
        $edit_site = Site::where(['id'=>$id])->first();
        return view('site.edit')->with(compact('edit_site'));
    }
}
