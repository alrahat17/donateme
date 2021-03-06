<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:5'],
            'user_name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required','string','min:7'],
            'user_type' =>['required','string'],
            'photo' =>['image','mimes:jpeg,jpg,png','max:1000'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {    
        $request = request(); 

     if ($request->hasFile('photo')) {       
        $profileImage = $request->file('photo');
        $profileImageSaveAsName = time().$profileImage->getClientOriginalExtension();
        $upload_path = 'user_photo/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);        
        }
    else{

        $profile_image_url = 'user_photo/1543383598-profile.png';

        }

       
    

            
        return User::create([
            'name' => $data['name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'user_type' => $data['user_type'],
            'photo' => $profile_image_url,
            'password' => Hash::make($data['password']),
        ]);
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
}
