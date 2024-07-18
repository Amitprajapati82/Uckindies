<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{ Address,State};
use App\Models\Admin;
use App\Models\ContactUs;
// use App\Models\State;
use App\Models\Approval;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Paginator;
// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Home_Controller extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function about()
    {
        return view('about');
    }
    public function appointment()
    {
        return view('appointment');
    }
    public function callToAction()
    {
        return view('call-to-action');
    }
    public function classes()
    {
        return view('classes');
    }
    // public function contact()
    // {
    //     return view('contact');
    // }    
    
    public function facility()
    {
        return view('facility');
    }    
    
    public function team()
    {
        return view('team');
    }
    
    public function testimonial()
    {
        return view('testimonial');
    }
    
    public function not_found()
    {
        return view('404');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function franchise()
    {
        return view('franchise');
    }
     public function enrollment()
    {
        return view('enrollment');
    }
    public function centers()
    {
        $data = DB::select("SELECT a.*, s.state_name  FROM `addresses` AS a LEFT JOIN states AS s ON a.state_id = s.ID WHERE a.status = 1 AND a.delete_status=1 ");
        $State = State::where('delete_status', '1')->where('status', '1')->orderBy('ID', 'ASC')->get();
        // return $data;
        
        return view('centers', ['data'=>$data,'State'=>$State]);
    }
    public function awards()
    {
        return view('awards');
    }    
     public function join_us()
    {
        return view('join_us');
    }    
    
    public function state($state)
    {
        $State_id = null;

        if (Session::has('State')) {

            $data = Session::get('State');
            $State_id =  $data->role_id;

        }elseif(Session::has('Admin')){

            $data = Session::get('Admin');
            $State_id =  $data[0]->role_id;
            
        }
        
        $temp = str_replace('_', ' ', $state);
        $state = ucwords($temp);

        $bannerData = DB::table('states')
            ->leftJoin('uc_banners', 'states.id', '=', 'uc_banners.state_id')
            ->where('states.id', $State_id)
            ->where('states.delete_status', 1)
            ->select(
                'states.*',
                'uc_banners.banner_name', 'uc_banners.banner_image',  
            )
            ->get();

            $aboutData = DB::table('states')
                ->leftJoin('about_us', 'states.id', '=', 'about_us.state_id')
                ->where('states.id', $State_id)
                ->where('states.delete_status', 1)
                ->select(
                    'states.*',
                    'about_us.description as about_us_content', 'about_us.image as about_image_path',
                )
                ->get();

            $testimonialData = DB::table('states')

                ->leftJoin('testimonials', 'states.id', '=', 'testimonials.state_id')
                ->where('states.id', $State_id)
                ->where('states.delete_status', 1)
                ->select(
                    'states.*',
                    'testimonials.name as testimonial_author', 'testimonials.message as testimonial_content', 'testimonials.image_path as testimonial_image', 
                )
                ->get();


            $eventData = DB::table('states')
                ->leftJoin('events', 'states.id', '=', 'events.state_id')
                ->where('states.id', $State_id)
                ->where('states.delete_status', 1)
                ->select(
                    'states.*',
                    'events.title as event_title', 'events.description as event_description', 'events.image_path','events.start_time as start_time','events.end_time as end_time' ,'events.location as location' 
                )
                ->get();


            $ourTeamData = DB::table('states')
                ->leftJoin('our_teams', 'states.id', '=', 'our_teams.state_id')
                ->where('states.id', $State_id)
                ->where('states.delete_status', 1)
                ->select(
                    'states.*',
                    'our_teams.description as team_position', 'our_teams.image_path as team_photo',
                )
                ->get();

            // $addressData = DB::table('states')
            // // ->leftJoin('uc_banners', 'states.id', '=', 'uc_banners.state_id')
            // // ->leftJoin('about_us', 'states.id', '=', 'about_us.state_id')
            // // ->leftJoin('testimonials', 'states.id', '=', 'testimonials.state_id')
            // // ->leftJoin('events', 'states.id', '=', 'events.state_id')
            // // ->leftJoin('our_teams', 'states.id', '=', 'our_teams.state_id')
            // ->leftJoin('addresses', 'states.id', '=', 'addresses.state_id')
            // // ->leftJoin('galleries', 'states.id', '=', 'galleries.state_id')
            // ->where('states.id', $State_id)
            // ->where('states.delete_status', 1)
            // ->select(
            //     'states.*',
            //     // 'uc_banners.banner_name', 'uc_banners.banner_image',
            //     // 'about_us.description as about_us_content', 'about_us.image as about_image_path',
            //     // 'testimonials.name as testimonial_author', 'testimonials.message as testimonial_content', 'testimonials.image_path as testimonial_image',
            //     // 'events.title as event_title', 'events.description as event_description', 'events.image_path',
            //     // 'our_teams.description as team_position', 'our_teams.image_path as team_photo',
            //     'addresses.center as center', 'addresses.address as franchise_details',
            //     // 'galleries.image_path as gallery_image'
            // )->distinct('states.id')
            // ->get();


    
             $galleryData = DB::table('states')
                ->leftJoin('galleries', 'states.id', '=', 'galleries.state_id')
                ->where('states.id', $State_id)
                ->where('states.delete_status', 1)
                ->select(
                    'states.*',
                    'galleries.image_path as gallery_image','galleries.video_path as gallery_video'
                )->distinct('states.id')
                ->get();

        // return $bannerData;
        // return $aboutData;
        // return $testimonialData;
        // return $eventData;
        // return $ourTeamData;
        // return $addressData;
        // return $galleryData;
        // return $State_id;
        
        return view('states1',compact('state','bannerData','aboutData','testimonialData','eventData','ourTeamData','galleryData'));
    }    
    
     public function login()
    {   
        $admin = Admin::where('status','1')->get();
        $State = State::where('delete_status', '1')->where('status', '1')->orderBy('ID', 'ASC')->get();
        // return $admin;
        return view('login',compact('State','admin'));
    }    
    
     public function forgot_password()
    {
        return view('forgot_password');
    }    
    
    public function AdminDashboard()
    {
        $State = State::where('delete_status',1)->count();
        $Units = Address::where('delete_status',1)->count();
        
        // return $request;
        return view('admin.index',compact('State','Units'));
    } 
    public function StateDashboard()
    {
        $data = Session::get('State');
        $state_id = $data->role_id;

        $State = State::where('id',$state_id)->where('delete_status',1)->count();

        $Units = Address::leftJoin('states', 'addresses.state_id', '=', 'states.id')
        ->leftJoin(DB::raw('(select address_id, status from approvals where id in (select max(id) from approvals where status = 1 group by address_id)) as approval_status'), function ($join) {
            $join->on('addresses.ID', '=', 'approval_status.address_id');
        })
        ->where('addresses.state_id', $state_id)
        ->where('approval_status.status', 1)
        ->where('addresses.delete_status', 1)
        ->count();

        return view('state.index',compact('State','Units'));
    } 
    public function CenterDashboard()
    {
        // return 'gvsdgigdgdi';
        return view('center.index');
    } 

    public function getBranches(Request $request)
    {
        // return 'bkbk';
        $stateId = $request->id;
        $state = Address::where('state_id',$stateId)->select('id','center')->get();
        // return $state;
        return response()->json($state);
    }

    public function getUnitsData(Request $request)
    {
        $id = $request->input('role_id');
        // $stateId = $request->id;
        $data = Address::where('state_id',$id)->where('delete_status',1)->get();
        // return $units;
        return view('admin.address',compact('data'));
    }

    public function ContactUs(Request $request)
    {
        // return $request->input('stud_name');
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'mobile' => 'required|string|min:10',
        //     'location' => 'required|string|max:1000',
        // ]);
        $contact = new ContactUs();
        $contact->name = $request->input('stud_name');
        $contact->age = $request->input('age');
        $contact->mobile = $request->input('number');
        $contact->location = $request->input('location');
        $contact->save();

        return redirect()->back()->with(['Success' => 'Contact Submit Successfully.']);

    }
}

?>  

