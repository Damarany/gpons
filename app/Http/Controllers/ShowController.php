<?php

namespace App\Http\Controllers;

use App\Models\Rehab;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function insert(){
        return view('gpons.rehab.insert');
    }

    public function data(Request $request){

        Rehab::create([
            'code'=>$request->code,
            'dslam_ip'=>$request->dslam_ip,
            'name'=>$request->name,
            'voice_ip'=> ip2long("$request->voice_ip"),
            'getway'=>$request->getway,
            'vlan'=>$request->vlan,
            'proxy'=>$request->proxy,
            'free_ip'=> ip2long("$request->free_ip"),
        ]);
        return redirect()->back()->with(['success'=>('done')]);
    }

    public function next_ip($my_ip, $my_id,$free_ip){
        if ($free_ip == ip2long('0.0.0.0')){
            Rehab::where('id',$my_id)->update([
                'voice_ip'=>ip2long($my_ip)
            ]);
            return redirect()->back()->with(['success'=>('done')]) ;
        }else{
            Rehab::where('id',$my_id)->update([
                'free_ip'=>ip2long('0.0.0.0')
            ]);
            return redirect()->back()->with(['success'=>('done')]) ;
        }



    }

    public function search(){
        return view('gpons.search');
    }

    public function show(Request $request ){
    $q = $request->q;
        $request->validate([
            'q'=>'required'
        ]);
      $shows =  Rehab :: where('code', 'LIKE', '%' .$q. '%')
          ->orwhere('dslam_ip', 'LIKE', '%' .$q. '%')
          ->orwhere('name', 'LIKE', '%' .$q. '%')
          ->get();
      if($shows->count()){
          return view('gpons.rehab.show',compact('shows'));
      }else{
          return redirect('gpons/search')->with([
              'status'=>'wrong information'
          ]);
      }

}
    public function edit($my_id){
        $shows= Rehab::find($my_id);
        return view('gpons.edit',compact('shows','my_id'));
    }

    public function update(Request $request, $my_id){
        $this->validate($request,[
            'code' => 'required',
            'dslam_ip' => 'required',
            'name' => 'required',
            'voice_ip' => 'required',
            'getway' => 'required',
            'vlan' => 'required',
            'proxy' => 'required',
            'free_ip'=>'required'
        ]);
        $shows = Rehab::find($my_id);
        $shows->code = $request->get('code');
        $shows->dslam_ip = $request->get('dslam_ip');
        $shows->name = $request->get('name');
        $shows->voice_ip = ip2long($request->get('voice_ip'));
        $shows->getway = $request->get('getway');
        $shows->vlan = $request->get('vlan');
        $shows->proxy = $request->get('proxy');
        $shows->free_ip = ip2long($request->get('free_ip'));
        $shows->save();
        return redirect('gpons/search')->with(['success'=>('updated')]);
    }

}
