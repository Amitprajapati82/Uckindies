<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $data = Gallery::where('status',1)->get();
        // return $data;
        return view('admin.gallery',compact('data'));
    }
    public function store(Request $request)
    {
        // return 'vbkjvbx';
        // dd(Session::get('State')); 
        $sessionData = Session::get('State');
        $address_id = $sessionData->role_id;

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

        return redirect()->route('admin.gallery')->with('success', 'About us added successfully!');
    }

    public function update(Request $request)
    {
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
        $gallery->save();

        return redirect()->back()->with('success', 'Gallery Updated Successfully');
    }

    public function getGalleryData(Request $request)
    {
        $id = $request->id;

        $data = Gallery::where('id',$id)->where('status',1)->first();

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
