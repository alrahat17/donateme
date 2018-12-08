<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use Datatables;

use yajra\Datatables\Datatables;
use App\HTTP\Requests;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin');
    }

    public function all_user(){

        return view('users.index');
        
    }


    public function getUsers(){

        $users = User::select(['id','photo', 'name','user_name', 'email', 'phone', 'user_type']);

        return Datatables::of($users)

        ->addColumn('action', function ($user) {
            return '<a href="/users/'.$user->id.'/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a><a href="/delete_user/'.$user->id.'" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
        })


        //->editColumn('id', 'ID: {{$id}}')        
        ->make(true);
    }
    

    public function create_user(){

        return view('users.create');

    }
    public function save_user(Request $request){

        $this->validate($request,[
           'name'=>'required|string|max:255|min:5',       
           'user_name'=>'required|string|max:255|min:3',       
           'email'=>'required|string|max:255|email|unique:users',       
           'phone'=>'required|string|min:7|max:255',       
           'user_type'=>'required|string',
           'photo'=>'image|mimes:jpeg,jpg,png|max:1000',       
           'password'=>'required|string|min:6|confirmed',       
       ]);


        
        if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photo_name = time().'.'.$photo->getClientOriginalExtension();
        $upload_path ='user_photo/';
        $photo_fullname = $upload_path.$photo_name;
        $photo->move($upload_path,$photo_fullname);                
        }

        if (!file_exists('photo')) {
            $photo_fullname = 'user_photo/1543383598-profile.png';
        }
        
       
       

       


        $user = new User;
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->user_type = $request->input('user_type');
        $user->photo = $photo_fullname;
        
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/all_user');
    }
    public function edit_user($id){
        $user=User::find($id);
        return view('users.edit')->with('user',$user);
    }

    public function update_user(Request $request, $id){

         $this->validate($request,[
           'name'=>'required|string|max:255|min:5',       
           'user_name'=>'required|string|max:255|min:3',       
           'email'=>'required|string|max:255|email',       
           'phone'=>'required|string|min:7|max:255',       
           'user_type'=>'required|string',
           'photo'=>'image|mimes:jpeg,jpg,png|max:1000',
           'password'=>'string|min:6|nullable',             
       ]);


        $user=User::find($id);
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->user_type = $request->input('user_type');
        $user->password = Hash::make($request->input('password'));
        
        if($request->hasFile('photo'))
        {
            $profileImage = $request->file('photo');
            $profileImageSaveAsName = time()  . "-profile." . 
            $profileImage->getClientOriginalExtension();
            $upload_path = 'user_photo/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
            $user->photo = $profile_image_url;
        }
        
        $user->update();
        return redirect::to('/all_user');

    }

    

    public function delete_user($id){
        DB::table('users')
        ->where('id',$id)
        ->delete();
        
        //unlink($user->photo);
        return Redirect('/users')->with('alert','User Deleted');
    }

    public function check(Request $request)
    {
     if($request->get('email'))
     {
      $email = $request->get('email');
      $data = DB::table("users")
       ->where('email', $email)
       ->count();
      if($data > 0)
      {
       echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
     }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


}
