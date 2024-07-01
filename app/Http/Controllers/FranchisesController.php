<?php

namespace App\Http\Controllers;

use App\Models\Franchises;
use Illuminate\Http\Request;

class FranchisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        if($req -> check!='')
        {
            $checkData = $req -> check;
        }
        else
        {
            $checkData='0';
        }
        Franchises::insert([
            'name' => $req -> name,
            'contact' => $req -> contact,
            'email' => $req -> email,
            'address1' => $req -> address1,
            // 'address2' => $req -> address2,
            'city' => $req -> city,
            'state' => $req -> state,
            'district' => $req -> district,
            'zip' => $req -> zip,
            'check' => $checkData
        ]);
        
        $req->session()->flash('success','Data submitted successfully');
        return Redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Franchises  $franchises
     * @return \Illuminate\Http\Response
     */
    public function show(Franchises $franchises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Franchises  $franchises
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchises $franchises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Franchises  $franchises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Franchises $franchises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Franchises  $franchises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Franchises $franchises)
    {
        //
    }
}
