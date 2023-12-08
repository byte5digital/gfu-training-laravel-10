<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @foreach ($posts as $post)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">{{ $post->title }}</h2>
                        <p class="mb-1">{{ $post->getTextAsParagraphs()[0] }}</p>
                        <a href="{{ $post->readMoreLink }}" class="">Weiterlesen</a>
                        {{--
                        @foreach($post->getTextAsParagraphs() as $paragraph)
                            <p class="mb-2">{{ $paragraph }}</p>
                        @endforeach
                        --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
