<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Conference List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Your Conferences</h3>
                    @if ($conferences->isEmpty())
                        <p>Did not have any conferences yet.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach ($conferences as $conference)
                                <li class="py-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <a
                                                href="{{ $conference->url }}"
                                                class="text-lg font-medium text-black hover:underline"
                                                target="_blank"
                                            >
                                                {{ $conference->title }}
                                            </a>

                                            <p class="text-sm text-gray-600">
                                                Location: {{ $conference->location }} | Date:
                                                {{ $conference->cfp_starts_at }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            {{ $conferences->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
