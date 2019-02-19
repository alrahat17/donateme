<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Campaign;
use App\Donation;
use App\HTTP\Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Purifier;

use Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $current_date = Carbon::now();
        $campaigns = Campaign::all(); 

        return view('campaigns.index')->with('campaigns',$campaigns)->with('current_date',$current_date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        return view('campaigns.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        

        $this->validate($request,[

            'cam_name'=>'required|max:255|string|min:6',
            'cam_loc'=>'required|max:255|string|min:3',
            'cam_img'=>'required|image|mimes:jpeg,jpg,png|max:1000',
            'cam_img_2'=>'image|mimes:jpeg,jpg,png|max:1000|nullable',
            'video'=>'url|nullable',
            'cam_des'=> 'string|max:2000',
            'user_id'=>'required|max:255|string|min:3',
            'category_id'=>'required|max:255|string',
            'goal'=>'required|integer',
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
        $campaign->cam_des = Purifier::clean($request->input('cam_des'));
        $campaign->user_id = Auth::user()->id;
        $campaign->category_id = $request->input('category_id');
        $campaign->goal = $request->input('goal');
        $campaign->cam_date  = $request->input('cam_date');
        $campaign->save();
        return redirect('/campaigns');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::find($id);
        $categories = Category::all();
        return view('campaigns.edit')->with('campaign',$campaign)->with('categories',$categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   


       $campaign=Campaign::find($id);
        $this->validate($request,[

            'cam_name'=>'required|max:255|string|min:6',
            'cam_loc'=>'required|max:255|string|min:3',
            'cam_img'=>'image|mimes:jpeg,jpg,png|max:1000',
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
        else{
        $cam_img_fullname_2 = '';
        }

        
        
                
        $campaign->cam_name = $request->input('cam_name');
        $campaign->cam_loc = $request->input('cam_loc');
        $campaign->cam_des = Purifier::clean($request->input('cam_des'));       
        $campaign->category_id = $request->input('category_id');
        $campaign->video = $request->input('video');
        $campaign->goal = $request->input('goal');


        $campaign->update();
        return redirect('/campaigns');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       
        $campaign = Campaign::find($id);
        $campaign->delete();
        //unlink($campaign->cam_img);
        return redirect('/campaigns');
    }

    public function approve_cam(Request $request,$id){

        $campaign = Campaign::find($id);
        $campaign->where('id',$id)->update(['cam_status'=>1]);
        return redirect('/campaigns');
    }

    public function finalize_cam(Request $request,$id){

        $campaign = Campaign::find($id);
        $campaign->where('id',$id)->update(['cam_status'=>2]);
        return redirect('/campaigns');
       
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
