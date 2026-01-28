@extends('front.layout')

@section('title', 'お問い合わせ')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="glass border border-white/60 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
        
        <h1 class="text-3xl md:text-4xl font-black mb-8 text-center">
            <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                お問い合わせ
            </span>
        </h1>

        <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 relative z-10">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">お名前 <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white/70 backdrop-blur-sm shadow-sm transition-all">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">メールアドレス <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white/70 backdrop-blur-sm shadow-sm transition-all">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">件名</label>
                <input type="text" name="subject" id="subject" class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white/70 backdrop-blur-sm shadow-sm transition-all">
                @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-bold text-gray-700 mb-2">お問い合わせ内容 <span class="text-red-500">*</span></label>
                <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white/70 backdrop-blur-sm shadow-sm transition-all"></textarea>
                @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all transform active:scale-95">
                    送信する 🚀
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
