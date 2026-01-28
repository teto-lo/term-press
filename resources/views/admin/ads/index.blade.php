@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">広告管理</h1>
        <a href="{{ route('admin.ads.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            新規作成
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">名称</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">表示位置</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">優先度</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ステータス</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($ads as $ad)
                    <tr>
                        <td class="px-6 py-4 font-medium">{{ $ad->name }}</td>
                        <td class="px-6 py-4">
                            @switch($ad->position)
                                @case('header')
                                    ヘッダー
                                @break

                                @case('after_title')
                                    タイトル下
                                @break

                                @case('toc_top')
                                    目次上
                                @break

                                @case('mid_content')
                                    コンテンツ中
                                @break

                                @case('article_bottom')
                                    記事下
                                @break

                                @case('before_related')
                                    関連記事前
                                @break

                                @case('sidebar')
                                    サイドバー
                                @break

                                @case('footer')
                                    フッター
                                @break
                            @endswitch
                        </td>
                        <td class="px-6 py-4">{{ $ad->priority }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 text-xs rounded {{ $ad->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $ad->is_active ? '有効' : '無効' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.ads.edit', $ad) }}"
                                class="text-blue-600 hover:text-blue-900 mr-3">編集</a>
                            <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('削除しますか?')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8 bg-blue-50 border border-blue-200 rounded p-4">
        <h3 class="font-bold mb-2">広告位置について</h3>
        <ul class="text-sm space-y-1">
            <li><strong>ヘッダー:</strong> サイト最上部に表示</li>
            <li><strong>タイトル下:</strong> 記事タイトル直下に表示</li>
            <li><strong>目次上:</strong> 記事本文の前に表示</li>
            <li><strong>コンテンツ中:</strong> 記事本文の途中に表示</li>
            <li><strong>記事下:</strong> 記事本文の終了後に表示</li>
            <li><strong>関連記事前:</strong> 関連記事セクションの前に表示</li>
            <li><strong>サイドバー:</strong> トップページのサイドバーに表示</li>
            <li><strong>フッター:</strong> サイト最下部に表示</li>
        </ul>
        <p class="text-xs text-gray-600 mt-3">※広告が設定されていない位置には、デフォルトAdSenseコードが自動で表示されます（設定されている場合）</p>
    </div>
@endsection
