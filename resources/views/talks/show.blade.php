<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Talk Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">{{ $talk->title }}</h3>
                    <p>
                        <strong>Type:</strong>
                        {{ $talk->type }}
                    </p>
                    <p>
                        <strong>Length:</strong>
                        {{ $talk->length }}
                    </p>
                    <div class="mt-4">
                        <h4 class="text-md mb-2 font-medium leading-6 text-gray-900">Abstract</h4>
                        <p class="text-gray-700">{{ $talk->abstract }}</p>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-md mb-2 font-medium leading-6 text-gray-900">Organizer Notes</h4>
                        <p class="text-gray-700">{{ $talk->organizer_notes }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
