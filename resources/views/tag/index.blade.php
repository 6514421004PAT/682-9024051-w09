@extends('../layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Prompt', sans-serif; }
    .thai-font { line-height: 2.5 !important; } 
</style>

<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold italic border-l-4 border-blue-500 pl-3">จัดการข้อมูลแท็ก (Tags)</h1>
        
        <form action="{{ route('tag.store') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="tag_name" placeholder="ชื่อแท็กใหม่..." required
                class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition shadow-md">
                + เพิ่มแท็ก
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-xl rounded-2xl">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">ชื่อแท็ก</th>
                    <th class="p-4">จำนวนการใช้งาน</th>
                    <th class="p-4 text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-blue-600 thai-font">
                        <span class="inline-block pt-2">#{{ $tag->tag_name }}</span>
                    </td>
                    <td class="p-4 thai-font text-gray-600">{{ $tag->communities_count }} ชุมชน</td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center items-center gap-3">
                            <a href="{{ route('tag.show', $tag->id) }}" 
                                class="bg-blue-500 text-white px-3 py-1.5 rounded-lg text-sm shadow-sm hover:bg-blue-600">ดูชุมชน</a>
                            
                            <a href="{{ route('tag.edit', $tag->id) }}" 
                                class="text-yellow-600 hover:text-yellow-700 font-medium text-sm underline decoration-dotted">แก้ไข</a>

                            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" class="inline" onsubmit="return confirm('ยืนยันการลบ?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 font-medium text-sm underline decoration-dotted">ลบ</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection