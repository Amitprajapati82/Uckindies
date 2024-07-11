<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
class AboutControlller extends Controller
{
    //
    public function index()
    {
        $about = About::where('status',1)->get();

        return view('admin.about_us',compact('about'));
    }

    public function store(Request $request)
    {
        // return 'gkvkv';
        
        
        // return $request->file('Image');
        if($request->hasFile('Image')){

        $title  = $request->input('TitleName');
        $description = $request->input('Description');
        $file = $request->file('Image');
        
        // Get the original file name or you can define your own file name
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Store the file in the 'public' disk (you can change this to any disk you want)
        $path = $file->storeAs('uploads', $filename, 'public');

        $about_us = new About();
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

        $data = About::where('id',$id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        $id = $request->input('about_id');
        // return $request->file('editAboutImage');
        $title =  $request->input('editTitleName');
        $description =  $request->input('editDescription');

        $data = About::findOrFail( $id );
        // return $data;
        $data->title = $title;
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
