<div class="flex justify-between items-center">
    <h2 id="menu" class="font-semibold text-xl text-white leading-tight cursor-pointer hover:text-blue-500 transition duration-300 ease-in-out transform hover:scale-110">
        <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </h2>
        
    <div class="hidden sm:flex sm:items-center sm:ms-6"> 
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-gradient-to-r from-teal-500 to-blue-500 hover:bg-gradient-to-l hover:from-teal-400 hover:to-blue-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                    <div class="flex gap-2 items-center">
                        <x-carbon-user-filled class="h-6 w-6 text-white"/> 
                        {{ 'Admin' }}
                    </div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link href="/ad/profile" class="text-teal-500 hover:text-blue-500 hover:bg-teal-100 transition duration-300">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" 
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-red-500 hover:text-white hover:bg-red-500 transition duration-300">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div> 
</div>
