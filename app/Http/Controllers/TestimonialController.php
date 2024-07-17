<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Address;
use App\Models\Approval;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
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
            $data = Testimonial::whereHas('approvals', function ($query) {
                $query->where('status', 1);
            })->get();
            // return $data;
            
            return view('admin.testimonials',compact('data','address'));
        }
        else
        {
            $SessionData =  Session::get('Admin');

            $role_id = $SessionData[0]->role_id;


            $data = Testimonial::where('status',1)->where('address_id',$role_id)->get();
            return view('admin.testimonials',compact('data'));
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
    $request->validate([
        'name' => 'required|string|max:255',
        'Email' => 'required|string|email|max:255',
        'Message' => 'required|string',
        'Ratings' => 'required|integer|min:1|max:5',
        'Published' => 'nullable|boolean',
        'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image type and size
    ]);
    // return $request->all();

        // Handle image upload
        // return $request->file('Image');
        if ($request->hasFile('PublishedImage')) {
            $image = $request->file('PublishedImage');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // Store in storage/app/public/images directory

            // Alternatively, you can use the following to store in the public directory:
            // $image->move(public_path('images'), $imageName);
        }
        $testimonial = new Testimonial();
        $testimonial->address_id = $request->input('Unit_id');
        $testimonial->name = $request->input('name');
        $testimonial->email = $request->input('Email');
        $testimonial->message = $request->input('Message');
        $testimonial->ratings = $request->input('Ratings');
        $testimonial->published = $request->has('Published') ? 1 : 0;
        $testimonial->image_path = $imageName ?? null; // Save the image name if uploaded

        // Save the Testimonial to the database
        $testimonial->save();


        $approval = new Approval();
        $approval->admin_id = $admin_id;
        $approval->address_id = $request->input('Unit_id');
        $approval->description = "Request to add Testimonial";
        $approval->status = 0;
        $approval->approvable_id = $testimonial->id;
        $approval->approvable_type = Testimonial::class;
        $approval->save();

        return redirect()->back()->with('success', 'Testimonial added successfully!');
    }

    public function getDataTestimonial(Request $request)
    {
        $id = $request->input('id');

        $data = Testimonial::leftJoin('addresses', 'testimonials.address_id', '=', 'addresses.id')
             ->where('testimonials.id', $id)
             ->select('testimonials.*', 'addresses.center')
             ->first();
        // $data = Testimonial::where('id',$id)->where('status',1)->first();

        return response()->json([$data,'success' => 'Data get  successfully.']);
    }

    public function update(Request $request)
    {
       
        $testimonial = Testimonial::findOrFail($request->testimonial_id);
        
        $testimonial->name = $request->editName;
        $testimonial->address_id = $request->editUnit_id;
        $testimonial->email = $request->editEmail;
        $testimonial->message = $request->editMessage;
        $testimonial->ratings = $request->editRatings;
        $testimonial->published = $request->has('editPublished') ? 1 : 0;
      


        if ($request->hasFile('editPublishedImage')) {

            $image = $request->file('editPublishedImage');
           
            if ($testimonial->image_path) {

                Storage::disk('public')->delete($testimonial->editPublishedImage);
                
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $testimonial->image_path = $imageName;
            }

            
        }

        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial updated successfully');
    }

    public function delete(Request $request)
    {
            $id = $request->id;

            $data = Testimonial::where('id',$id)->update(['status'=> 0]);

            return response()->json([$data,'Successfully Deleted.']);
    }




}
