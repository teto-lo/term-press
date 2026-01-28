@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">シーン用タグ作成</h1>

<form action="{{ route('admin.scene_terms.store') }}" method="POST"
      class="bg-white shadow rounded-lg p-6">
    @csrf

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">名称</label>
        <input type="text" name="name" value="{{ old('name') }}" required
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">スラッグ</label>
        <input type="text" name="slug" value="{{ old('slug') }}" required
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">説明（SEO）</label>
        <textarea name="description" rows="3"
            class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">SVG（そのまま貼り付け）</label>
        <textarea name="svg" rows="5"
            class="w-full border rounded px-3 py-2 font-mono text-sm">{{ old('svg') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">meta title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium mb-2">meta description</label>
        <input type="text" name="meta_description" maxlength="160"
            value="{{ old('meta_description') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            作成
        </button>
        <a href="{{ route('admin.scene_terms.index') }}"
           class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">
            キャンセル
        </a>
    </div>
</form>
@endsection
