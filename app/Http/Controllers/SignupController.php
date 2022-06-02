<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use App\Models\Bio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['success'=>true, 'message' => 'Successfully Singned Up']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //  return response()->json(['success'=>false, 'message' => 'Email Exists']);

        $found=Signup::where('email','=',$request->email)->first();
        if($found){
            return response()->json(['success'=>false, 'message' => 'Email Exists']);

        }
        $user=new Signup();
        $user->fullname=$request->fullname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->gender=$request->gender;
        $user->birth_date=$request->birth_date;
        $user->save();
        $token=$user->createToken('myapptoken')->plainTextToken;
        return response()->json(['success'=>true,'token'=>$token, 'message' => 'Successfully Singned Up']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function show(Signup $signup)
    {
        //
    }

    public function login(Request $request)
    {
        $user = Signup::where('email', '=', $request->email)->first();
    if (!$user) {
       return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
    }
    if (!Hash::check($request->password, $user->password)) {
       return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
    }
       return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
   }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function edit(Signup $signup)
    {
        //
    }
    public function test()
    {
        return response()->json(['success'=>true,'message'=>'middle ware success']);

    }
    public function usersAll()
    {
        $allusers=Signup::all();
        return response()->json(['success'=>true,'message'=>'middle ware success','users'=>$allusers]);

    }
    public function biosAll()
    {        
        $allbios=Bio::all();
        return response()->json(['success'=>true,'message'=>'middle ware success','users'=>$allbios]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signup $signup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signup $signup)
    {
        //
    }
}
