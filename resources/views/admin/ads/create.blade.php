@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">広告作成</h1>

    <form action="{{ route('admin.ads.store') }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">広告名</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror"
                placeholder="例: AdSense記事下バナー">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">表示位置</label>
            <select name="position" required
                class="w-full border rounded px-3 py-2 @error('position') border-red-500 @enderror">
                <option value="">選択してください</option>
                <option value="header" {{ old('position') == 'header' ? 'selected' : '' }}>ヘッダー（サイト最上部）</option>
                <option value="after_title" {{ old('position') == 'after_title' ? 'selected' : '' }}>タイトル下（記事タイトル直下）
                </option>
                <option value="toc_top" {{ old('position') == 'toc_top' ? 'selected' : '' }}>目次上（記事本文前）</option>
                <option value="mid_content" {{ old('position') == 'mid_content' ? 'selected' : '' }}>コンテンツ中（本文途中）</option>
                <option value="article_bottom" {{ old('position') == 'article_bottom' ? 'selected' : '' }}>記事下（本文終了後）
                </option>
                <option value="before_related" {{ old('position') == 'before_related' ? 'selected' : '' }}>関連記事前</option>
                <option value="sidebar" {{ old('position') == 'sidebar' ? 'selected' : '' }}>サイドバー（トップページ）</option>
                <option value="footer" {{ old('position') == 'footer' ? 'selected' : '' }}>フッター（サイト最下部）</option>
            </select>
            @error('position')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">優先度（数値が大きいほど優先）</label>
            <input type="number" name="priority" value="{{ old('priority', 0) }}" min="0"
                class="w-full border rounded px-3 py-2 @error('priority') border-red-500 @enderror">
            @error('priority')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">広告コード</label>
            <textarea name="code" rows="10" required
                class="w-full border rounded px-3 py-2 font-mono text-sm @error('code') border-red-500 @enderror"
                placeholder="<script>
                    ...
                </script> または HTML">{{ old('code') }}</textarea>
            @error('code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-600 mt-1">AdSenseコード、アフィリエイトタグなどを貼り付けてください</p>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="mr-2">
                <span class="text-sm font-medium">有効にする</span>
            </label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                作成
            </button>
            <a href="{{ route('admin.ads.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">
                キャンセル
            </a>
        </div>
    </form>
@endsection
