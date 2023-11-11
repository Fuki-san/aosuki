<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}
                <h1>トーク</h1>
            </div>
        </div>
    </div>

    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">プロフィール登録</h2>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('talks.store') }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4  w-1/3">
                <label class="block text-gray-700 text-sm mb-2" for="title">
                    ニックネーム
                </label>
                <input type="text" name="title"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="ニックネーム" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="body">
                    プロフィール文
                </label>
                <textarea name="body" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required>{{ old('body') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="image">
                    プロフィール画像
                </label>
                <input type="file" name="image" class="border-gray-300">
            </div>
            
            
            <input type="submit" value="登録"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>
