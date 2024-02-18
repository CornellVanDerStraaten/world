<div>
    <h1 class="mb-3 text-3xl font-semibold">Rewards - You have {{ $user->points }} point(s)</h1>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach($rewards as $reward)
        <li >
            <div class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-gray-50 text-center shadow">
                <div class="flex flex-1 flex-col p-3">
                    <h3 class="mt-1 text-xl font-medium text-gray-900">{{ $reward->name }}</h3>
                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                            <dd class="mt-3">
                                @if($reward->bought)
                                    <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Redeemed</span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Not Redeemed</span>
                                @endif
                            </dd>
                    </dl>
                </div>
                <div>
                    @if($reward->bought)
                    <div class="-mt-px flex divide-x divide-gray-200">
{{--                        <div class="flex w-0 flex-1 text-center" style="flex-direction: column">--}}
{{--                            <small class="mt-2">Price</small>--}}
{{--                            <p class="text-xl mb-2 font-semibold">{{ $reward->value }} Points</p>--}}
{{--                        </div>--}}
                        <div class="flex w-0 flex-1 text-center" style="flex-direction: column">
                            <small class="mt-2">{{ $reward->value }} Points</small>
                            <p class="text-xl mb-2 font-semibold">Already Redeemed</p>
                        </div>
                    </div>
                    @else
                        <div class="-mt-px flex divide-x divide-gray-200 hover:bg-gray-100 hover:cursor-pointer" wire:confirm="Are you sure you want to redeem {{ $reward->name }} for {{ $reward->value }} points?" wire:click="redeemReward({{$reward->id}})">
                            {{--                        <div class="flex w-0 flex-1 text-center" style="flex-direction: column">--}}
                            {{--                            <small class="mt-2">Price</small>--}}
                            {{--                            <p class="text-xl mb-2 font-semibold">{{ $reward->value }} Points</p>--}}
                            {{--                        </div>--}}
                            <div class="flex w-0 flex-1 text-center" style="flex-direction: column">
                                <small class="mt-2">{{ $reward->value }} Points</small>
                                <p class="text-xl mb-2 font-semibold">Redeem</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
        </ul>

</div>
