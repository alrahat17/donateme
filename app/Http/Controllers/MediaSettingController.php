<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media_setting;
use App\HTTP\Requests;

class MediaSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media_setting = Media_setting::first()->get();
        
        return view('media_settings.index')->with('media_setting',$media_setting);
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
        //
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
        $media_setting = Media_setting::find($id);

        return view('media_settings.edit')->with('media_setting',$media_setting);
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

        $this->validate($request,[
        'img_upload_size' => 'required|integer',
        'mp3_upload_size' => 'required|integer',
        ]);
        $media_setting = Media_setting::find($id);

        $media_setting->img_upload_size = $request->input('img_upload_size');

        if($request->input('img_upload_type')!=''){
         //adding comma with individual image uplaod types
        $image_upload_types = array();
        $image_upload_types=$request->input('img_upload_type');
        $type_values = implode(",",$image_upload_types);
        $media_setting->img_upload_type = $type_values;
        }
        else{
        $media_setting->img_upload_type = '';

        }
              
        $media_setting->mp3_upload_size = $request->input('mp3_upload_size'); 
        $media_setting->update();
        return redirect('/media_settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
