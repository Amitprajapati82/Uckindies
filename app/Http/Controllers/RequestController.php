<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
// use App\Models\Approval;
use App\Models\Event;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Address;
use App\Models\Banner;
use App\Models\OurTeam;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.request');
    }

   
    public function preview(Request $request)
    {
        $id = $request->query('id');
        $approvable_id = $request->query('approvable_id');
        
        $approval = Approval::find($id);
        // return $approval;

        $data = [];
        $modelName ='';

        // Check for the ID in each model
        if ($approval->approvable_type == About::class) {
            $data = Approval::join('about_us', 'approvals.approvable_id', '=', 'about_us.id')
                ->where('approvals.id', $id)
                ->where('about_us.id', $approvable_id)
                ->select('approvals.id as approval_id', 'about_us.*') // Select all columns from both tables
                ->first();
            // return $data;
            $modelName = 'About';
        } elseif ($approval->approvable_type == Gallery::class) {
            $data = Approval::join('galleries', 'approvals.approvable_id', '=', 'galleries.id')
                    ->where('approvals.id', $id)
                    ->where('galleries.id', $approvable_id)
                    ->select('approvals.id as approval_id', 'approvals.status as approval_status','galleries.*') // Select all columns from both tables
                    ->first();
            // return $data->approval_status;
            $modelName = 'Gallery';
        } elseif ($approval->approvable_type == OurTeam::class) { // Uncomment if needed
            $data = Approval::join('our_teams', 'approvals.approvable_id', '=', 'our_teams.id')
                    ->where('approvals.id', $id)
                    ->where('our_teams.id', $approvable_id)
                    ->select('approvals.id as approval_id', 'our_teams.*') // Select all columns from both tables
                    ->first();
                    // return $data;
            $modelName = 'OurTeam';
        } elseif ($approval->approvable_type == Testimonial::class) { // Uncomment if needed
            $data = Approval::join('testimonials', 'approvals.approvable_id', '=', 'testimonials.id')
                    ->where('approvals.id', $id)
                    ->where('testimonials.id', $approvable_id)
                    ->select('approvals.id as approval_id', 'testimonials.*') // Select all columns from both tables
                    ->first();
            // return $data;
            $modelName = 'Testimonial';

        } elseif ($approval->approvable_type == Event::class) { // Uncomment if needed
            $data = Approval::join('events', 'approvals.approvable_id', '=', 'events.id')
                    ->where('approvals.id', $id)
                    ->where('events.id', $approvable_id)
                    ->select('approvals.id as approval_id','events.*') // Select all columns from both tables
                    ->first();

                    // return $data;

            $modelName = 'Event';
        }elseif ($approval->approvable_type == Address::class) {
            # code...
            $data = Approval::join('addresses', 'approvals.approvable_id', '=', 'addresses.id')
                    ->where('approvals.id', $id)
                    ->where('addresses.id', $approvable_id)
                    ->select('approvals.id as approval_id','addresses.*') 
                    ->first();

                    // return $data;
                    $modelName = 'Address';
        }elseif ($approval->approvable_type == Banner::class) {
            // return 'hkfvfd';
            $data = Approval::join('addresses', 'approvals.approvable_id', '=', 'uc_banners.id')
                    ->where('approvals.id', $id)
                    ->where('uc_banners.id', $approvable_id)
                    ->select('approvals.id as approval_id','uc_banners.*') 
                    ->first();

                    // return $data->approvable_id;
                    $modelName = 'Banner';
        }

        if ($data === null) {
            abort(404, 'Record not found');
        }

        return view('admin.preview', compact('data', 'modelName'));
    }

    public function approvalOrReject(Request $request)
    {
        $approval_id = !empty($request->input('approval_id')) ? $request->input('approval_id') : "";
        $action = !empty($request->input('action')) ? $request->input('action') : "";
        $reason = !empty($request->input('reason')) ? $request->input('reason') : "";
        
        $approval = Approval::find($approval_id);
        $data = '';

        if (!empty($approval)) {
            
            if ($action === 'approve') {
                
               $data = Approval::where('id',$approval_id)->update([
                    'status' => 1
                ]);

                return response()->json([$data,'Success' => 'Request Approved Successfull.']);

            } elseif ($action === 'reject') {

                $data = Approval::where('id',$approval_id)->update([
                    'status' => 2,
                    'rejected_reason' => $reason 
                ]);

                return response()->json([$data,'Success' => 'Request Rejected.']);

            }
        }else {
            # code...
            return response()->json(['error' => 'Approval not found.'], 404);
        }
        return response()->json(['error' => 'Approval not found.'], 404);

        
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $data = Approval::where('id',$id)->update(['delete_status' => 0]);

        return response()->json([$data,'Successfully Deleted.']);
    }

    
}
