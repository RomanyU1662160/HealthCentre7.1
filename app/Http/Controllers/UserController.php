<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\User;
use App\Http\Requests\NewStaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate(3);
      return view('user.index',compact('users'));
    }



    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('user.page',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('user.profile.edit_profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request,[
          'title'   => 'required',
          'fname'   => 'required|string|max:20',
          'lname'   => 'required|string|max:20',
          'mobile'  => 'required|max:11',
          'email'   => 'required|email',
          'house'   => 'required|max:4',
          'address' => 'required',
          'postcode'=> 'required|max:10',
        ]);
          $user->update([
            'title'   => $request->input('title'),
            'fname'   => $request->input('fname'),
            'lname'   => $request->input('lname'),
            'mobile'  => $request->input('mobile'),
            'email'   => $request->input('email'),
            'house'   => $request->input('house'),
            'address' => $request->input('address'),
            'postcode'=> $request->input('postcode'),
          ]);
          return redirect()->back()->with('success', ' Profile updated successfully.')
          ->with('user',$user);

    }



        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
      public function create()
      {

        return view('user.profile.add_new');
      }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
      public function store( NewStaffRequest $request)
      {


        $staffNumber = strtoupper(substr(request()->fname,0,1)). request()->lname.studly_case(date('d-m-y',strTotime(request()->dob)));
         $password    = studly_case(date('d-M-y',strTotime(request()->dob)));
        //dd($password);
        $user =   User::create([
          'staff_number' =>$staffNumber,
          'password'=> Hash::make($password),
          'role_id' =>$request->input('role'),
          'title'   => $request->input('title'),
          'fname'   => $request->input('fname'),
          'lname'   => $request->input('lname'),
          'dob'     => $request->input('dob'),
          'gender'  => $request->input('gender'),
          'mobile'  => $request->input('mobile'),
          'email'   => $request->input('email'),
          'postcode'=> $request->input('postcode'),
          'house'   => $request->input('house'),
          'address' => $request->input('address'),


        ]);
//return redirect()->back()->with('success', 'New Patient Added Susccefully');
return redirect()->route('user.page',$user)
->with('success','New Staff Member Successfully Created.')
->with('info', " ||  Your password is  {$password}  ||")
->with('info', " ||  your staff_number is {$staffNumber}  || ");


}
      public function ShowDelete(User $user){
        return view('user.profile.remove_profile',compact('user'));
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
      return redirect()->route('home')->with('success','User Profile Deleted');
    }

/*
 * Show the Add/Edit Image profile page
*/
    public function showAvatar(User $user){
      return view('user.profile.add_avatar',compact('user'));
    }

}
