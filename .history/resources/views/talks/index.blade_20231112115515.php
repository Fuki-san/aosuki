<x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
    <h1>トークルーム</h1>
        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($talks as $talk)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('talks.show', $talk) }}">
                        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">{{ $talk->nickname }}</h2>
                        <h3>{{ $talk->user->name }}</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $talk->created_at ? 'NEW' : '' }}</span>
                            {{ $talk->created_at }}
                        </p>
                        <img class="w-full mb-2" src="{{ $talk->image_url }}" alt="">
                        <p class="text-gray-700 text-base">{{ Str::limit($talk->message, 50) }}</p>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
<button><a href="{{ route('dashboard') }}">戻る</a></button>
<button><a href="{{ route('dashboard') }}"></a></button>