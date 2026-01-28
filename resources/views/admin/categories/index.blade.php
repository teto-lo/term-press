@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">カテゴリ一覧</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        カテゴリ名
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        スラッグ
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                        関連数
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        操作
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $category->id }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $category->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $category->slug }}
                        </td>

                        <td class="px-6 py-4 text-center text-sm">
                            {{ $category->terms_count }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="text-blue-600 hover:text-blue-900 mr-3">
                                編集
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                                onsubmit="return confirm('本当に削除しますか？')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            カテゴリがありません
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
