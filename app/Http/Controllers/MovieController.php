<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Distributor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    
    public function index() 
    {
        $movies = Movie::with('distributor')->get();
        $distributors = Distributor::all(); 
        return view('movies.index', compact('movies', 'distributors'));
    }

   
    public function store(Request $request) 
    {
        Movie::create($request->all());
        return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
    }

   
    public function edit($id) 
    {
        $movie = Movie::findOrFail($id);
        $distributors = Distributor::all();
        return view('movies.edit', compact('movie', 'distributors'));
    }

   
    public function update(Request $request, $id) 
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        
        return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

    public function create()
    {
    $distributors = \App\Models\Distributor::all();
    return view('movies.create', compact('distributors'));
    }
}