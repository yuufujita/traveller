<!-- resources/views/tweets/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tweet作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('tweets.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="tweet" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tweet</label>
                            <input type="text" name="tweet" id="tweet" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('tweet')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="bg-fuchsia-500 hover:bg-fuchsia-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tweet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                    <p>{{ $review['content'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>スクレイピング結果がありません。</p>
                    @endif
                    <div>
                        <p>{{ $yadotext }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>