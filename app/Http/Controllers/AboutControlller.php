<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

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
       $title  = $request->input('TitleName');
       $description = $request->input('Description');
       

       if($request->hasFile('AboutImage')){
        //    return $title;
        $file = $request->file('AboutImage');
        
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
        // return $id;
        $title =  $request->input('editTitleName');
        $description =  $request->input('editDescription');

        $data = About::where('id',$id)->update(['title' => $title,'description'=> $description]);
        return redirect('admin/about');
    }
}
