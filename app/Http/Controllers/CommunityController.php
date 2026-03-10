<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller {

    public function index() {
        $communities = Community::with('tags')->latest()->get();
        return view('community.index', compact('communities'));
    }

    public function create() {
        $tags = Tag::all(); 
        return view('community.create', compact('tags'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // แก้จาก 'community_name' เป็น 'name' เพื่อให้ตรงกับโครงสร้าง Database ของคุณ
                $community = Community::create([
                    'name'     => $request->name, 
                    'location' => $request->location,
                    'district' => $request->district,
                    'province' => $request->province,
                ]);

                if ($request->has('tags')) {
                    $community->tags()->attach($request->tags);
                }
            });

            return redirect()->route('community.index')->with('success', 'เพิ่มชุมชนและผูกแท็กเรียบร้อย!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'ข้อผิดพลาด: ' . $e->getMessage());
        }
    }

    public function edit(Community $community) {
        $tags = Tag::all();
        $community->load('tags');
        return view('community.edit', compact('community', 'tags'));
    }

    public function update(Request $request, Community $community) {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request, $community) {
                // แก้จุดนี้ด้วยเช่นกันครับ
                $community->update([
                    'name'     => $request->name,
                    'location' => $request->location,
                    'district' => $request->district,
                    'province' => $request->province,
                ]);

                $community->tags()->sync($request->tags ?? []);
            });

            return redirect()->route('community.index')->with('success', 'แก้ไขข้อมูลเรียบร้อย!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'แก้ไขไม่สำเร็จ: ' . $e->getMessage());
        }
    }

    public function destroy(Community $community) {
        $community->tags()->detach();
        $community->delete();
        return redirect()->route('community.index')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}