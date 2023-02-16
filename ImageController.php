<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::all();
       return view('ex',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
{
    $images = Image::all();
    return view('create', compact('images'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=new image();
        // $this->validate($request,[
        //      'title'=>'required',
        //      'meg'=>'required',
        //      'tid'=>'required|integer',
        //      'img'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //  ]);
         $d->title=$request->title;
        $d->meg=$request->meg;
        $d->tid=$request->tid;
        $path=$request->file('img')->store('images','public');
        $d->img=$path;
        $d->save();
        return "save";    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images=Image::findOrFail($id);
        return view('ex',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images= Image::findOrFail($id);
        return view('admin.editcategory',compact('images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData =$request->validate([
            'scname' => 'required',
        ]);

        $image = image::findOrFail($id);
        $image->title= $validatedData['scname'];
        $image->save();

        return redirect('/searchc')->with('message','Query Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::findOrFail($id);
        $image->delete();
        return redirect('/searchc')->with('message','Query Deleted Succesfully');
    }

     public function searchdata(Request $request)
    {
        $title=$request->scname;
        $data=DB::table('images')->where('title',$title)->paginate(3);
        return view('admin.docs',compact('data'));
    }

    public function print_pdf($id)
    {
        $image=image::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('image'));
        return $pdf->download('users_query_details.pdf')

    }

}
