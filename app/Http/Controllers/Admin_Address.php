<?php

namespace App\Http\Controllers;
use App\Models\{Address,State};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Helpers;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse as BaseRedirectResponse;

class Admin_Address extends Controller
{
    //View

    public function view()
    {  
        
        $data = DB::select("SELECT a.*, s.state_name  FROM `addresses` AS a LEFT JOIN states AS s ON a.state_id = s.ID WHERE a.status = 1 AND a.delete_status=1 ORDER BY a.ID DESC");
        $State = State::where('delete_status', '1')->where('status', '1')->orderBy('ID', 'ASC')->get();
        return view('admin/address', ['data'=>$data,'State'=>$State]);

    }


    //Add

    public function add(Request $req)
    {   
            
        $Address = new Address; 
        $Address->state_id =  $req->input('state_id');
        $Address->center =  $req->input('center');
        $Address->address =  $req->input('address');
        $Address->contact =  $req->input('contact');
        $Address->email =  $req->input('email');
        $Address->facebook =  $req->input('facebook');
        $Address->insta =  $req->input('insta');
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        
        $Address->created_at =  $date;
        $Address->updated_at =  $date;
        $result = $Address->save();
        
        if($result)
        {
            return Redirect()->back()->with('success','Address added successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
        
    }

    public function get($id)
    {
        $status = '1';
        return Address::where('ID',$id)->where('delete_status',$status)->get();
    }
    
      
    //UPDATE
        
      public function update(Request $req)
      {
        $id = $req->input('address_id');
        $state_id =  $req->input('state_id');
        $center =  $req->input('center');
        $address =  $req->input('address');
        $contact =  $req->input('contact');
        $email =  $req->input('email');
        $facebook =  $req->input('facebook');
        $insta =  $req->input('insta');
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        
        $result = Address::where('ID',$id)->update(['state_id'=>$state_id,'center'=>$center,
        'address'=>$address,'contact'=>$contact,'email'=>$email,'facebook'=>$facebook,'insta'=>$insta, 'updated_at'=>$date]);
        
        if($result)
        {
            return Redirect()->back()->with('success','Address updated successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
      }
      
      
    // delete
    public function delete_Address($id)
    {
        $status = '0';
        
        $result = Address::where('ID',$id)->update(['delete_status'=>$status]);
        
        if($result)
        {
            return Redirect()->back()->with('success','Address deleted successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
    }
    
    
    public function status(Request $req,$ID)
    {
        $statusdata = DB::select("select status from addresses where ID='$ID' ");
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
        
        $result = Address::where('ID',$ID)->update(['status'=>$status]);
        
        if($result)
        {
            return Redirect()->back()->with('success','Status updated successfully');
        }
        else
        {
            return Redirect()->back()->with('error','Something Went Wrong');
        }
        
    }
    
    // Validation start
    
    public function checkadd($name)
    {
        $data = DB::select("SELECT * FROM addresses WHERE Address_name='$name' AND delete_status<>'0' ");
        if($data)
        {
           return $status = 'error';
        }
        else
        {
           return $status = 'success';
        }
    }
    
    public function checkedit($id,$name)
    {
        $data = DB::select("SELECT * FROM addresses WHERE ID<>'$id' AND Address_name='$name' AND delete_status<>'0' ");
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

?>