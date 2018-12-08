<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Campaign;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $campaigns= Campaign::all();
        return view('campaigns.index')->with('campaigns',$campaigns);
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
            'cam_img'=>'required|image|mimes:jpeg,jpg,png',
            'user_name'=>'required|max:255|string|min:3',
            'category_id'=>'required|max:255|string',
            'funds_raised'=>'required|integer',
            'goal'=>'required|integer',
            'cam_status'=>'required|max:255|string',
            'approve_cam'=>'required',
        ]);


        $cam_img = $request->file('cam_img');
        $cam_img_name = time().'.'.$cam_img->getClientOriginalExtension();
        $upload_path = 'cam_image/';
        $cam_img_fullname = $upload_path.$cam_img_name;
        $cam_img->move($upload_path,$cam_img_fullname);
        

        $campaign = new Campaign;
        $campaign->cam_name = $request->input('cam_name');
        $campaign->cam_loc = $request->input('cam_loc');
        $campaign->cam_img = $cam_img_fullname;
        $campaign->user_name = $request->input('user_name');
        $campaign->category_id = $request->input('category_id');
        $campaign->funds_raised = $request->input('funds_raised');
        $campaign->goal = $request->input('goal');
        $campaign->cam_status = $request->input('cam_status');
        $campaign->approve_cam = $request->input('approve_cam');
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
            'cam_img'=>'image|mimes:jpeg,jpg,png',
            'user_name'=>'required|max:255|string|min:3',
            'category_id'=>'required',
            'funds_raised'=>'required|integer',
            'goal'=>'required|integer',
            'cam_status'=>'required|max:255|string',
            'approve_cam'=>'required',
        ]);



        if ($request->hasFile('cam_img')) {
        $cam_img = $request->file('cam_img');
        $cam_img_name = time().'.'.$cam_img->getClientOriginalExtension();
        $upload_path = 'cam_image/';
        $cam_img_fullname = $upload_path.$cam_img_name;
        $cam_img->move($upload_path,$cam_img_fullname);
         $campaign->cam_img = $cam_img_fullname;
        }
        

        
        $campaign->cam_name = $request->input('cam_name');
        $campaign->cam_loc = $request->input('cam_loc');       
        $campaign->user_name = $request->input('user_name');
        $campaign->category_id = $request->input('category_id');
        $campaign->funds_raised = $request->input('funds_raised');
        $campaign->goal = $request->input('goal');
        $campaign->cam_status = $request->input('cam_status');
        $campaign->approve_cam = $request->input('approve_cam');
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
        $campaign=Campaign::find($id);
        $campaign->delete();
        unlink($campaign->cam_img);
        return redirect('/campaigns');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
