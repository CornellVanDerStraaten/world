<x-app-layout>
    <div class="p-6">
        <h1 class="mb-3 text-3xl font-semibold">Puzzles</h1>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($puzzles as $puzzle)
                <li >
                    <a href="{{ route('puzzles.show', $puzzle) }}" class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg hover:bg-gray-100 bg-gray-50 text-center shadow">
                        <div class="flex flex-1 flex-col p-3">
                            <h3 class="mt-1 text-xl font-medium text-gray-900">{{ $puzzle->name }}</h3>
                            <dl class="mt-1 flex flex-grow flex-col justify-between">
                                    <dd class="mt-3">
                                        @if($puzzle->completed)
                                            <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Completed</span>
                                        @else
                                            <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Not Completed</span>
                                        @endif
                                    </dd>
                            </dl>
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="flex w-0 flex-1 text-center" style="flex-direction: column">
                                    <small class="mt-2">Difficulty</small>
                                    <p class="text-3xl mb-2 font-semibold">{{ $puzzle->difficulty_rating }}</p>
                                </div>
                                <div class="flex w-0 flex-1 text-center" style="flex-direction: column">
                                    <small class="mt-2">Points</small>
                                    <p class="text-3xl mb-2 font-semibold">{{ $puzzle->points }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


</x-app-layout>
