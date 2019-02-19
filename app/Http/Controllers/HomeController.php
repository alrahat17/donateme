<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Donation;
use App\Testimonial;
use App\Category;
use App\Blog;
use App\User;
use App\Gallery;
use App\General_setting;
use App\Payment_setting;
use App\Contact_message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Stripe\Charge;
use Carbon\Carbon;
use Stripe\Error\Card;
use App\Comment;
use App\HTTP\Requests;
use Illuminate\Support\Facades\Hash;
use Alert;
use Purifier;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('verified',['except' => ['show_welcome_page', 'show_about_page','show_become_volunteer_page','show_contact_us_page','save_contact_message','show_give_donation_page','show_give_scholarship_page','show_gallery_page','show_campaigns','show_campaign_details','show_categories','show_blogs','show_campaign_by_category','show_blog_details']]);
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

      $user_id = Auth::id();
      $user=User::find($user_id);
      return view('home')->with('user',$user);

    }

    public function show_welcome_page(){

      $galleries = Gallery::all();
      $general = General_setting::all();
      $categories = Category::orderBy('id','desc')->get();
      $blogs = Blog::orderBy('id','desc')->take(2)->get();
      $users = User::where('user_type','customer')->get();

      $campaigns = Campaign::orderBy('id','desc')->take(3)->get();

      $donations = Donation::orderBy('id','desc')->where('payment_status',1)->take(4)->get();
      $testimonials = Testimonial::orderBy('id','desc')->take(3)->get();
      return view('welcome')->with('campaigns',$campaigns)->with('donations',$donations)->with('testimonials',$testimonials)->with('categories',$categories)->with('galleries',$galleries)->with('general',$general)->with('blogs',$blogs)->with('users',$users);
    }

    public function show_about_page(){

      return view('about');
    }

    public function show_become_volunteer_page(){

      return view('become_volunteer');
    }

    public function show_contact_us_page(){

      $general = General_setting::all('site_address','ggl_map_api_key','email','phone');
      
      return view('contact_us')->with('general',$general);
    }

    public function save_contact_message(Request $request){

      $message = new Contact_message;
      $message->name = $request->name;
      $message->email = $request->email;
      $message->phone = $request->phone;
      $message->message = $request->message;
      $message->save();


       \Mail::to($message->email)->send(new Contact);

      Alert::message('Message Sent!');
      return redirect::to('/contact_us');

    }

    public function show_give_donation_page(){

      return view('give_donation');
    }

    public function show_give_scholarship_page(){

      return view('give_scholarship');
    }

    public function show_gallery_page(){

      $galleries = Gallery::paginate(8);
      return view('gallery')->with('galleries',$galleries);
    }

    public function show_campaigns(){

      $campaigns = Campaign::where('cam_status','!=',0)->orderBy('id','desc')->paginate(6);

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



     $this->validate($request,[
       'name'=>'required|string|max:255|min:5',       
       'user_name'=>'required|string|max:255|min:3',       
       'email'=>'required|string|max:255|email',       
       'phone'=>'required|string|min:7|max:255',       
       'photo'=>'image|mimes:jpeg,jpg,png|max:1000',
       'password'=>'string|min:6|nullable',          
     ]);


     $user=User::find($id);
     $user->name = $request->input('name');
     $user->user_name = $request->input('user_name');
     $user->email = $request->input('email');
     $user->phone = $request->input('phone');
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
    Alert::message('Profile Updated!');
    return redirect::to('/home');

  }

  public function show_campaign_details($id){

    $campaign = Campaign::find($id);
    $donation = Donation::where('campaign_id',$id)->take(4)->get();


    return view('campaign_details')->with('campaign',$campaign)->with('donation',$donation);
  }

  public function show_my_campaigns(){

    $uid = Auth::user()->id;
    $campaigns = Campaign::where('user_id',$uid)->get();
    $current_date = Carbon::now();

    return view('my_campaigns')->with('campaigns',$campaigns)->with('current_date',$current_date);
  }

  public function show_my_comments(){

    $uid = Auth::user()->id;
    $comments = Comment::where('user_id',$uid)->get();

    return view('my_comments')->with('comments',$comments);
  }

  public function show_my_donations(){

    $cam = DB::table('campaigns')->where('user_id',Auth::user()->id)->pluck('id');


    $donations = Donation::whereIn('campaign_id', $cam)->get();   

    return view('my_donations')->with('donations',$donations);

  }
  public function show_my_withdrawals(){

    return view('my_withdrawals');
  }

  public function show_campaign_by_category($id){

    $campaigns = Campaign::where('category_id',$id)->paginate(6); 

    return view('campaign_by_category')->with('campaigns',$campaigns);
  }

  public function create_campaign(){

    $categories = Category::all();
    

    return view('create_campaign')->with('categories',$categories);
  }

  public function save_campaign(Request $request){

    $general_setting = General_setting::all('auto_app_cam');

    $this->validate($request,[

      'cam_name'=>'required|max:255|string|min:6',
      'cam_loc'=>'required|max:255|string|min:3',
      'cam_img'=>'required|image|mimes:jpeg,jpg,png|max:1000',
      'cam_img_2'=>'image|mimes:jpeg,jpg,png|max:1000|nullable',
      'video'=>'url|nullable',
      'category_id'=>'required',
      'goal'=>'required|integer',
      'cam_date'=>'required|date',
      'cam_des' => 'required|min:100|max:5000',
    ]);


    $cam_img = $request->file('cam_img');
    $cam_img_name = time().'.'.$cam_img->getClientOriginalExtension();
    $upload_path = 'cam_image/';
    $cam_img_fullname = $upload_path.$cam_img_name;
    $cam_img->move($upload_path,$cam_img_fullname);

    if ($request->hasFile('cam_img_2')) {
      $cam_img_2 = $request->file('cam_img_2');
      $cam_img_name_2 = time().'.'.$cam_img_2->getClientOriginalExtension();
      $upload_path = 'cam_image_2/';
      $cam_img_fullname_2 = $upload_path.$cam_img_name_2;
      $cam_img_2->move($upload_path,$cam_img_fullname_2);
    }
    else{

      $cam_img_fullname_2 = '';

    }

    
    $campaign = new Campaign;
    $campaign->cam_name = $request->input('cam_name');
    $campaign->cam_loc = $request->input('cam_loc');
    $campaign->cam_img = $cam_img_fullname;
    $campaign->cam_img_2 = $cam_img_fullname_2;
    $campaign->video = $request->input('video');
    $campaign->user_id = $request->input('user_id');
    $campaign->category_id = $request->input('category_id');
    $campaign->goal = $request->input('goal');
    $campaign->cam_date = $request->input('cam_date');
    $campaign->cam_des = Purifier::clean($request->input('cam_des'));
     
    foreach($general_setting as $gen) {
     $cam_status = $gen->auto_app_cam;
    }
    $campaign->cam_status = $cam_status;   
    $campaign->save();
    return redirect('/my_campaigns');
    

  }

  public function edit_campaign($id){

    $categories = Category::all();
    $campaign = Campaign::find($id);
    return view('edit_campaign')->with('campaign',$campaign)->with('categories',$categories);
  }

  public function update_campaign(Request $request, $id){



    $campaign=Campaign::find($id);
    $this->validate($request,[

      'cam_name'=>'required|max:255|string|min:6',
      'cam_loc'=>'required|max:255|string|min:3',
      'cam_img'=>'image|mimes:jpeg,jpg,png',
      'cam_img_2'=>'image|mimes:jpeg,jpg,png|max:1000|nullable',
      'video'=>'url|nullable',
      'category_id'=>'required',
      'goal'=>'required|integer',
    ]);


    if ($request->hasFile('cam_img')) {
      $cam_img = $request->file('cam_img');
      $cam_img_name = time().'.'.$cam_img->getClientOriginalExtension();
      $upload_path = 'cam_image/';
      $cam_img_fullname = $upload_path.$cam_img_name;
      $cam_img->move($upload_path,$cam_img_fullname);
      $campaign->cam_img = $cam_img_fullname;
    }

    if ($request->hasFile('cam_img_2')) {
      $cam_img_2 = $request->file('cam_img_2');
      $cam_img_name_2 = time().'.'.$cam_img_2->getClientOriginalExtension();
      $upload_path = 'cam_image_2/';
      $cam_img_fullname_2 = $upload_path.$cam_img_name_2;
      $cam_img_2->move($upload_path,$cam_img_fullname_2);
      $campaign->cam_img_2 = $cam_img_fullname_2;
    }
    


    $campaign->cam_name = $request->input('cam_name');
    $campaign->cam_loc = $request->input('cam_loc');       
    $campaign->category_id = $request->input('category_id');
    $campaign->goal = $request->input('goal');
    $campaign->cam_date = $request->input('cam_date');
    $campaign->video = $request->input('video');
    $campaign->cam_des = Purifier::clean($request->input('cam_des'));
    $campaign->update();
    return redirect('/my_campaigns');

  }

  public function create_donation($id){

    $campaign = Campaign::find($id);
    $general = General_setting::all('min_amount_dn','max_amount_dn');
    foreach($general as $gen) {
     $min_amount = $gen->min_amount_dn;
     $max_amount = $gen->max_amount_dn;
    }

    return view('create_donation')->with('campaign',$campaign)->with('min_amount',$min_amount)->with('max_amount',$max_amount);
  }

  public function generate_token(Request $request){

    $payment_setting = Payment_setting::all('test_sec_key');
    foreach($payment_setting as $pay) {
     $key = $pay->test_sec_key;
    }
    
    
    \Stripe\Stripe::setApiKey($key);
    // Get the credit card details submitted by the form
    $token = $request->stripeToken;
    $amount = $request->don_amount;
    $campaign_id = $request->cam_id;

    // Create a charge: this will charge the user's card
    $charge = null;
    $jsonerror = null;

    try {
      $charge = \Stripe\Charge::create(array(
                "amount" => $amount*100, // Amount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge",
                
              ));
    } 
    catch (\Stripe\Error\Card $e) {
            // The card has been declined

            // Since it's a decline, \Stripe\Error\Card will be caught
      $body = $e->getJsonBody();
      $err  = $body['error'];
      $jsonerror = json_encode($jsonerror);


      print('Status is:' . $e->getHttpStatus() . "\n");
      print('Type is:' . $err['type'] . "\n");
      print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        //print('Param is:' . $err['param'] . "\n");
      print('Message is:' . $err['message'] . "\n");

        // alert()->warning('Warning', 'Donation Failed.');

    }
    catch (\Stripe\Error\RateLimit $e) {
  // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
    } catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
    }
      //Create the donation
    if ($charge) {

      $donation = new Donation;
      $donation->campaign_id = $campaign_id;
      $donation->user_id = Auth::user()->id;
      $donation->don_full_name = Auth::user()->name;
      $donation->user_email = Auth::user()->email;
      $donation->don_amount = $amount;
      $donation->payment_type = 'stripe';
      $donation->token = $token;
      $donation->payment_date = Carbon::now();
      $donation->payment_status = 1;
      $donation->chargejson = json_encode($charge);
      $donation->save();

      $campaign = Campaign::find($campaign_id);
      $fund = $campaign->funds_raised;
      $fund = $fund + $amount;
      $campaign->funds_raised = $fund;
      $campaign->update();

      return redirect('/donation_status');

    }

    return redirect('/donation_failed');
  }






  public function show_blog_details($id){

    $blog = Blog::find($id);

  return view('blog_details')->with('blog',$blog);
  }


  public function save_comment(Request $request,$id){

    $blog = Blog::find($id);
    $comment = new Comment;
    $comment->blog_id = $id;
    $comment->user_id = Auth::user()->id;
    $comment->message = $request->message;
    $comment->save();

    return redirect('/my_comments');


  }

  public function delete_comment($id){

    $comment = Comment::find($id)->delete();
    return redirect('/my_comments');
  }

  public function donation_status(){

    $donation = Donation::orderBy('id','desc')->LIMIT(1)->get();

    //$donation = Donation::where('user_id',Auth::user()->id)->get();
    return view('/donation_status')->with('donation',$donation);
  }

  public function donation_failed(){

    return view('/donation_failed');
  }






}
