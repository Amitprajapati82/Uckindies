<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Gallery;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    //
    public function index()
    {
        if(Session::has("State"))
        {
            $SessionData =  Session::get('State');

            $role_id = $SessionData->role_id;

            $address = Address::select('addresses.*', 'states.state_name as state_name', 'approval_status.status as approval_status')
                    ->leftJoin('states', 'addresses.state_id', '=', 'states.id')
                    ->leftJoin(DB::raw('(select address_id, status from approvals where id in (select max(id) from approvals where status = 1 group by address_id)) as approval_status'), function ($join) {
                        $join->on('addresses.ID', '=', 'approval_status.address_id');
                    })
                    ->where('addresses.state_id', $role_id)
                    ->where('approval_status.status',1)
                    ->where('addresses.delete_status', 1)
                    ->orderBy('addresses.ID', 'ASC')
                    ->get();
            $data = Gallery::whereHas('approvals', function ($query) {
                $query->where('status', 1);
            })->get();
            // return $data;

            return view('admin.gallery',compact('data','address'));
        }
        else
        {
            $SessionData =  Session::get('Admin');

            $role_id = $SessionData[0]->role_id;
            
            $data = Gallery::where('status',1)->where('address_id',$role_id)->get();

            // return $about;
            return view('admin.gallery',compact('data'));
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
        // return 'vbkjvbx';
        // dd(Session::get('State')); 
        // $sessionData = Session::get('State');
        $address_id = $request->Unit_id;
        // return $address_id;

        // Initialize file paths
        $imagePath = null;
        $videoPath = null;
        $videoExtension = null;

        // Handle image upload
        if ($request->hasFile('Image_url')) {
            $imagePath = $request->file('Image_url')->store('uploads/images', 'public');
            // return $imagePath;
        }

        // Handle video upload
        // echo'<pre>';printf($request->file('Video_url'));die;
        if ($request->hasFile('Video_url')) {
            $video = $request->file('Video_url');
            $videoName = $video->getClientOriginalName();
            // return $videoExtension;
            $videoPath = $video->storeAs('uploads/videos', time() . '_' . $videoName, 'public');
            // return $videoPath;
        }

        // Save the file paths to the database
        $gallery = new Gallery();
        $gallery->address_id = $address_id;
        $gallery->image_path = $imagePath;
        $gallery->video_path = $videoPath;
        $gallery->video_extension = $videoExtension;
        $gallery->save();

        
        $approval = new Approval();
        $approval->admin_id = $admin_id;
        $approval->address_id = $address_id;
        $approval->description = "Request to add gallery";
        $approval->status = 0;
        $approval->approvable_id = $gallery->id;
        $approval->approvable_type = Gallery::class;
        $approval->save();

        return redirect()->route('admin.gallery')->with('success', 'About us added successfully!');
    }

    public function update(Request $request)
    {
        $address_id = $request->editUnit_id;
        $gallery = Gallery::findOrFail($request->gallery_id);


        if ($request->hasFile('editImageUrl')) {
            $image = $request->file('editImageUrl');
            
        
           
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }
        
            
            $imagePath = $image->store('uploads/images', 'public');
            
            
            $gallery->image_path = $imagePath;
        
            
        }
        if ($request->hasFile('editVideoUrl')) {
            $video = $request->file('editVideoUrl');
           
        
         
            if ($gallery->video_path) {
                Storage::disk('public')->delete($gallery->video_path);
            }
        
            
            $videoPath = $video->store('uploads/videos', 'public');
            
            
            $gallery->video_path = $videoPath;
        
            
        }
        $gallery->address_id = $address_id;
        $gallery->save();

        return redirect()->back()->with('success', 'Gallery Updated Successfully');
    }

    public function getGalleryData(Request $request)
    {
        $id = $request->id;
        $data = Gallery::leftJoin('addresses', 'galleries.address_id', '=', 'addresses.id')
             ->where('galleries.id', $id)
             ->select('galleries.*', 'addresses.center')
             ->first();

        // $data = Gallery::where('id',$id)->where('status',1)->first();

        return response()->json([$data,'success' => 'Data get  successfully.']);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        // return $id;

        $data = Gallery::where('id',$id)->update(['status' => 0]);

        return response()->json([$data,'success' => 'Data Deleted  Successfully.']);
    }
}
