<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class BestPracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    
    public function index()
    {
        $best_practices = \App\BestPractice::all();
        return view('best_practices.index')->with('best_practices', $best_practices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('best_practices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $rules = ['title' => 'required|string|max:255',
                'filename' => 'required|mimes:pdf|'];
        $validator = $this->validate($request, $rules);

        //Handle file upload
        $filenameWithExt = $request->file('filename')->getClientOriginalName();
        //get just filename
        $file = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get just extension
        $extension = $request->file('filename')->getClientOriginalExtension();
        $filenameToStore = $file.'_'.time().'.'.$extension;

        //Upload PDF
        $path = $request->file('filename')->storeAs('public/PDFs', $filenameToStore);

        // Store in the database
        // Hardcoded for now

        $bestPractice = new \App\BestPractice;
        $bestPractice->title = $request->title;
        $bestPractice->filename = 'woundscanada.test/storage/PDFs/'.$filenameToStore;
        $bestPractice->save();

        Session::flash('success', 'The section was successfully added');
        return redirect()->route('best_practices.index', $bestPractice->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showpdf($id) 
    {
        $file = \App\BestPractice::find($id);
        $url = Storage::url($file->fileName);
        return response()->file($url);
    }

    /**
     * Display the specified resource JSON.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $best_practices = \App\BestPractice::all();
        return view('best_practices.show')->with('best_practices', $best_practices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $best_practice = \App\BestPractice::find($id);
        return view('best_practices.edit')->with('best_practice', $best_practice);
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
        $rules = ['title' => 'required|string|min:6'];
        $validator = $this->validate($request, $rules); 
        $best_practice = \App\BestPractice::find($id);
        $best_practice->title = $request->title;
        $best_practice->save();
        
        Session::flash('success', 'Record updated successfully'); 
        return redirect()->route('best_practices.index');
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
        $best_practice = \App\BestPractice::find($id);
        $best_practice->delete();
        return redirect()->route('best_practices.index');
    }
}
