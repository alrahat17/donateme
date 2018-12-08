<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\HTTP\Requests;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index')->with('testimonials',$testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.create');
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

        'name'=>'required|string|min:3|max:20',
        'test_des'=>'required|string|min:10|max:1000',
        'test_img'=>'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $test_img=$request->file('test_img');
        $test_img_name= time().'.'.$test_img->getClientOriginalExtension();
        $upload_path='test_image/';
        $test_img_fullname=$upload_path.$test_img_name;
        $test_img->move($upload_path,$test_img_fullname);
        
        $testimonial = new Testimonial;
        $testimonial->name = $request->input('name');
        $testimonial->test_des = $request->input('test_des');
        $testimonial->test_img = $test_img_fullname;
        $testimonial->save();
        return redirect('/testimonials');
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
        $testimonial = Testimonial::find($id);
        return view('testimonials.edit')->with('testimonial',$testimonial);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $testimonial = Testimonial::find($id);
        $this->validate($request,[

        'name'=>'required|string|min:3|max:20',
        'test_des'=>'required|string|min:10|max:2000',
        'test_img'=>'image|mimes:jpeg,jpg,png,gif',
        ]);

        $testimonial = Testimonial::find($id);
        if ($request->hasFile('test_img')) {
        $test_img=$request->file('test_img');
        $test_img_name= time().'.'.$test_img->getClientOriginalExtension();
        $upload_path='test_image/';
        $test_img_fullname=$upload_path.$test_img_name;
        $test_img->move($upload_path,$test_img_fullname);
        $testimonial->test_img = $test_img_fullname;
        
        }

        $testimonial->name = $request->input('name');
        $testimonial->test_des = $request->input('test_des');
        $testimonial->update();
        return redirect('/testimonials');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect('/testimonials');
    }
}
