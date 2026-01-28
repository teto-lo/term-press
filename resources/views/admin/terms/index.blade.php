@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">記事管理</h1>
        <a href="{{ route('admin.terms.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">タイトル</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">カテゴリ</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">スラッグ</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">公開</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($terms as $term)
                    <tr>
                        <td class="px-6 py-4">{{ $term->title }}</td>
                        <td class="px-6 py-4">{{ $term->category->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $term->slug }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 text-xs rounded {{ $term->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $term->is_published ? '公開' : '非公開' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.terms.edit', $term) }}"
                                class="text-blue-600 hover:text-blue-900 mr-3">編集</a>
                            <form action="{{ route('admin.terms.destroy', $term) }}" method="POST" class="inline">
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

    <div class="mt-6">
        {{ $terms->links() }}
    </div>
@endsection
