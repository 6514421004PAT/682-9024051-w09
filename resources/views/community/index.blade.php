@extends('../layouts.app')

@section('title', 'จัดการข้อมูลชุมชน')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10 prompt-regular">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 border-l-8 border-red-600 pl-4">ระบบจัดการข้อมูลชุมชน</h1>
            <p class="text-gray-500 mt-1 pl-6">ตรวจสอบและจัดการข้อมูลความสัมพันธ์ของชุมชนและแท็ก</p>
        </div>
        
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('tag.index') }}" 
               class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span class="material-symbols-outlined mr-2">sell</span>
                จัดการแท็กทั้งหมด
            </a>

            <a href="{{ route('community.create') }}" 
               class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span class="material-symbols-outlined mr-2">add_circle</span>
                เพิ่มชุมชนใหม่
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded-r-lg shadow-sm flex items-center" role="alert">
        <span class="material-symbols-outlined mr-2">check_circle</span>
        <p class="font-medium">{{ session('success') }}</p>
    </div>
    @endif

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">ลำดับ</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ชื่อชุมชน</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">แท็ก (คลิกเพื่อดูรายละเอียด)</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ที่อยู่ / พื้นที่</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">เครื่องมือ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($communities as $item)
                <tr class="hover:bg-blue-50/40 transition-colors duration-200">
                    <td class="px-6 py-5 whitespace-nowrap text-center text-sm font-bold text-gray-400">
                        {{ $item->id }}
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-sm font-semibold text-gray-900 leading-tight">{{ $item->name }}</div>
                        <div class="text-xs text-gray-400 mt-1 line-clamp-1 italic">{{ $item->description ?? 'ไม่มีคำอธิบาย' }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex flex-wrap gap-2">
                            @forelse($item->tags as $tag)
                                <a href="{{ route('tag.show', $tag->id) }}" 
                                   class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-100 text-blue-700 border border-blue-200 hover:bg-blue-600 hover:text-white transition-all duration-200 shadow-sm"
                                   title="ดูชุมชนทั้งหมดที่ใช้แท็กนี้">
                                    #{{ $tag->tag_name }}
                                </a>
                            @empty
                                <span class="text-xs text-gray-300 italic">ไม่มีแท็ก</span>
                            @endforelse
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center text-sm text-gray-700 font-medium">
                            <span class="material-symbols-outlined text-red-400 text-sm mr-1">location_on</span>
                            จ.{{ $item->province ?? 'ไม่ระบุ' }}
                        </div>
                        <div class="text-xs text-gray-400 mt-1 pl-5">{{ $item->district ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-center text-sm font-medium">
                        <div class="flex justify-center items-center gap-3">
                            <a href="{{ route('community.edit', $item->id) }}" 
                               class="text-amber-500 hover:text-amber-600 transition-all p-1.5 hover:bg-amber-50 rounded-lg" title="แก้ไขข้อมูล">
                                <span class="material-symbols-outlined">edit</span>
                            </a>

                            <form action="{{ route('community.destroy', $item->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('ยืนยันการลบชุมชนนี้? (ข้อมูลแท็กที่เชื่อมอยู่จะถูกยกเลิก)')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 transition-all p-1.5 hover:bg-red-50 rounded-lg" title="ลบข้อมูล">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-24 text-center">
                        <div class="flex flex-col items-center">
                            <span class="material-symbols-outlined text-gray-200 text-7xl mb-4">database</span>
                            <p class="text-gray-400 text-lg">ไม่พบข้อมูลชุมชนในระบบ</p>
                            <p class="text-gray-300 text-sm">ลองเพิ่มข้อมูลใหม่ด้วยปุ่ม "เพิ่มชุมชนใหม่" ด้านบน</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection