@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">サイト設定</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf

        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">デフォルトAdSenseコード</label>
            <textarea name="default_adsense_code" rows="10"
                class="w-full border rounded px-3 py-2 font-mono text-sm @error('default_adsense_code') border-red-500 @enderror"
                placeholder="<script async src=&quot;https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js&quot;></script>
<!-- 広告ユニット名 -->
<ins class=&quot;adsbygoogle&quot;
     style=&quot;display:block&quot;
     data-ad-client=&quot;ca-pub-xxxxxxxxxxxxxxxx&quot;
     data-ad-slot=&quot;xxxxxxxxxx&quot;
     data-ad-format=&quot;auto&quot;></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>">{{ old('default_adsense_code', $defaultAdsense) }}</textarea>
            @error('default_adsense_code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-sm text-gray-600 mt-2">
                <strong>重要:</strong> 広告が個別に設定されていない位置には、このAdSenseコードが自動で表示されます。<br>
                Google AdSenseの自動広告コードをここに設定することで、全ページに広告を配置できます。
            </p>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 rounded p-4 mb-6">
            <h3 class="font-bold text-sm mb-2 text-yellow-800">💡 使い方のヒント</h3>
            <ul class="text-sm text-yellow-700 space-y-1">
                <li>• AdSenseの自動広告コードを設定すれば、個別設定なしで全ページに広告表示</li>
                <li>• 特定の位置に別の広告を表示したい場合は「広告管理」から個別設定</li>
                <li>• 個別設定がある位置では、デフォルトコードは表示されません</li>
            </ul>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            保存
        </button>
    </form>

    <div class="mt-8 bg-blue-50 border border-blue-200 rounded p-6">
        <h3 class="font-bold mb-3">広告表示の優先順位</h3>
        <ol class="text-sm space-y-2">
            <li class="flex items-start gap-2">
                <span class="font-bold text-blue-600">1.</span>
                <span><strong>記事個別のカスタム広告</strong> - 記事編集画面で設定した広告（最優先）</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="font-bold text-blue-600">2.</span>
                <span><strong>位置別の広告設定</strong> - 広告管理で設定した位置別広告</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="font-bold text-blue-600">3.</span>
                <span><strong>デフォルトAdSense</strong> - この画面で設定したコード（フォールバック）</span>
            </li>
        </ol>
    </div>
@endsection
