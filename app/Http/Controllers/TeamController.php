<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use IIluminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;
use App\Models\OurTeam;
use App\Models\Approval;
use App\Models\Address;
use IIluminate\Support\Facades\Storage;

class TeamController extends Controller
{
    //
    public function index()
    {
        if(Session::has("State"))
        {
            $SessionData =  Session::get('State');

            $role_id = $SessionData->role_id;

            $address = Address::where('state_id',$role_id)->where('delete_status',1)->get();
            $data = OurTeam::whereHas('approvals', function ($query) {
                $query->where('status', 1);
            })->get();
            // return $data;

            return view('admin.our_team', compact('data','address'));
        }
        else
        {
            $SessionData =  Session::get('Admin');

            $role_id = $SessionData[0]->role_id;

            $data = OurTeam::where('status',1)->where('address_id',$role_id)->get();

            return view('admin.our_team', compact('data'));
        }

    }

    public function store(Request $request)
    {
        $admin_id = '';
        if(Session::has('State')) {
            # code...
            $data = Session::get('State');
            $admin_id = $data->ID;
        }
        // $sessionData  = Session::get('State');
        // $admin_id = $sessionData->role_id;
        // $address_id = Address::where('state_id',$admin_id)->where('delete_status',1)->select('id')->get();
        // return $address_id;

        if ($request->hasFile('Image')) {

           $image = $request->file('Image');

           $filename = time() .'.'. $image->getClientOriginalName();
           $imagePath = $image->storeAs('uploads', $filename, 'public');
        }
        $team = new OurTeam();
        $team->address_id = $request->Unit_id;
        $team->image_path =  $imagePath;
        $team->description =  $request->Description;
        $team->save();

        $approval = new Approval();
        $approval->admin_id = $admin_id;
        $approval->address_id = $request->Unit_id;
        $approval->description = "Request to add our team";
        $approval->status = 0;
        $approval->approvable_id = $team->id;
        $approval->approvable_type = OurTeam::class;
        $approval->save();

        return redirect()->back()->with('Success','Our Team Successfully Inserted');

    }

    public function getTeamData(Request  $request)
    {
        $id = $request->id;
        $data = OurTeam::leftJoin('addresses', 'our_teams.address_id', '=', 'addresses.id')
             ->where('our_teams.id', $id)
             ->select('our_teams.*', 'addresses.center')
             ->first();
        // $data = OurTeam::where('id',$id)->where('status',1)->first();
        
        return response()->json([$data,'success' => 'Successfully Get Data']);
    }

    public function update(Request $request)
    {
        $ourTeam = OurTeam::find($request->team_id);

        if( $request->hasFile('editImage')) {

            $image = $request->file('editImage');

            if($ourTeam->image_path){

                Storage::disk('public')->delete($ourTeam->editImage);

                $filename = time() .'.'. $image->getClientOriginalName();
                $imagePath = $image->storeAs('uploads', $filename, 'public');

                $ourTeam->image_path = $imagePath;
            }

        }

        $ourTeam->address_id =  $request->editUnit_id;
        $ourTeam->description =  $request->editDescription;
        $ourTeam->save();

        return redirect()->back()->with('Success','SuccessFully Updated Data.');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $data = OurTeam::where('id',$id)->update(['status' => 0]);

        return response()->json([$data,'Successfully Deleted.']);
    }
    
}
