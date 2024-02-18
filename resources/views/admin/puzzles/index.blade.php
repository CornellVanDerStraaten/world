<x-app-layout>
    <div class="p-6">
        <a href="{{ route('puzzles.create') }}" class="py-2 px-1 bg-blue-200 rounded-lg">Create Puzzle</a>
        <table class="w-full text-left">
            <thead class="bg-white">
            <tr>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">ID</th>
                <th scope="col" class="relative isolate py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                    Name
                    <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-b-gray-200"></div>
                    <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-b-gray-200"></div>
                </th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Difficulty Rating</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Points</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Completed</th>
                <th scope="col" class="relative py-3.5 pl-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($puzzles as $puzzle)
                <tr>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{ $puzzle->id }}</td>
                    <td class="relative py-4 pr-3 text-sm font-medium text-gray-900">
                        {{ $puzzle->name }}
                        <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                        <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{ $puzzle->difficulty_rating }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{ $puzzle->points }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">@if($puzzle->completed) Yes @else No @endif</td>
                    <td class="relative py-4 pl-3 text-right text-sm font-medium">
                        <a href="{{ route('puzzles.edit', $puzzle) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
