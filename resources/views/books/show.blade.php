<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SHOW BOOK
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ URL::signedRoute('books.preview', $book) }}">Preview Unpublished Book</a>
                    <a href="{{ URL::temporarySignedRoute('books.preview', now()->addMinute(), $book) }}">Preview Unpublished Book</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
