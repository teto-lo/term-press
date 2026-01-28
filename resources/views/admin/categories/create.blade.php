@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">カテゴリ作成</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">カテゴリ名</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">スラッグ（URL）</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                class="w-full border rounded px-3 py-2 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                作成
            </button>
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">
                キャンセル
            </a>
        </div>
    </form>
@endsection
