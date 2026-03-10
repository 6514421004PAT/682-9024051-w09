@extends('../layouts.app')

@section('title', 'แก้ไขข้อมูลชุมชน')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-amber-600">แก้ไขข้อมูลชุมชน</h1>
            <p class="text-gray-500">ปรับปรุงข้อมูลชุมชนและแท็กที่เกี่ยวข้อง</p>
        </div>
        <a href="{{ route('community.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg flex items-center shadow-md transition">
            กลับหน้าหลัก
        </a>
    </div>

    <div class="bg-white shadow-2xl rounded-2xl p-8 border border-gray-100">
        <form action="{{ route('community.update', $community->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2 text-lg italic">ชื่อชุมชน (Name) :</label>
                    <input type="text" name="name" value="{{ old('name', $community->name) }}" 
                           class="w-full px-4 py-4 rounded-xl border-2 border-gray-100 focus:border-blue-400 outline-none transition-all" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2 text-lg italic">ที่อยู่ (Location) :</label>
                    <input type="text" name="location" value="{{ old('location', $community->location) }}" 
                           class="w-full px-4 py-4 rounded-xl border-2 border-gray-100 focus:border-blue-400 outline-none transition-all" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-lg italic">อำเภอ (District) :</label>
                        <input type="text" name="district" value="{{ old('district', $community->district) }}" 
                               class="w-full px-4 py-4 rounded-xl border-2 border-gray-100 focus:border-blue-400 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-lg italic">จังหวัด (Province) :</label>
                        <input type="text" name="province" value="{{ old('province', $community->province) }}" 
                               class="w-full px-4 py-4 rounded-xl border-2 border-gray-100 focus:border-blue-400 outline-none transition-all">
                    </div>
                </div>

                <div class="mt-6 border-t pt-6">
                    <label class="block text-gray-700 font-bold mb-4 text-lg border-l-4 border-amber-500 pl-3">
                        ประเภทชุมชน (Tags) :
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($tags as $tag)
                            <label class="flex items-center space-x-3 p-4 border-2 {{ $community->tags->contains($tag->id) ? 'border-blue-500 bg-blue-50' : 'border-gray-50' }} rounded-2xl hover:bg-blue-50 cursor-pointer transition">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                    {{ $community->tags->contains($tag->id) ? 'checked' : '' }}
                                    class="w-5 h-5 text-blue-600">
                                <span class="text-gray-700 font-bold">#{{ $tag->tag_name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-center">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-4 px-16 rounded-2xl shadow-lg transition-all transform hover:-translate-y-1">
                    อัปเดตข้อมูลชุมชน
                </button>
            </div>
        </form>
    </div>
</div>
@endsection