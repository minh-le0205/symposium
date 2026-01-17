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

                                        {{-- Add favorite button --}}
                                        <form method="POST" action="{{ route('conferences.favorite', $conference) }}">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="rounded p-2 transition-colors hover:bg-gray-100"
                                            >
                                                @if ($conference->usersFavorited->contains(auth()->user()))
                                                    {{-- Filled heart for favorited --}}
                                                    <svg
                                                        class="h-6 w-6 text-red-500"
                                                        fill="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"
                                                        ></path>
                                                    </svg>
                                                @else
                                                    {{-- Outline heart for unfavorited --}}
                                                    <svg
                                                        class="h-6 w-6 text-gray-400"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                                        ></path>
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
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
