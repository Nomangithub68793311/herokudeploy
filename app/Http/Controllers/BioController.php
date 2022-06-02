<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use Illuminate\Http\Request;

class BioController extends Controller
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
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bio=new Bio();
        $bio->address=$request->address;
        $bio->country=$request->country;
        $bio->zipcode=$request->zipcode;
        $bio->phone=$request->phone;

        // if($request->hasFile('profile_image')){
        //     $file=$request->file('profile_image');
        //     $extension=$file->getClientOriginalExtension();
        //     $filename=time().'.'.$extension;
        //     $file->move('uploads/students/', $filename);
        //     $bio->profile_image=$filename;
        // }
        $bio->save();
        return ($bio);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bio  $bio
     * @return \Illuminate\Http\Response
     */
    public function show(Bio $bio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bio  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit(Bio $bio)
    {
        //
    }
    public function detete($id)
    {
        try{
            $user= Bio::find($id);
            $user->delete();
            return response()->json(['success'=>true,'message'=>'deleted succesfully']);

        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'error']);

        }


    }

    public function update(Request $request, $id)
    {
        try{
            Bio::where("id", $id)->update(["address" => $request->address,
            "country" => $request->country,
            "zipcode" => $request->zipcode,
            "phone" => $request->phone
        ]);

            return response()->json(['success'=>true,'message'=>'updated  succesfully']);

        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'error']);

        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bio  $bio
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bio  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bio $bio)
    {
        //
    }
}
