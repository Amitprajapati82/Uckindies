<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class BannerController extends Controller
{
    //
    public function index()
    {
        $State_id = '';
        if(Session::has('State')){

            $data = Session::get('State');
            $State_id = $data->role_id;

        }elseif(Session::has('Admin')){

            $data = Session::get('Admin');
            $State_id = $data->role_id;
        }
        // return $State_id;
        $bannerData = Banner::where('state_id',$State_id)->where('status',1)->get();
        // return $bannerData;
        return view("admin.banner",compact('bannerData'));
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
        // return $req->all();  
        // return $req->file('AddBannerImage');
        
            $BannerPosition =  $req->input('BannerPosition');            
            $isExist = Banner::select("*")
                        ->where("banner_position", "$BannerPosition")
                        ->exists();
        if($isExist)
        {
            // echo "Data already exits";
            $req->session()->flash('error',"Duplicate data. please change banner position");      // success / error
            return redirect('/admin/banner');
        }
        else
        {  
            $ban = new Banner;
            $ban->banner_name =  $req->input('BannerName');
            $ban->banner_position = $req->input('BannerPosition');
            $ban->description = $req->input('Description');
            // $ban->status = $req->input('Status');
            
            // return $req->file('AddBannerImage');
            if($req->hasFile('AddBannerImage') )
            {
              
                foreach($req->file('AddBannerImage') as $key => $value1)
                {
                    $imageName1 = 'Banner_'.rand(1001,9999) . '.' . $value1->getClientOriginalExtension();
                    $value1->move('admin/assets/img/',$imageName1);
                    $imagedata1[] = $imageName1;
                }
                $ban->banner_image = $imagedata1[0];
                
            }

            // if($req->hasFile('AddBannerImage'))
            // {
            //     $image = $req->file('AddBannerImage');
            //     $filename = time() . '.' . $image->getClientOriginalExtension(); //getting image extension
            //     $image->move('admin/assets/img/admin/banner/',$filename);
            //     $ban->banner_image = $filename;
            // }
            // else
            // {
            //     $ban->banner_image = '';
            // }
                
            $ban->save();
             $req->session()->flash('success',"Banner added successfully");      // success / error
            //  print_r($req->session());
            return redirect('admin/banner');
        }
    }

    public function editBannerData(Request $request)
    {
        $id = $request->input('id');
        $status = '1';
        $data = Banner::where('id',$id)->where('status',1)->first();
        return response()->json([$data,'success' => 'edit successfully.']);
        // return $data = DB::select("SELECT * FROM td_main_banner_mgt WHERE ID='$id' AND delete_status='$status' ");
    }
      
    //UPDATE
        
      public function bannerUpdate(Request $req)
      {
        //   return $req->editbannerimage1;
        //   $req->validate([
        //       'editbannerimage1' => 'image|mimes:jpeg,png,jpg|max:2048',
        //   ]);
          
        //  $ID = Banner::find($req->input('editbannerid'));
         

         
        //   if($req->hasFile('editbannerimage1'))
        //   {
        //       // $path = $req->file('image')->store('profile');
        //       $image = $req->file('editbannerimage1');
        //       $filename = time() . '.' . $image->getClientOriginalExtension(); //getting image extension
        //       $image->move('admin/assets/img/admin/banner/',$filename);
        //       $ban->image = $filename;
        //       $image = $filename;
        //   }
  
          $id = $req->input('editbannerid');
          $BannerName = $req->input('EditBannerName');
          $BannerPosition = $req->input('EditBannerPosition');
          
          $Description = $req->input('EditDescription');
        //   $Status = $req->input('EditStatus');
          
        //   $isExist = Banner::select("*")
        //                   ->where("banner_position", "$BannerPosition")
        //                   ->where("ID",'!=',"$id")
        //                   ->exists();
        $isExist = Banner::where('banner_position', $BannerPosition)
                     ->where('id', $id)
                     ->exists();
                    //  return $isExist;
        // return $isExist;
            // $isExist = DB::select("select status from td_main_banner_mgt where ID<>'$id' AND banner_position='$BannerPosition'");
          if($isExist)
          {
            // return 'gfdgid';
              // echo "Data already exits";
              $req->session()->flash('error',"Duplicate data. please change banner position");      // success / error
              return redirect('/admin/banner');
          }
          else
          {  
              if($req->hasFile('editbannerimage1'))
              {
                //   return 'image exists';
                    if($req->hasFile('editbannerimage1') )
                    {
                    //   return 'image exits';
                        foreach($req->file('editbannerimage1') as $key => $value1)
                        {
                            $imageName1 = 'Banner_'.rand(1001,9999) . '.' . $value1->getClientOriginalExtension();
                            $value1->move('admin/assets/img/admin/banner/',$imageName1);
                            $imagedata1[] = $imageName1;
                        }
                        $image = $imagedata1[0];
                    }
                  
                  DB::update('update td_main_banner_mgt set banner_image = ? where ID = ?',[$image,$id]);
              }
              return 'no image';
             
            DB::update('update td_main_banner_mgt set banner_position = ?,description = ?,banner_title = ? where ID = ?',[$BannerPosition,$Description,$BannerName,$id]);
              
              
            //   return 'no data';
              $req->session()->flash('success','Banner updated successfully');     // success / error
            //   return Redirect()->back()->with('success','Details updated successfull');
              return redirect('admin/banner');
  
          }
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
