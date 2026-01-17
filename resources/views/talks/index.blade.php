<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Talk List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Your Talks</h3>
                    @if ($talks->isEmpty())
                        <p>You have not submitted any talks yet.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach ($talks as $talk)
                                <li class="py-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <a
                                                href="{{ route('talks.show', $talk) }}"
                                                class="text-lg font-medium text-black hover:underline"
                                            >
                                                {{ $talk->title }}
                                            </a>

                                            <p class="text-sm text-gray-600">
                                                Type: {{ $talk->type }} | Length: {{ $talk->length }}
                                            </p>
                                        </div>
                                        {{--
                                            <div>
                                            <a href="{{ route('talks.show', $talk) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </div>
                                        --}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
