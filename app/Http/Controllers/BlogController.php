<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
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
        'title'=>'required|min:10|max:50',
        'body'=>'required|min:100|max:1000',
        'media'=>'image|mimes:jpeg,jpg,png',
        ]);



        $blog = new Blog;
        if($request->hasFile('media')) {  
        $media=$request->file('media');
        $media_name= time().'.'.$media->getClientOriginalExtension();
        $upload_path='blog_media/';
        $media_fullname=$upload_path.$media_name;
        $media->move($upload_path,$media_fullname);
        $blog->media = $media_fullname;
        }
              
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');       
        $blog->save();
        return redirect('/blogs');
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
        $blog = Blog::find($id);
        return view('blogs.edit')->with('blog',$blog);

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
        'title'=>'required|min:10|max:50',
        'body'=>'required|min:100|max:1000',
        'media'=>'image|mimes:jpeg,jpg,png',
        ]);

        $blog = Blog::find($id);       
        if($request->hasFile('media')) {  
        $media=$request->file('media');
        $media_name= time().'.'.$media->getClientOriginalExtension();
        $upload_path='blog_media/';
        $media_fullname=$upload_path.$media_name;
        $media->move($upload_path,$media_fullname);
        $blog->media = $media_fullname;
        }
              
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');       
        $blog->update();
        return redirect('/blogs');
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
}
