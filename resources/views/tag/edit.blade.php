@extends('../layouts.app')
@section('content')
<div class="max-w-md mx-auto py-10">
    <h1 class="text-2xl font-bold mb-5">แก้ไขแท็ก</h1>
    <form action="{{ route('tag.update', $tag->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow">
        @csrf @method('PUT')
        <input type="text" name="tag_name" value="{{ $tag->tag_name }}" class="w-full border p-2 rounded mb-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">บันทึกการแก้ไข</button>
    </form>
</div>
@endsection