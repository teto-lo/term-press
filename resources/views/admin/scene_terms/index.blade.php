@extends('admin.layout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">シーン用タグ管理</h1>
    <a href="{{ route('admin.scene_terms.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">スラッグ</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">操作</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($sceneTerms as $sceneTerm)
                <tr>
                    <td class="px-6 py-4">{{ $sceneTerm->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $sceneTerm->slug }}</td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('admin.scene_terms.edit', $sceneTerm) }}"
                            class="text-blue-600 hover:text-blue-900 mr-3">編集</a>
                        <form action="{{ route('admin.scene_terms.destroy', $sceneTerm) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-900"
                                onclick="return confirm('削除しますか?')">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $sceneTerms->links() }}
</div>
@endsection
