<header x-data="{ menu: false }">
	<div class="relative bg-white">
	  <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
	    <div class="flex justify-start lg:w-0 lg:flex-1">
	      <a href="/">
	        <span class="sr-only">Your Company</span>
	        <img class="h-8 w-auto sm:h-10" src="{{config('app.logo')}}" alt="">
	      </a>
	    </div>
	    <div class="-my-2 -mr-2 md:hidden">
	      <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-expanded="false" x-on:click="menu = !menu">
	        <span class="sr-only">Open menu</span>
	        <!-- Heroicon name: outline/bars-3 -->
	        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
	          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
	        </svg>
	      </button>
	    </div>
	    <nav class="hidden space-x-10 md:flex">
	      @include('partials.front-sidebar')
	    </nav>
	    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
	        @auth
	            <a href="{{ url('admin') }}" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700">
	                Dashboard
	            </a>
	        @else
	            <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
	                Sign in
	            </a>
	            <a href="{{ route('register') }}" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700">
	                Sign up
	            </a>
	        @endif
	    </div>
	  </div>

	  <!--
	    Mobile menu, show/hide based on mobile menu state.

	    Entering: "duration-200 ease-out"
	      From: "opacity-0 scale-95"
	      To: "opacity-100 scale-100"
	    Leaving: "duration-100 ease-in"
	      From: "opacity-100 scale-100"
	      To: "opacity-0 scale-95"
	  -->
	  <div class="absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden" x-show="menu">
	    <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
	      <div class="px-5 pt-5 pb-6">
	        <div class="flex items-center justify-between">
	          <div>
	            <img class="h-8 w-auto" src="{{config('app.logo')}}" alt="Your Company">
	          </div>
	          <div class="-mr-2">
	            <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" x-on:click="menu = !menu">
	              <span class="sr-only">Close menu</span>
	              <!-- Heroicon name: outline/x-mark -->
	              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
	                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
	              </svg>
	            </button>
	          </div>
	        </div>
	      </div>
	      <div class="py-6 px-5">
	        <div class="grid grid-cols-2 gap-4">
	          	@include('partials.front-sidebar')
	        </div>
	        <div class="mt-6">
	        	@auth
		            <a href="{{ url('admin') }}" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700">
		                Dashboard
		            </a>
		        @else
		            <a href="{{ route('register') }}" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-7000">
		                Sign up
		            </a>
		            <p class="mt-6 text-center text-base font-medium text-gray-500">
			            Existing customer?
			            <a href="{{ route('login') }}" class="text-gray-900">Sign in</a>
			        </p>
		        @endif
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</header>