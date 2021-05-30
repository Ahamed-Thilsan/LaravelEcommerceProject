<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\BusinessSector;
use App\Models\Subchannel;

class SubchannelController extends Controller
{
    public function addSubChannel(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['sub_channel'] as $key =>$val){
                if(!empty($val)){
                    $chan = new Subchannel;
                    $chan->channel_id=$data['channel_id'];
                    $chan->status=$data['status'];
                    $chan->sub_channel = $val;
                    $chan->save();
                }
            }
            return redirect('/view-sub-channel')->with('flash_message_success',' Sub Channel has been Added Successfully!');
        }
        $channel = Channel::get();
        return view('sub_channel.add')->with(compact('channel'));
    }

    public function viewSubChannel(){
        $sub_chan = Subchannel::with('channels')->get();
    
        $sub_chan = Subchannel::orderBy('id','DESC')->get();
        $channel = Channel::get();
        return view('sub_channel.view')->with(compact('sub_chan','channel'));
        
    }
    public function editSubChannel(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            $validatedata = $request->validate([
                'sub_channel'=>'required'
            ]);

            Subchannel::where('id', $id)->update(['channel_id'=>$data['channel_id'],'sub_channel'=>$data['sub_channel'],'status'=>$data['status']]);
            return redirect('/view-sub-channel')->with('flash_message_success',' Sub Channel has been Edited Successfully!');
        }
        $edit_subchannel = Subchannel::where(['id'=>$id])->first();

        $bus_sector = BusinessSector::get();
        $sector_dropdown ="<option selected disabled>Select</option>";
            foreach($bus_sector as $cat){
                if($cat->id==$edit_subchannel->sector_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $sector_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->sector_name."</option>";
            }

        $channel = Channel::get();
        $channel_dropdown ="<option selected disabled>Select</option>";
            foreach($channel as $cat){
                if($cat->id==$edit_subchannel->channel_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $channel_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->channel_name."</option>";
            }
        return view('sub_channel.edit')->with(compact('edit_subchannel','bus_sector','sector_dropdown','channel_dropdown'));
    }

}
