<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = Approval::where('status',0)->get();
        return view('admin.request',compact('data'));
    }
}
