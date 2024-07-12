<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    //
    public function index()
    {
        if(Session::has("State"))
        {
            $SessionData =  Session::get('State');

            $role_id = $SessionData->role_id;

            $address = Address::where('state_id',$role_id)->where('delete_status',1)->get();
            
        }
        else
        {
           
        }
        $data = Event::where('status',1)->get();
        
        return view('admin.events', compact('data','address'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'organizer' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'sometimes|boolean',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $event = new Event();
        $event->title = $request->input('title');
        $event->address_id = $request->input('Unit_id');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->organizer = $request->input('organizer');
        $event->image_path = $imagePath;
        $event->is_published = $request->has('is_published') ? 1 : 0;
        $event->save();
    
        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }

    public function getEventData(Request $request)
    {
        $id =  $request->id;

        $data = Event::leftJoin('addresses', 'events.address_id', '=', 'addresses.id')
             ->where('events.id', $id)
             ->select('events.*', 'addresses.center')
             ->first();
        // $data = Event::where('id', $id)->where('status',1)->first();

        return response()->json([$data,'success' => 'Successfully Get Data']);
    }
    public function update(Request $request)
    {

        $event = Event::findOrFail($request->event_id);
        // return $request->hasFile('eventImage');
        
        $event->title = $request->eventTitle;
        $event->address_id = $request->editUnit_id;
        $event->description = $request->eventDescription;
        $event->location = $request->eventLocation;
        $event->start_time = $request->eventStartTime;
        $event->end_time = $request->eventEndtime;
        $event->organizer = $request->eventOrganizer;
        // $event->ratings = $request->eventStartTime;
        $event->is_published = $request->has('eventPublished') ? 1 : 0;
      


        if ($request->hasFile('eventImage')) {

            $image = $request->file('eventImage');
           
            if ($event->image_path) {
                Storage::disk('public')->delete($event->eventImage);
                
                $imagePath = $image->store('images', 'public');
                // return $imagePath;
                $event->image_path = $imagePath;
            }

            
        }

        $event->save();

        return redirect()->back()->with('success', 'Event Updated Successfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $data = Event::where('id',$id)->update(['status' => 0]);

        return response()->json([$data,'Successfully Deleted.']);
    }
}
