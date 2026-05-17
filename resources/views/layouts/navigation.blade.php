<nav x-data="{ open: false, dark: document.documentElement.classList.contains('dark') }" class="bg-[#12284B] dark:bg-slate-900 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2.5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                        <div class="bg-white p-1.5 rounded-lg shadow-sm flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo BPD Kaltimtara" class="h-6">
                        </div>
                        <div class="hidden sm:block ml-1">
                            <span class="text-white font-bold text-sm tracking-wide">SIPDA</span>
                            <span class="text-sky-300 text-[10px] block -mt-0.5 font-medium">BPD Kaltim Kaltara</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:ms-8 sm:flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                              {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('archive.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                              {{ request()->routeIs('archive.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        Arsip
                    </a>
                    <a href="{{ route('kode_arsip.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                              {{ request()->routeIs('kode_arsip.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        Kode Arsip
                    </a>
                    @if(auth()->user()?->role === 'admin')
                        <a href="{{ route('admin.pegawai.index') }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                  {{ request()->routeIs('admin.pegawai.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                            Kelola Pegawai
                        </a>
                    @endif
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                <button type="button" @click="dark = !dark; window.toggleSipdaTheme()"
                    class="inline-flex items-center justify-center h-9 w-9 rounded-xl bg-white/10 text-white hover:bg-white/20 transition">
                    <svg x-show="!dark" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m9-9h-2.25M5.25 12H3m15.364-6.364l-1.59 1.59M7.226 16.774l-1.59 1.59m0-11.154l1.59 1.59m9.548 9.548l1.59 1.59M12 6.75a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5z"/></svg>
                    <svg x-show="dark" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0112.003 21C6.477 21 2 16.523 2 10.997c0-4.133 2.48-7.687 6.033-9.253a.75.75 0 01.98.946A7.5 7.5 0 0018.31 14.99a.75.75 0 01.943 1.012z"/></svg>
                </button>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/10 text-sm font-medium text-white hover:bg-white/20 transition-all duration-200 focus:outline-none">
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-300 hover:text-white hover:bg-white/10 transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#1e2a38] dark:bg-slate-900 border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                Dashboard
            </a>
            <a href="{{ route('archive.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('archive.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                Arsip
            </a>
            <a href="{{ route('kode_arsip.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('kode_arsip.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                Kode Arsip
            </a>
            @if(auth()->user()?->role === 'admin')
                <a href="{{ route('admin.pegawai.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('admin.pegawai.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                    Kelola Pegawai
                </a>
            @endif
        </div>

        <div class="pt-3 pb-3 border-t border-white/10 px-4">
            <div class="flex items-center gap-3 mb-3">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-500 text-white text-xs font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
                <div>
                    <div class="text-sm font-semibold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <button type="button" @click="dark = !dark; window.toggleSipdaTheme()" class="w-full inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-white/10">
                    <svg x-show="!dark" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m0 13.5V21m9-9h-2.25M5.25 12H3m15.364-6.364l-1.59 1.59M7.226 16.774l-1.59 1.59m0-11.154l1.59 1.59m9.548 9.548l1.59 1.59M12 6.75a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5z"/></svg>
                    <svg x-show="dark" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0112.003 21C6.477 21 2 16.523 2 10.997c0-4.133 2.48-7.687 6.033-9.253a.75.75 0 01.98.946A7.5 7.5 0 0018.31 14.99a.75.75 0 01.943 1.012z"/></svg>
                    <span>Mode Gelap</span>
                </button>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-white/10">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-white/10">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>
