<?php

namespace App\Livewire;

use App\Models\Reward;
use Illuminate\Support\Collection;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RewardsIndex extends Component
{
    use WireToast;

    public Collection $rewards;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.rewards-index');
    }

    public function redeemReward($rewardId)
    {
        $reward = $this->rewards->find($rewardId);

        if ($reward->bought) {
            toast()
                ->warning('You have already redeemed this reward.')
                ->push();
        } else {
            if ($this->user->points >= $reward->value) {
                $reward->bought = true;
                $reward->save();

                $this->user->points -= $reward->value;
                $this->user->save();

                toast()
                    ->success('Congrats! You redeemed ' . $reward->name . '! Go ask Cornell for it!')
                    ->push();
            } else {
                toast()
                    ->warning('You do not have enough points to redeem this reward.')
                    ->push();
            }
        }
    }
}
