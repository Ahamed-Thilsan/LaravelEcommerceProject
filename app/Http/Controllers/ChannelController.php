<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\BusinessSector;

class ChannelController extends Controller
{
    public function addChannel(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            
            foreach($data['channel_name'] as $key =>$val){
                if(!empty($val)){
                    $chan = new Channel;
                    $chan->sector_id=$data['sector_id'];
                    $chan->status=$data['status'];
                    $chan->channel_name = $val;
                    $chan->save();
                }
            }
            return redirect('/view-channel')->with('flash_message_success',' Channel has been Added Successfully!');
        }
        $sector = BusinessSector::get();
        return view('channel.add')->with(compact('sector'));
    }
    public function viewChannel(){

        $chan = Channel::with('sector')->get();
        $chan = Channel::orderBy('id','DESC')->get();
        $sector = BusinessSector::get();
        return view('channel.view')->with(compact('sector','chan'));
    }

    public function editChannel(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            $validatedata = $request->validate([
                'channel_name'=>'required'
            ]);


            Channel::where('id', $id)->update(['sector_id'=>$data['sector_id'],'channel_name'=>$data['channel_name'],'status'=>$data['status']]);
            return redirect('/view-channel')->with('flash_message_success','  Channel has been Edited Successfully!');
        }

        $edit_channel = Channel::where(['id'=>$id])->first();
        $sector = BusinessSector::get();
            $categories_dropdown ="<option selected disabled>Select</option>";
            foreach($sector as $cat){
                if($cat->id==$edit_channel->sector_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->sector_name."</option>";
            }
        return view('channel.edit')->with(compact('edit_channel','sector','categories_dropdown'));
    }

}


