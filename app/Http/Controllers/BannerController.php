<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\models\Approval;
use App\models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
    //
    public function index()
    {
        // $role_id = '';
        if(Session::has('State')){

            $data = Session::get('State');

            $role_id = $data->role_id;

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

            $data = Banner::whereHas('approvals', function ($query) {
                $query->where('status', 1);
            })->get();
            
            return view('admin.banner', compact('role_id','data','address'));

        }elseif(Session::has('Admin')){

            $data = Session::get('Admin');

            $role_id = $data->role_id;

            $data = Banner::where('status',1)->where('address_id',$role_id)->get();

            return view("admin.banner",compact('role_id','data'));
        }
       
    }

    public function checkAddBannerName($name)
    {
        $data = DB::select("SELECT * FROM uc_banners WHERE banner_name='$name' AND 'status'<>'0' ");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }

    public function addBanner(Request $req)
    {       
        // $req->validate([
        //     'banner_image' => 'required|file|max:51200', // 51200 KB = 50 MB
        // ]);
        // return $req->file('AddBannerImage'); 
        $admin_id = '';
        if(Session::has('State')) {
            # code...
            $data = Session::get('State');
            $admin_id = $data->ID;
        }
        // return $req->all();  
        // return $req->file('AddBannerImage');
        
            // $BannerPosition =  $req->input('BannerPosition');            
            
        
         
            $ban = new Banner;
            $ban->banner_name =  $req->input('BannerName');
            $ban->state_id =  $req->input('state_id');
            $ban->address_id =  $req->input('Unit_id');
            $ban->banner_position = $req->input('BannerPosition');
            $ban->description = $req->input('Description');
            // $ban->status = $req->input('Status');
            
            if($req->hasFile('AddBannerImage') )
            {
                $imagePath = $req->file('AddBannerImage')->store('images', 'public');
                
                    # code...
                    // $imagePath = $image->store('images', 'public');

                    $ban->banner_image = $imagePath;
                
                // foreach($req->file('AddBannerImage') as $key => $value1)
                // {
                //     $imageName1 = 'Banner_'.rand(1001,9999) . '.' . $value1->getClientOriginalExtension();
                //     $value1->move('admin/assets/img/',$imageName1);
                //     $imagedata1[] = $imageName1;
                //     // return $imagedata1[0];
                // }
                // $ban->banner_image = $imagedata1[0];
                
            }
    
            $ban->save();
            $req->session()->flash('success',"Banner added successfully");      // success / error
           
            $approval = new Approval();
            $approval->admin_id = $admin_id;
            $approval->address_id = $req->input('Unit_id');
            $approval->description = "Request to add banner";
            $approval->status = 0;
            $approval->approvable_id = $ban->id;
            $approval->approvable_type = Banner::class;
            
            // return $approval;
            $approval->save();

            return redirect('admin/banner');
        
    }

    public function editBannerData(Request $request)
    {
        $id = $request->input('id');
        $status = '1';
        $data = Banner::leftJoin('addresses', 'uc_banners.address_id', '=', 'addresses.id')
            ->where('uc_banners.id',$id)
            ->select('uc_banners.*', 'addresses.center')
            // ->where('status',1)
            ->first();
        
        // return $data;
        return response()->json([$data,'success' => 'edit successfully.']);
        // return $data = DB::select("SELECT * FROM td_main_banner_mgt WHERE ID='$id' AND delete_status='$status' ");
    }
      
    //UPDATE
     
    public function bannerUpdate(Request $req)
    {
        // return $req->file('editbannerimage');
        $id = $req->input('editbannerid');
        // return $id;
        $BannerName = $req->input('EditBannerName');
        $BannerPosition = $req->input('EditBannerPosition');
        $Description = $req->input('EditDescription');

        // Check if the banner position already exists for a different banner
        // $isExist = Banner::findOrFail($id);
        
        $banner = Banner::findOrFail($id);
        $banner->banner_position = $BannerPosition;
        $banner->description = $Description;
        $banner->banner_name = $BannerName;

        // return 'dsbkdbs';
        // return $req->file('editbannerimage');
        if ($req->hasFile('editbannerimage')) {
            // return 'djvsl';
            $image = $req->file('editbannerimage');

            if ($banner->banner_image) {
                Storage::disk('public')->delete($banner->editbannerimage);
                
                $imagePath = $image->store('images', 'public');
                // return $imagePath;
                $banner->banner_image = $imagePath;
            }
           
        }

        $banner->save();

        $req->session()->flash('success', 'Banner updated successfully');
        return redirect('admin/banner');
    
    }

      
      // delete
     public function bannerDelete($id)
      {
          $status = '0';
        //   DB::delete('delete from td_main_banner_mgt where ID = ? ',[$id]);
           DB::update('update uc_banners set status = ? where ID = ?',[$status,$id]);
          session()->flash('success','Banner deleted successfully');       // success / error
          return redirect('admin/banner');
        //  $softdelete = Banner::find($id)->delete();
        // return Redirect()->back()->with('success','Banner deleted successfully');
      }
      
      
    public function Status(Request $req,$ID)
    {
        $statusdata = DB::select("select status from td_main_banner_mgt where banner_id='$ID' ");
        foreach($statusdata as $key=>$value)
        {
            $status = $value->status;
        }
        
        if($status == '1')
        {
            $status='0';
        }
        else
        {
            $status='1';
        }
        // return $status;
        DB::update('update td_main_banner_mgt set status = ? where banner_id = ?',[$status,$ID]);
        $req->session()->flash('success','Status updated successfully');     // success / error
        return Redirect()->back();
    }
    
    // Validation start
    
    // public function checkAddBannerName($name)
    // {
    //     $data = DB::select("SELECT * FROM td_main_banner_mgt WHERE banner_title='$name' AND delete_status<>'0' ");
    //     if($data)
    //     {
    //        return $status = 'error';
    //     }
    //     else
    //     {
    //        return $status = 'success';
    //     }
    // }
    
    public function checkEditBannerName($id,$name)
    {
        // return $name;
        // $data = DB::select("SELECT * FROM  uc_banners WHERE id<>'$id' AND banner_name='$name' AND status<>'0'");
        $data = Banner::where('id',$id)->where('banner_name',$name)->first();
        // return $data;
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }
    
    public function checkAddBannerPosition($name)
    {
        $data = DB::select("SELECT * FROM uc_banners WHERE banner_position='$name' AND 'status' <>'0' ");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }
    
    public function checkEditBannerPosition($id,$name)
    {
        $data = DB::select("SELECT * FROM td_main_banner_mgt WHERE ID<>'$id' AND banner_position='$name' AND delete_status<>'0'");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }
}
