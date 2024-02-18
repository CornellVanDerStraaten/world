<x-app-layout>
    <div class="p-6 text-gray-900">
        <a href="{{ route('dashboard') }}" class="bg-gray-100 hover:bg-gray-200 p-3 rounded-xl">< Back</a>
        <livewire:sudoku :puzzle="$puzzle"/>
    </div>
</x-app-layout>
