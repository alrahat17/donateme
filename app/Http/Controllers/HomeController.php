<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Donation;
use App\Testimonial;
use App\Category;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Stripe\Charge;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show_welcome_page', 'show_about_page','show_campaigns','show_campaign_details','show_categories','show_blogs','show_campaign_by_category']]);
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
         
        $user_id = Auth::id();
        $user = $user=User::find($user_id);
        return view('home')->with('user',$user);
        
    }

    public function show_welcome_page(){

        $categories = Category::orderBy('id','desc')->get();

        $campaigns = Campaign::orderBy('id','desc')->take(3)->get();

        $donations = Donation::orderBy('id','desc')->where('payment_status',1)->take(4)->get();
        $testimonials = Testimonial::orderBy('id','desc')->take(3)->get();
        return view('welcome')->with('campaigns',$campaigns)->with('donations',$donations)->with('testimonials',$testimonials)->with('categories',$categories);
    }

    public function show_about_page(){

        return view('about');
    }

    public function show_campaigns(){

        $campaigns = Campaign::paginate(6);

        return view('all_campaigns')->with('campaigns',$campaigns);
    }

    public function show_categories(){

        $categories = Category::paginate(12);
        
        return view('all_categories')->with('categories',$categories);
    }

    public function show_blogs(){

        $blogs = Blog::paginate(3);

        return view('all_blogs')->with('blogs',$blogs);
    }

    public function update_profile(Request $request, $id){

       //   $this->validate($request,[
       //     'name'=>'required|string|max:255|min:5',       
       //     'user_name'=>'required|string|max:255|min:3',       
       //     'email'=>'required|string|max:255|email',       
       //     'phone'=>'required|string|min:7|max:255',       
       //     'user_type'=>'required|string',
       //     'photo'=>'image|mimes:jpeg,jpg,png|max:1000',
       //     'password'=>'string|min:6|nullable',             
       // ]);


        $user=User::find($id);
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        //$user->user_type = $request->input('user_type');
        //$user->password = Hash::make($request->input('password'));
        
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
        return redirect::to('/home');

    }

        public function show_campaign_details($id){

            $campaign = Campaign::find($id);
            $donation = Donation::where('campaign_id',$id)->get();
            //$user = User::where('email',$don_email)->get();


            return view('campaign_details')->with('campaign',$campaign)->with('donation',$donation);
        }

        public function show_my_campaigns(){

        $uid = Auth::user()->id;
        $campaigns = Campaign::where('user_id',$uid)->get();

        return view('my_campaigns')->with('campaigns',$campaigns);
        }

        public function show_my_comments(){

            return view('my_comments');
        }
        public function show_my_donations(){

        $uid = Auth::user()->id;
        
        $cam = Campaign::where('user_id', '=', $uid)
            ->select('id')
            ->get();
        

        foreach ($cam as $value) {
        $x = $value->id;
        }
        // echo $x;
        // die;


       $donations = Donation::where('campaign_id',$x)->get();

        

    

        return view('my_donations')->with('donations',$donations);

        }
        public function show_my_withdrawals(){

            return view('my_withdrawals');
        }

        public function show_campaign_by_category($id){

        $campaigns = Campaign::where('category_id',$id)->get(); 

        return view('campaign_by_category')->with('campaigns',$campaigns);
        }

        public function create_campaign(){

        $categories = Category::all();

        return view('create_campaign')->with('categories',$categories);
        }

        public function save_campaign(Request $request){

        $cam_img = $request->file('cam_img');
        $cam_img_name = time().'.'.$cam_img->getClientOriginalExtension();
        $upload_path = 'cam_image/';
        $cam_img_fullname = $upload_path.$cam_img_name;
        $cam_img->move($upload_path,$cam_img_fullname);
        

        $campaign = new Campaign;
        $campaign->cam_name = $request->input('cam_name');
        $campaign->cam_loc = $request->input('cam_loc');
        $campaign->cam_img = $cam_img_fullname;
        $campaign->user_id = $request->input('user_id');
        $campaign->category_id = $request->input('category_id');
        //$campaign->funds_raised = $request->input('funds_raised');
        $campaign->goal = $request->input('goal');
        //$campaign->cam_status = $request->input('cam_status');
        //$campaign->approve_cam = $request->input('approve_cam');
        $campaign->save();
        return redirect('/my_campaigns');

        }

        public function create_donation(){

       // $campaigns = Campaign::all();

        return view('create_donation');
        }

        public function generate_token(Request $request){

           
        \Stripe\Stripe::setApiKey("sk_test_tTyXzkXPQNNGkkzAWoBW3TKv");
    // Get the credit card details submitted by the form
        $token = $request->stripeToken;
        $amount = $request->don_amount;
    // Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // Amount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }
      //Create the donation
       // Donation::makeDonation();/**/
        //redirect user to some page

        $donation = new Donation;
        $donation->campaign_id = 3;
        $donation->cam_owner_id = 4;
        $donation->user_id = Auth::user()->id;
        $donation->don_full_name = Auth::user()->name;
        $donation->user_email = Auth::user()->email;
        $donation->don_amount = $amount;
        $donation->payment_type = 'stripe';
        $donation->payment_date = '8/12/2018';
        $donation->payment_status = 1;
        $donation->save();
       
        return "Donation completed";
    }


    // public function makeDonation(Request $request){

    //     $donation = new Donation;
    //     $donation->campaign_id = 3;
    //     $donation->cam_owner_id = 4;
    //     $donation->user_id = Auth::user()->id;
    //     $donation->don_full_name = Auth::user()->name;
    //     $donation->user_email = Auth::user()->email;
    //     $donation->don_amount = $amount;
    //     $donation->payment_type = 'stripe';
    //     $donation->payment_date = date();
    //     $donation->payment_status = 1;
    //     $donation->save();
    //     return redirect('/home');


    // }

}
