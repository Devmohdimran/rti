<?php

namespace App\Http\Controllers\admin;
use App\Models\BranchModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;

class NewBranchAddController extends Controller
{
    public function NewBranchAdd()
    {
        return view('admin.branch.New_Branch_Add');
    }

    public function storeNewBranchAdd(Request $branchdata)
    {
        $branch = new AdminModel();
        $branch->usid = $branchdata['b_userid'];
        $branch->username = $branchdata['b_userid'];
        $branch->name = $branchdata['b_head'];
        $branch->pswd = md5( $branchdata['b_pass'] );
        $branch->mob_no = $branchdata['b_mob'];
        $branch->email = $branchdata['b_email'];
        $branch->branch_address = $branchdata['b_add'];
        $branch->branch_head = $branchdata['b_head'];
        $branch->typ = 'branch';
        $branch->status = 'active';
        $branch->save();
        if($branch) {
            return redirect('admin/New_Branch_Add')->with('status', "Insert successfully");
        }else{
            return redirect('admin/New_Branch_Add')->with('failed', "There are someting error, please try some time.");
        }
    }

    // public function storeNewBranchAdd(Request $branchdata)
    // {
    //     $branch = new BranchModel();
    //     $branch->user_id = $branchdata['b_userid'];
    //     $branch->password = $branchdata['b_pass'];
    //     $branch->mobile = $branchdata['b_mob'];
    //     $branch->email = $branchdata['b_email'];
    //     $branch->branch_address = $branchdata['b_add'];
    //     $branch->branch_head = $branchdata['b_head'];
    //     $branch->save();
    //     if($branch) {
    //         return redirect('admin/New_Branch_Add')->with('status', "Insert successfully");
    //     }else{
    //         return redirect('admin/New_Branch_Add')->with('failed', "There are someting error, please try some time.");
    //     }
    // }

    // public function BranchDetails()
    // {
    //     $branchsdata = BranchModel::all();
    //     return view('admin.branch.Branch_Details')->with('branchsdata', $branchsdata);
    // }

    public function BranchDetails()
    {
        $branchsdata = AdminModel::all();

        return view('admin.branch.Branch_Details')->with('branchsdata', $branchsdata);
    }

    public function editBranchDetails($id)
    {
        $singlebranch = AdminModel::find($id);
        return view('admin.branch.editBranchDetails')->with('singlebranch', $singlebranch);
    }

    public function updateBranch(Request $request, $id){
        $updatebranch = AdminModel::find($id);
        $updatebranch->mob_no = $request['b_mob'];
        $updatebranch->email = $request['b_email'];
        $updatebranch->branch_address = $request['b_add'];
        $updatebranch->branch_head = $request['b_head'];
        $updatebranch->save();
        if($updatebranch) {
            return redirect('admin/Branch_Details')->with('status', "Update successfully");
        }else{
            return redirect('admin/Branch_Details')->with('failed', "There are someting error, please try some time.");
        }
    }


}
