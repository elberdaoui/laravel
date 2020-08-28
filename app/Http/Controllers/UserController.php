<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Validator;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

	public function profile()
    {
        $users = User::all();
        return view('user.profile',  compact('users'));
    }

	public function changepassword()
    {
        $users = User::all();
        return view('user.changepassword', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateprofile(Request $request, $id)
    {
        $user =  User::find($id);

        if($request->hasFile('picture_user')){
            $path = $request->file('picture_user')->store('users');
            $user->profile_image = $path;
        }
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->description = $request['user_description'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->save();

        session()->flash('succes','Profile updated succefuly');
        return redirect()->back();
    }

    public function updatePassword(Request $request, $user_id)
    {
        $rules = array(
                    'old_password'       =>  'required|string|min:6',
                    'new_password'       =>  'required|string|min:6',
                    'confirm_password'       =>  'required|same:new_password'
                    );

        $validator = Validator::make(Input::only('old_password', 'new_password', 'confirm_password'), $rules);

        if($validator->fails())
        {
             return redirect('changepassword')->with('error', 'new password & confirm Password must be 6 Characters !');
        } else
            {
                $users = User::where('user_id', '=', $user_id)->first();
                if (Hash::check(Input::get('old_password'), $users->password))
                {
                    if(Input::get('new_password') == Input::get('confirm_password'))
                    {
                        $users->password =Hash::make(Input::get('new_password'));
                        $users->save();
                        return redirect('changepassword')->with('success' , 'Password changed Successfully !');
                    }else
                    {
                        return redirect('changepassword')->with('error', 'New password and Confirm password did not match !');
                    }
                }else
                {
                    return redirect('changepassword')->with('error','Current password is incorrect !');
                }
            }

    }
    //go to users edit page
    public function create(){
        return view('user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store user
    public function store(Request $request){
        $user = new User();

        if($request->hasFile('picture_user')){
            $path = $request->file('picture_user')->store('users');
        }
        $user->username = $request['user_name'];
        $user->password = Hash::make($request['password']);
        // $user->description = $request['user_description'];
        $user->email = $request['email'];
        $user->profile_image = $path;
        $user->role = $request['role'];
        $user->save();


        session()->flash('succes','User added succefuly');
        return redirect()->back();
    }
    /**
     * Display the list of user
     *
     *
     */
    public function listusers(){
        $users = User::all();
        return view('user.listUsers',['users'=>$users]);
    }

    /**
     * go to user edit page
    */
    public function userEdit($id){
        $user = User::find($id);
        return view('user.edit',['user'=>$user]);
    }


    /* update user*/
    public function userUpdate(Request $request,$id)
    {

        $user =  User::find($id);

        if($request->hasFile('picture_user')){
            $path = $request->file('picture_user')->store('users');
            $user->profile_image = $path;
        }

        $user->username = $request['user_name'];
        $user->password = Hash::make($request['password']);
        $user->description = $request['user_description'];
        $user->email = $request['email'];

        $user->role = $request['role'];
        $user->save();

        session()->flash('succes','User updated succefuly');
        return redirect()->back();
    }
    /*Delete user*/
    public function userDestroy($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('succes','User Delete succefuly');
        return redirect()->back();
    }
}
