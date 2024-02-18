<?php

namespace App\Livewire;

use App\Models\Puzzle;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Sudoku extends Component
{
    use WireToast;

    public $name = null;
    public $points = 1;
    public $difficultyRating = 1;
    public $activeNumber = null;
    public $grid = [];
    public bool $creating = false;

    public ?Puzzle $puzzle = null;

    public function mount()
    {
        if ($this->puzzle->exists) {
            $this->grid = json_decode($this->puzzle->puzzle);

            $this->name = $this->puzzle->name;
            $this->difficultyRating = $this->puzzle->difficulty_rating;
            $this->points = $this->puzzle->points;
        } else {
            $grid = [];

            for ($rowIndex = 0; $rowIndex < 9; $rowIndex++) {
                for ($columnIndex = 0; $columnIndex < 9; $columnIndex++) {
                    $grid[$rowIndex][$columnIndex] = '';
                }
            }

            $this->grid = $grid;
        }
    }

    public function render()
    {
        return view('livewire.sudoku');
    }

    public function setActiveNumber($number = null)
    {
        $this->activeNumber = $number;
    }

    public function uncomplete()
    {
        $this->puzzle->completed = false;
        $this->puzzle->save();

        toast()
            ->success('Puzzle set as not completed')
            ->push();
    }

    public function setGridItem($rowIndex, $columnIndex)
    {
        if ($this->creating) {
            $this->grid[$rowIndex][$columnIndex] = $this->activeNumber;
        } else {
            $originalPuzzle = json_decode($this->puzzle->puzzle);

            // If not previously filled, fill grid item
            if ($originalPuzzle[$rowIndex][$columnIndex] == '') {
                $this->grid[$rowIndex][$columnIndex] = $this->activeNumber;
            }
        }
    }


    public function checkPuzzle()
    {
        if($this->grid == json_decode($this->puzzle->solution)) {
            if (!$this->puzzle->completed) {
                $user = auth()->user();

                $user->points += $this->puzzle->points;
                $user->save();

                $this->puzzle->completed = true;
                $this->puzzle->save();

                toast()
                    ->success('Well done! You completed the puzzle and earned ' . $this->puzzle->points . ' point(s)!')
                    ->push();

//                $this->redirect(route('dashboard'));
            }
        } else {
            toast()
                ->warning('Solution not yet correct')
                ->push();
        }
    }

    public function createOrUpdatePuzzle()
    {
        if ($this->puzzle->exists) {
            $this->puzzle->puzzle = json_encode($this->grid);
            $this->puzzle->name = $this->name;
            $this->puzzle->points = $this->points;
            $this->puzzle->difficulty_rating = $this->difficultyRating;
            $this->puzzle->save();

            toast()->success('Puzzle updated');
        } else {
            $puzzle = Puzzle::query()->create([
                'name' => $this->name,
                'type_id' => Puzzle::TYPES['SUDOKU'],
                'puzzle' => json_encode($this->grid),
                'points' => $this->points,
                'difficulty_rating' => $this->difficultyRating
            ]);

            $this->redirect(route('puzzles.edit', $puzzle));
        }
    }

    public function resetPuzzle()
    {
        $this->grid = json_decode($this->puzzle->puzzle);
    }

    public function seeSolutionInGrid()
    {
        if ($this->puzzle->solution) {
            $this->grid = json_decode($this->puzzle->solution);
        }
    }

    public function setSolution()
    {
        $this->puzzle->solution = json_encode($this->grid);
        $this->puzzle->save();

        toast()->success('Solution has been saved.');
    }
}
