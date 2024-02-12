<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Scrape') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($reviews) && count($reviews) > 0)
                    <h3>スクレイピング結果</h3>
                    <ul>
                        @foreach($reviews as $review)
                        <li>
                            <h4>{{ $review['title'] }}</h4>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p>スクレイピング結果がありません。</p>
                    @endif
                    <form method="POST" action="{{ route('scrapes.store') }}">
                        <button type="submit" class="bg-fuchsia-500 hover:bg-fuchsia-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Scrape</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>