<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\AgentModel;
use App\Models\CandidateModel;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function addNewAgent()
    {
        return view('admin.pages.add_new_agent');
    }
    
    function addNewAgentPost(Request $request)
    {  
        $validate = $request->validate([
            'trv_name'        => 'required',
            'agent_name'        => 'required',
            'mob'                => 'required',
            'email'                => 'required',
            'full_add'                => 'required',
            'full_med_fee'            => 'required',
            'full_com'                => 'required',
            'xray_only'                => 'required',
            'xray_com'                => 'required',
            'blood_only'                => 'required',
            'blood_com'                => 'required',
            ]);
        if($validate == true)
        {
            $agent = $request->all();
            
            $agent ['trv_name'] = $request->trv_name;
            $agent ['agent_name'] = $request->agent_name;
            $agent ['mob'] = $request->mob;
            $agent ['email'] = $request->email;
            $agent ['full_add'] = $request->full_add;
            $agent ['full_med_fee'] = $request->full_med_fee;
            $agent ['xray_only'] = $request->xray_only;
            $agent ['xray_com'] = $request->xray_com;
            $agent ['blood_only'] = $request->blood_only;
            $agent ['blood_com'] = $request->blood_com;
            $agent ['status'] ='1';
            $digits = 7;
            $agent ['agent_id'] = $seventDigit = rand(pow(10, $digits-1), pow(10, $digits)-1); // 7 number uniqe  genrate
            $agentAlredy = AgentModel::where('mob',$agent ['mob'])->first(); 
            if($agentAlredy)
            {
                return redirect()->back()->with('error','This agent already exists..!');
            }
            else
            {
                $storeData = AgentModel::create($agent);
                if($storeData)
                {
                    return redirect()->back()->with('success','Add new agent successfully ');
                }
                else
                {
                    return redirect()->back()->with('error','Something went wrong');
                }
            }   
        }    

    }

    public function agentList()
    {
        $agentList = AgentModel::orderBy('id', 'desc')->get();
        return view('admin.pages.list_agent', compact('agentList'));
        
    }
    public function eidtAgent($id)
    {
        $list = AgentModel::find($id);
        return view('admin.pages.add_new_agent', compact('list'));
        
    }
    public function agentUpdatePost(Request $request)
    {   
        $userid = $request->all();
        $agent ['trv_name'] = $request->trv_name;
        $agent ['agent_name'] = $request->agent_name;
        $agent ['mob'] = $request->mob;
        $agent ['email'] = $request->email;
        $agent ['full_add'] = $request->full_add;
        $agent ['full_med_fee'] = $request->full_med_fee;
        $agent ['xray_only'] = $request->xray_only;
        $agent ['xray_com'] = $request->xray_com;
        $agent ['blood_only'] = $request->blood_only;
        $agent ['blood_com'] = $request->blood_com;
        $updateData = AgentModel::find($request->id);
        $updateData->update($agent);
        if($updateData)
        {
            return redirect()->back()->with('success','Record Update successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /// add candidate here

    public function addNewCandidate ()
    {   
        $agentList = AgentModel::orderBy('id', 'desc')->get();
        
        return view('admin.pages.new_candidate', compact('agentList'));
        
    }
    public function addNewCandidateStore(Request $request)
    {   
        $data = $request->all();
       
        $srNO = CandidateModel::orderBy('sr_no', 'DESC')->first();
       
        $data['sr_no'] = $srNO->sr_no + 1;

        $application =  CandidateModel::create($data);
        if($application)
        {
            return redirect()->back()->with('success','Record Added successfully');
        }
        else
        {
            return redirect()->back()->with('error','Something went wrong');
        }
        
        
    }

    public function eidtCandidate($id)
    {
        $list = AgentModel::find($id);
        return view('admin.pages.new_candidate', compact('list'));
        
    }

    


}
