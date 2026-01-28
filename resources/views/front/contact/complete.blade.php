@extends('front.layout')

@section('title', '送信完了')

@section('content')
<div class="max-w-2xl mx-auto text-center">
    <div class="glass border border-white/60 rounded-3xl p-12 shadow-2xl flex flex-col items-center justify-center min-h-[400px]">
        
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mb-8 animate-bounce">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-3xl font-black mb-4 text-gray-800">
            送信完了！
        </h1>
        
        <p class="text-gray-600 mb-8 leading-relaxed">
            お問い合わせありがとうございます。<br>
            内容を確認次第、担当者よりご連絡させていただきます。
        </p>

        <a href="{{ route('home') }}" class="px-8 py-3 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl shadow-sm hover:shadow-md hover:bg-gray-50 transition-all">
            トップページに戻る
        </a>
    </div>
</div>
@endsection
