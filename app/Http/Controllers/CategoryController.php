<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\HTTP\Requests;
use Auth;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories=Category::all();
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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

        'cat_name'=>'required|string|max:255',
        'cat_img' => 'required|image|mimes:jpeg,jpg,png',
        ]);


        $cat_img=$request->file('cat_img');
        $cat_img_name= time().'.'.$cat_img->getClientOriginalExtension();
        $upload_path='cat_image/';
        $cat_img_fullname=$upload_path.$cat_img_name;
        $cat_img->move($upload_path,$cat_img_fullname);
        

        $category= new Category;
        $category->cat_name = $request->input('cat_name');
        $category->cat_img = $cat_img_fullname;
        $category->save();
        alert()->success('Success', 'Category Created Successfully.');
        return redirect('/categories');
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
        $category=Category::find($id);
        return view('categories.edit')->with('category',$category);

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
               
        $category=Category::find($id);
        $this->validate($request,[

        'cat_name'=>'required|string|max:255',
        'cat_img' => 'image|mimes:jpeg,jpg,png|max:1000',
        ]);
       
    if ($request->hasFile('cat_img')) 
        {
        $cat_img=$request->file('cat_img');
        $cat_img_name= time() .'.'.$cat_img->getClientOriginalExtension();
        $upload_path='cat_image/';
        $cat_img_fullname=$upload_path.$cat_img_name;
        $cat_img->move($upload_path,$cat_img_fullname);
         $category->cat_img = $cat_img_fullname;
        }
        $category->cat_name = $request->input('cat_name');
        $category->update();
        alert()->success('Success', 'Category Updated Successfully.');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        unlink($category->cat_img);
        alert()->success('Success', 'Category Deleted Successfully.');
        return redirect('/categories');
        
    }
     public function __construct()
    {
        $this->middleware('auth');
    }
    
}
