<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class AboutControlller extends Controller
{
    //
    public function index(Request $request)
    {
        if(Session::has("State"))
        {
            $SessionData =  Session::get('State');

            $role_id = $SessionData->role_id;

            $data = Address::where('state_id',$role_id)->where('delete_status',1)->get();
            $about = About::where('status',1)->get();

            return view('admin.about_us',compact('about','data'));
        }
        else
        {
            $SessionData =  Session::get('Admin');

            $role_id = $SessionData[0]->ID;
            
            return $role_id;
            
            $about = About::where('status',1)->where('address_id',$role_id)->get();

            // return $about;
            return view('admin.about_us',compact('about'));
        }
        // $about = About::where('status',1)->get();
        // return $data;
        
    }

    public function store(Request $request)
    {
        // return 'gkvkv';
        
        
        // return $request->file('Image');
        if($request->hasFile('Image')){

        $title  = $request->input('TitleName');
        $description = $request->input('Description');
        $unit_id = $request->input('Unit_id');
        // return $unit_id;
        $file = $request->file('Image');
        
        // Get the original file name or you can define your own file name
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Store the file in the 'public' disk (you can change this to any disk you want)
        $path = $file->storeAs('uploads', $filename, 'public');

        $about_us = new About();
        $about_us->address_id = $unit_id;
        $about_us->title = $title;
        $about_us->description = $description;
        $about_us->image = $path;
        $about_us->save();
        // return $path;

        return redirect()->route('about.index')->with('success', 'About us added successfully!');

       }else{
        return back()->withErrors(['AboutImage' => 'File upload failed.']);
       }

    
    }
    

    public function getAboutData(Request $request)
    {
        $id =  $request->input('id');

        // $data = About::where('id',$id)->first();
        $data = About::leftJoin('addresses', 'about_us.address_id', '=', 'addresses.id')
             ->where('about_us.id', $id)
             ->select('about_us.*', 'addresses.center')
             ->first();

        return response()->json([$data,'Success'=>'Data Successfully Get.']);
    }

    public function update(Request $request)
    {
        $id = $request->input('about_id');
        // return $request->file('editAboutImage');
        $title =  $request->input('editTitleName');
        $description =  $request->input('editDescription');
        $unit_id =  $request->input('editUnit_id');
        // return $unit_id;

        $data = About::findOrFail( $id );
        // return $data;
        $data->title = $title;
        $data->address_id = $unit_id;
        $data->description = $description;

        if ($request->hasFile('editAboutImage')) {
            
            $img = $request->file('editAboutImage');
           
            if ($data->image) {
                Storage::disk('public')->delete($data->editAboutImage);
                
                $imagePath = $img->store('images', 'public');
                // return $imagePath;
                $data->image = $imagePath;
            }

        }
        $data->save();
        return redirect('admin/about');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
       
        $data = About::where('id',$id)->update(['status' => 0]);

        return response()->json([$data,'Successfully Deleted.']);
    }
}
