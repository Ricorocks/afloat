<nav class="bg-gradient-to-b from-brandblue/[.7]" x-data="{ isMainOpen: false, isProfileOpen: false, isNotificationActive: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-brandwhite hover:bg-brandblue hover:text-brandwhite focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brandwhite" 
            aria-controls="mobile-menu" aria-expanded="false"
            @click="isMainOpen = !isMainOpen"
            >
            <span class="sr-only">Open main menu</span>
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" :class="{ 'hidden': isMainOpen }">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" :class="{ 'hidden': !isMainOpen }">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <a href="/">
                <img class="block h-8 w-auto lg:hidden" src="{{ asset('assets/logos/afloat/afloat-white.svg') }}" alt="Your Company">
                <img class="hidden h-8 w-auto lg:block" src="{{ asset('assets/logos/afloat/afloat-white.svg') }}" alt="Your Company">
            </a>
          </div>
          @if(!$hide_menu->raw())
          <div class="hidden sm:ml-6 sm:flex sm:flex-1 items-center justify-center my-auto">
            <div class="flex space-x-4">
              @foreach(Statamic::tag('nav:marina_customer_main') as $entry)
                <a href="{{ $entry['url']->value() }}" 
                    class="text-brandwhite hover:bg-brandlightblue/[0.8] hover:text-brandblue rounded-md font-medium px-3 py-2
                    @if($entry['is_current']) bg-brandblue/[0.5]  @endif">
                {{ $entry['title']->value() }}
                </a>
              @endforeach
            </div>
          </div>
          @endif
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
          :class="{ 'hidden': !isNotificationActive }"  x-cloak  >
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
  
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              {{-- <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true"
              @click="isProfileOpen = !isProfileOpen">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button> --}}
              @include('layouts.pagecomponents.loginswitcher')
            </div>
            
  
            <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            {{-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                :class="{ 'hidden': !isProfileOpen }" x-show.transition="true"  x-cloak >
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  
    <div class="sm:hidden" id="mobile-menu" :class="{ 'hidden': !isMainOpen }" x-cloak x-show.transition="true" >
      <div class="space-y-1 px-2 pb-3 pt-2 bg-brandblue shadow-lg ">
        <div class="py-7">
            @foreach(Statamic::tag('nav:marina_customer_main') as $entry)
            <a href="{{ $entry['url']->value() }}"
                class="text-brandwhite hover:bg-brandlightblue hover:text-brandblue block rounded-md px-3 py-2 text-base font-medium
                @if($entry['is_parent'] || $entry['is_current']) font-bold bg-gray-900  @endif">
              {{ $entry['title']->value() }}
            </a>
            @endforeach
        </div>

      </div>
    </div>
  </nav>