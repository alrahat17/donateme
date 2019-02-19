<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use Alert;
use Purifier;

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
        $comment = Comment::all();
        return view('blogs.index')->with('blogs',$blogs)->with('commment',$comment);
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
        'title'=>'required|min:10|max:100',
        'body'=>'required|min:100|max:5000',
        'media'=>'required|image|mimes:jpeg,jpg,png|max:1000',
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
        $blog->body = Purifier::clean($request->input('body'));       
        $blog->save();

       alert()->success('Success', 'Post Created Successfully.');
        
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
        'media'=>'image|mimes:jpeg,jpg,png|max:1000',
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
        $blog->body = Purifier::clean($request->input('body'));       
        $blog->update();
        alert()->success('Success', 'Post Updated Successfully.');
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
      $blog = Blog::find($id)->delete();
      alert()->success('Success', 'Post Deleted Successfully.');
      return redirect('/blogs');
    }

    public function show_blog_comments($id){

    
    $comments = Comment::where('blog_id',$id)->get();

    return view('blog_comments')->with('comments',$comments);

    }

    public function active_com($id)
    {

    $comment = Comment::find($id);
    $comment->where('id',$id)->update(['status'=>1]);
    alert()->success('Success', 'Comment Activated.');
    return redirect('/blogs');
    }

    public function deactive_com($id)
    {
     $comment = Comment::find($id);
     $comment->where('id',$id)->update(['status'=>0]);
     alert()->warning('Warning', 'Comment Activated.');
     return redirect('/blogs');
        
    }

    public function delete_comment($id){

     $comment = Comment::find($id)->delete();
     alert()->success('Success', 'Comment Deleted Successfully.');
     return redirect('/blogs');

    }

   
}
