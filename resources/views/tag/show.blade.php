@extends('../layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;700&display=swap" rel="stylesheet">
<style> body { font-family: 'Prompt', sans-serif; } </style>

<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                แท็ก: <span class="text-blue-600">#{{ $tag->tag_name }}</span>
            </h1>
            <p class="text-gray-500 mt-2 italic">รายชื่อชุมชนทั้งหมดที่เชื่อมโยงกับแท็กนี้</p>
        </div>
        <a href="{{ route('tag.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600 transition shadow-md">
            กลับหน้าจัดการแท็ก
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        <table class="w-full text-left">
            <thead class="bg-blue-50">
                <tr>
                    <th class="p-4 text-sm font-bold text-blue-800 uppercase">ลำดับ</th>
                    <th class="p-4 text-sm font-bold text-blue-800 uppercase">ชื่อชุมชน</th>
                    <th class="p-4 text-sm font-bold text-blue-800 uppercase">จังหวัด</th>
                    <th class="p-4 text-center text-sm font-bold text-blue-800 uppercase">จัดการ</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($tag->communities as $index => $community)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-gray-400">{{ $index + 1 }}</td>
                    <td class="p-4 font-bold text-gray-800">{{ $community->name }}</td>
                    <td class="p-4 text-gray-600">จ.{{ $community->province ?? 'ไม่ระบุ' }}</td>
                    <td class="p-4 text-center">
                        <a href="{{ route('community.edit', $community->id) }}" class="text-blue-500 hover:underline text-sm">
                            แก้ไขข้อมูลชุมชน
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-gray-400 italic">
                        ยังไม่มีชุมชนใดใช้แท็กนี้ในขณะนี้
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection