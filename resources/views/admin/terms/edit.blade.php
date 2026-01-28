@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">記事編集</h1>

<form action="{{ route('admin.terms.update', $term) }}" method="POST" class="bg-white shadow rounded-lg p-6">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">カテゴリ</label>
        <select name="category_id" required
            class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 @enderror">
            <option value="">選択してください</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $term->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">タイトル</label>
        <input type="text" name="title" value="{{ old('title', $term->title) }}" required
            class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
        @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">スラッグ（URL）</label>
        <input type="text" name="slug" value="{{ old('slug', $term->slug) }}" required
            class="w-full border rounded px-3 py-2 @error('slug') border-red-500 @enderror">
        @error('slug')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">簡易説明（100字以内）</label>
        <input type="text" name="short_description" value="{{ old('short_description', $term->short_description) }}"
            maxlength="100" required
            class="w-full border rounded px-3 py-2 @error('short_description') border-red-500 @enderror">
        @error('short_description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">本文</label>
        <textarea name="body" rows="10" required
            class="w-full border rounded px-3 py-2 @error('body') border-red-500 @enderror">{{ old('body', $term->body) }}</textarea>
        @error('body')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">例文</label>
        <textarea name="example" rows="3"
            class="w-full border rounded px-3 py-2 @error('example') border-red-500 @enderror">{{ old('example', $term->example) }}</textarea>
        @error('example')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">メタディスクリプション（160字以内）</label>
        <input type="text" name="meta_description" value="{{ old('meta_description', $term->meta_description) }}" maxlength="160"
            class="w-full border rounded px-3 py-2 @error('meta_description') border-red-500 @enderror">
        @error('meta_description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">カスタム広告コード（この記事専用）</label>
        <textarea name="custom_ad_code" rows="5"
            class="w-full border rounded px-3 py-2 font-mono text-sm @error('custom_ad_code') border-red-500 @enderror">{{ old('custom_ad_code', $term->custom_ad_code) }}</textarea>
        @error('custom_ad_code')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium mb-2">シーン（複数選択可）</label>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
            @foreach ($sceneTerms as $sceneTerm)
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox"
                        name="scene_term_ids[]"
                        value="{{ $sceneTerm->id }}"
                        {{ in_array(
                                $sceneTerm->id,
                                old(
                                    'scene_term_ids',
                                    $term->sceneTerms->pluck('id')->toArray()
                                )
                        ) ? 'checked' : '' }}>
                    {{ $sceneTerm->name }}
                </label>
            @endforeach
        </div>
    </div>

    <div class="mb-6">
        <label class="flex items-center">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $term->is_published) ? 'checked' : '' }}
                class="mr-2">
            <span class="text-sm font-medium">公開する</span>
        </label>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            更新
        </button>
        <a href="{{ route('admin.terms.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">
            キャンセル
        </a>
    </div>
</form>
@endsection