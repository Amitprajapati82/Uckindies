<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
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
    
    public function state(Request $request ,$state)
    {
        $State_id = $request->query('id');
        // return $State_id;

        // if (Session::has('State')) {

        //     $data = Session::get('State');
        //     $State_id =  $data->role_id;

        // }elseif(Session::has('Admin')){

        //     $data = Session::get('Admin');
        //     $State_id =  $data[0]->role_id;
            
        // }
        
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

                $addressData = DB::table('states')
                    ->leftJoin('addresses', 'states.id', '=', 'addresses.state_id')
                    ->where('states.id', $State_id)
                    ->where('addresses.delete_status', 1)
                    ->select(
                        'states.id',
                        'states.state_name',
                        'addresses.center as center',
                        'addresses.address as franchise_details'
                    ) ->get();

                    $groupedData = $addressData->groupBy('state_id')->map(function ($items) {
                        return [
                            'state_id' => $items->first()->id,
                            'state_name' => $items->first()->state_name,
                            'addresses' => $items->map(function ($item) {
                                return [
                                    'center' => $item->center,
                                    'franchise_details' => $item->franchise_details,
                                ];
                            })->toArray()
                        ];
                    })->values()->toArray();
            


    
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
        // return $groupedData;
        // return $galleryData;
        // return $State_id;
        
        return view('states1',compact('State_id','state','bannerData','aboutData','testimonialData','eventData','ourTeamData','galleryData','groupedData'));
    }   
    
    public function Units(Request $request ,$units)
    {

        $unit_id = $request->query('id');

        $temp = str_replace('_', ' ', $units);
        $Units = ucwords($temp);

        $bannerData = DB::table('uc_banners')
            ->leftJoin('addresses', 'uc_banners.address_id', '=', 'addresses.id')
            ->where('uc_banners.address_id', $unit_id) // Filter by unit_id
            ->where('addresses.delete_status', 1)
            ->select(
                'addresses.*',
                'uc_banners.banner_name',
                'uc_banners.banner_image'
            )
            ->get();


            $aboutData = DB::table('about_us')
                ->leftJoin('addresses', 'about_us.address_id', '=', 'addresses.id')
                ->where('addresses.id', $unit_id)
                ->where('addresses.delete_status', 1)
                ->select(
                    // 'addresses.id',
                    'about_us.id as about_us_id',
                    'about_us.description as about_us_content',
                    'about_us.image as about_image_path'
                )
                ->get();

            // $processedData = $aboutData->groupBy('about_us_id')->map(function ($items) {
            //     return [
            //         'about_us_id' => $items->first()->about_us_id,
            //         'about_us_content' => $items->pluck('about_us_content')->toArray(), // Or concatenate if you want all contents
            //         'about_image_path' => $items->pluck('about_image_path')->toArray() // Collect all image paths
            //     ];
            // });

            $testimonialData = DB::table('testimonials')
                ->leftJoin('addresses', 'testimonials.address_id', '=', 'addresses.id')
                ->where('addresses.id', $unit_id)
                ->where('addresses.delete_status', 1)
                ->select(
                    'testimonials.id as testimonial_id',
                    'testimonials.message as testimonial_content',
                    'testimonials.name as testimonial_author',
                    'testimonials.image_path as testimonial_image_path'
                )
                ->get();

            
                $galleryData = DB::table('galleries')
                    ->leftJoin('addresses', 'galleries.address_id', '=', 'addresses.id')
                    ->where('addresses.id', $unit_id)
                    ->where('addresses.delete_status', 1)
                    ->select(
                        'galleries.id as gallery_id',
                        // 'galleries.title as gallery_title',
                        'galleries.image_path as gallery_image_path',
                        'galleries.video_path as gallery_video_path'
                    )
                    ->get();


                    $eventData = DB::table('addresses')
                        ->leftJoin('events', 'addresses.id', '=', 'events.address_id')
                        ->where('addresses.id', $unit_id)
                        ->where('addresses.delete_status', 1)
                        ->select(
                            'addresses.*',
                            'events.title as event_title',
                            'events.description as event_description',
                            'events.image_path',
                            'events.start_time as start_time',
                            'events.end_time as end_time',
                            'events.location as location'
                        )
                        ->get();
                
            


        // printf($bannerData);echo'<pre>';die;

        return view('units',compact('unit_id','Units','bannerData','aboutData','testimonialData','galleryData','eventData'));
    }

    public function enquiryForm(Request $request)
    {
        $enquiry = new Enquiry();
        $enquiry->name = $request->input('name');
        $enquiry->email = $request->input('email');
        $enquiry->mobile = $request->input('mobile');
        $enquiry->enquiry = $request->input('enquiry');
        $enquiry->location = $request->input('location');
        $enquiry->save();

        return redirect()->back()->with(['Success' => 'Successfully inserted data.']);
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
        // return 'bdscs';
        
        $State = '';
        $Units = '';

        if (Session::has('State')) {
            $data = Session::get('State');
            $state_id = $data->role_id;
            # code...
            $State = State::where('id',$state_id)->where('delete_status',1)->count();
            
            $Units = Address::leftJoin('states', 'addresses.state_id', '=', 'states.id')
            ->leftJoin(DB::raw('(select address_id, status from approvals where id in (select max(id) from approvals where      status = 1 group by address_id)) as approval_status'), function ($join) {
                $join->on('addresses.ID', '=', 'approval_status.address_id');
            })
            ->where('addresses.state_id', $state_id)
            ->where('approval_status.status', 1)
            ->where('addresses.delete_status', 1)
            ->count();
            // return $Units;

            return view('admin.index',compact('State','Units','state_id'));

        }elseif(Session::has('Admin')){

            $State = State::where('delete_status',1)->count();
            $Units = Address::where('delete_status',1)->count();
        }
        
        
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

        return view('state.index',compact('State','Units','state_id'));
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
        $Unit_data_id = $request->input('unit_id');
        $State_data_id = $request->input('state_id');
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
        if ($State_data_id) {
          
            $contact->state_id = $State_data_id;
        }else{
            $contact->address_id = $Unit_data_id;
        }
        $contact->save();

        return redirect()->back()->with(['Success' => 'Contact Submit Successfully.']);

    }
}

?>  

