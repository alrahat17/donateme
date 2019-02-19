<?php

namespace App\Http\Controllers;
use App\Gallery;
use Illuminate\Http\Request;
use App\HTTP\Requests;
use Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index')->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
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

        'title'=>'required|min:2|string',
        'sub_title'=>'required|min:2|string',
        'gal_img'=>'required|image|mimes:jpeg,jpg,png|max:1000',
        ]);
        
        $gal_img=$request->file('gal_img');
        $gal_img_name= time().'.'.$gal_img->getClientOriginalExtension();
        $upload_path='gal_image/';
        $gal_img_fullname=$upload_path.$gal_img_name;
        $gal_img->move($upload_path,$gal_img_fullname);

        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->sub_title = $request->input('sub_title');
        $gallery->gal_img = $gal_img_fullname;
        $gallery->save();
        return redirect('/galleries');
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
        $gallery = Gallery::find($id);
        return view('galleries.edit')->with('gallery',$gallery);
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
        'title'=>'required|min:2|string',
        'sub_title'=>'required|min:2|string',
        'gal_img'=>'image|mimes:jpeg,jpg,png|max:1000',
        ]);

        if ($request->input('gal_img')) {
        $gal_img=$request->file('gal_img');
        $gal_img_name= time().'.'.$gal_img->getClientOriginalExtension();
        $upload_path='gal_image/';
        $gal_img_fullname=$upload_path.$gal_img_name;
        $gal_img->move($upload_path,$gal_img_fullname);

        }

        $gallery->title = $request->input('title');
        $gallery->sub_title = $request->input('sub_title');
        $gallery->gal_img = $gal_img_fullname;
        $gallery->update();
        return redirect('/galleries');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $gallery = Gallery::find($id)->delete();
        alert()->success('Success', 'Image Deleted Successfully.');
        return redirect('/galleries');
    }
}
