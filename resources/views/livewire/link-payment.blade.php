<div class="flex my-24 items-end justify-center text-center sm:items-center">
    @if($step==1)
        <div class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:w-full sm:max-w-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white">
            <div class="p-8">
              <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-blue-100">
                <img src="{{$wallet->logo}}" />
              </div>
              <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg font-bold leading-6" id="modal-title">{{$wallet->public_name}}</h3>
                <div class="mt-2 text-sm">
                  {!! $wallet->description !!}
                </div>
              </div>
            </div>
            <div class="bg-white text-black px-8 py-6 text-center">
                <div class="max-w-xs mx-auto">
                    <form wire:submit.prevent="firstStep">
                        <label for="price" class="block text-sm font-medium text-gray-700">Send Payment</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                              <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input wire:model="total" type="text" name="price" id="price" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="0.00" aria-describedby="price-currency">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                              <span class="text-gray-500 sm:text-sm" id="price-currency">SC</span>
                            </div>
                        </div>
                        @error('total') 
                            <p class="mt-1 text-xs text-red-600 text-left">{{ $message }}</p> 
                        @enderror

                        <div class="mt-5 sm:mt-6 ">
                          <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif($step==2)
        <div class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:w-full sm:max-w-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white">
            <div class="p-8">
              <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                <img src="{{$wallet->logo}}" />
              </div>
              <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg font-bold leading-6" id="modal-title">{{$wallet->public_name}}</h3>
                <p class="text-sm mt-2">Paying ${{number_format($total, 2)}}</p>
              </div>

            </div>
            <div class="bg-white text-black px-8 py-6">
                <div class="max-w-xs mx-auto">
                    @include('flash::message')
                    <form wire:submit.prevent="pay">
                        <div>
                          <h2 class="text-lg font-medium leading-6 text-gray-900">Select wallet</h2>
                          <p class="mt-1 text-sm text-gray-500">Pay with any of your current wallets.</p>
                          <fieldset class="mt-2">
                            <legend class="sr-only">Wallets</legend>
                            <div class="divide-y divide-gray-200">
                                @foreach(auth()->user()->wallets()->get() as $wallet)
                                  <div class="relative flex items-start py-4">
                                    <div class="min-w-0 flex-1 text-sm">
                                      <label for="account-checking" class="font-medium text-gray-700">{{$wallet->name}}</label>
                                      <p id="account-checking-description" class="text-gray-500">Balance: ${{number_format($wallet->balanceCow, 2)}}</p>
                                    </div>
                                    <div class="ml-3 flex h-5 items-center">
                                      <input wire:model="wallet_to_pay" id="account-checking" aria-describedby="account-checking-description" name="account" type="radio" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" value="{{$wallet->id}}" />
                                    </div>
                                  </div>
                                @endforeach
                          </fieldset>
                            @error('wallet_to_pay') 
                                <p class="mt-1 text-xs text-red-600 text-left">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mt-5 sm:mt-6 ">
                          <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif($step==3)
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6" @click.away="open = false">
              <div>
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                  <svg class="h-6 w-6 text-green-600" x-description="Heroicon name: outline/check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                </svg>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                  <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Payment successful</h3>
                  <div class="mt-2 text-sm text-gray-500">
                    <p>Thanks for using Sea Cow for your payments. </p>
                    <p>You should receive a notification about the payment.</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endif 

        
</div>