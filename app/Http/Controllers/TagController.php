<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function index()
    {
        \App\Models\Tag::where('id', 1)->update(['tag_name' => 'การท่องเที่ยว']);
        \App\Models\Tag::where('id', 2)->update(['tag_name' => 'เกาตรอินทรีย์']);
        \App\Models\Tag::where('id', 3)->update(['tag_name' => 'ศิลปวัฒนธรรม']);
        \App\Models\Tag::where('id', 4)->update(['tag_name' => 'วิสาหกิจชุมชน']);
        $tags = Tag::withCount('communities')->get(); 
        return view('tag.index', compact('tags')); 
    }

    
    public function store(Request $request)
    {
        $request->validate(['tag_name' => 'required|unique:tag,tag_name']);
        Tag::create($request->all());
        return redirect()->route('tag.index')->with('success', 'เพิ่มสำเร็จ');
    }

   
    public function show(Tag $tag)
    {
        $tag->load('communities'); 
        return view('tag.show', compact('tag'));
    }

    
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['tag_name' => 'required|unique:tag,tag_name,'.$tag->id]);
        $tag->update($request->all());
        return redirect()->route('tag.index')->with('success', 'แก้ไขสำเร็จ');
    }

   
    public function destroy(Tag $tag)
    {
        $tag->communities()->detach(); 
        $tag->delete();
        return redirect()->route('tag.index')->with('success', 'ลบสำเร็จ');
    }
}