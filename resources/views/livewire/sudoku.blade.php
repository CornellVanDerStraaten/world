<div>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-semibold mb-4">{{ $name }}</h1>

        @if($this->puzzle->completed)
            <i class="text-xl font-semibold py-2 text-green-600">You have already completed this puzzle and cannot earn points.</i>
        @endif
        <div class="flex flex-col items-center gap-4">
            <div class="grid grid-cols-9 grid-rows-9" style="width: 750px; height: 750px">
                @for ($rowIndex = 0; $rowIndex < 9; $rowIndex++)
                    @for ($columnIndex = 0; $columnIndex < 9; $columnIndex++)
                        <div class="flex items-center justify-center border border-gray-300"
                             @if($rowIndex % 3 == 0 && $rowIndex != 0) style="border-top: 2px solid black; @if($columnIndex % 3 == 0 && $columnIndex != 0) border-left: 2px solid black"@endif @endif
                             @if($columnIndex % 3 == 0 && $columnIndex != 0) style="border-left: 2px solid black @endif"
                             wire:click="setGridItem({{$rowIndex}}, {{$columnIndex}})">
                            <p class="text-6xl">{{ $grid[$rowIndex][$columnIndex] }}</p>
                        </div>
                    @endfor
                @endfor
            </div>
            <div class="flex border" style="border-collapse: collapse">
                @for($possibleNumbers = 0; $possibleNumbers < 9; $possibleNumbers++)
                    <div class="py-4 px-4 @if(($possibleNumbers + 1) == $activeNumber) bg-red-50 @endif" wire:click="setActiveNumber({{$possibleNumbers + 1}})">
                        {{ $possibleNumbers + 1 }}
                    </div>
                @endfor
                <div class="py-4 px-4 @if($activeNumber == null) bg-red-50 @endif" wire:click="setActiveNumber()">
                    Empty
                </div>
            </div>
            <div>
                <button class="py-2 px-1 bg-blue-200 rounded-lg" wire:click="checkPuzzle">Check Puzzle</button>
                <button class="py-2 px-1 bg-red-200 rounded-lg" wire:confirm="Are you sure you want to reset the puzzle?" wire:click="resetPuzzle">Reset Puzzle</button>
            </div>
        </div>
    </div>



        @if($creating)
            <form action="#">
                <div class="bg-gray-100 p-2 ">
                    <p class="text-xl font-semibold">Edit panel</p>
                    <div class="flex gap-2 py-2">
                        <p>Name:</p>
                        <input type="text" wire:model="name" placeholder="name">
                    </div>
                    <div class="flex gap-2 py-2">
                        <p>Difficulty (1 - 5):</p>
                        <input type="number" wire:model="difficultyRating" placeholder="Difficulty rating">
                    </div>
                    <div class="flex gap-2 py-2">
                        <p>Points:</p>
                        <input type="number" wire:model="points" placeholder="Points">
                    </div>
                    {{--            <input type="number" wire:model="points" placeholder="points" value="{{ $puzzle->points }}">--}}
                    <div>
                        <button class="py-2 px-1 bg-blue-200 rounded-lg" wire:click="createOrUpdatePuzzle">Create/Update Puzzle</button>
                        @if($puzzle->exists)<button class="py-2 px-1 bg-blue-200 rounded-lg" wire:confirm="Are you sure you want to set the solution to the puzzle?" wire:click="setSolution">Set Solution</button>@endif
                        @if($puzzle->solution)<button class="py-2 px-1 bg-red-200 rounded-lg" wire:confirm="Are you sure you want to show the solution of the puzzle?" wire:click="seeSolutionInGrid">See Solution In Grid</button>@endif
                        @if($puzzle->completed)<button class="py-2 px-1 bg-red-200 rounded-lg" wire:click="uncomplete">Uncomplete</button>@endif
                    </div>
                </div>
            </form>
        @endif
</div>
