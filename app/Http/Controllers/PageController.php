<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use Yajra\Datatables\Datatables;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pages = Page::all();
        return view('pages.index')->with('pages',$pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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

        'heading' => 'required|string|min:4|max:20',
        'home_box' => 'required',

        ]);


        $page = new Page;
        $page->heading = $request->input('heading');
        $page->home_box = $request->input('home_box');
        $page->save();
        return redirect('/pages');
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
        $page = Page::find($id);
        return view('pages.edit')->with('page',$page);

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

        'heading' => 'required|string|min:4|max:20',
        'home_box' => 'required',

        ]);
        $page = Page::find($id);
        $page->heading = $request->input('heading');
        $page->home_box = $request->input('home_box');
        $page->update();
        return redirect('/pages');

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
