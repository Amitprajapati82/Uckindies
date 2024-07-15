<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\Event;
use App\Models\About;
use App\Models\Gallery;
use App\Models\OurTeam;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = DB::table('approvals')
            ->join('addresses', 'approvals.address_id', '=', 'addresses.id')
            ->where('approvals.status', 0)
            ->select('approvals.*', 'addresses.center')
            ->get(); 

            // return $data;

        return view('admin.request' ,compact('data'));
    }

   
    public function preview(Request $request)
    {
        $id = $request->query('id');
        $approvable_id = $request->query('approvable_id');
        
        $approval = Approval::find($id);
        return $approval;
        $data = [];
        $modelName = '';

        // Check for the ID in each model
        if ($about = About::find($id)) {
            $data = $about;
            // return $data->title;
            $modelName = 'About';
        } elseif ($gallery = Gallery::find($id)) {
            $data = $gallery;
            // return $data;
            $modelName = 'Gallery';
        } elseif ($ourTeam = OurTeam::find($id)) { // Uncomment if needed
            $data = $ourTeam;
            $modelName = 'OurTeam';
        } elseif ($testimonial = Testimonial::find($id)) { // Uncomment if needed
            $data = $testimonial;
            $modelName = 'Testimonial';
        } elseif ($event = Event::find($id)) { // Uncomment if needed
            $data = $event;
            $modelName = 'Event';
        }

        if ($data === null) {
            abort(404, 'Record not found');
        }

        return view('admin.preview', compact('data', 'modelName'));
    }
}
