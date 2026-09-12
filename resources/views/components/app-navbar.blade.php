@php
    $isDark = ($theme ?? 'light') === 'dark';
    $isAdmin = auth()->user()?->role === 'admin';
    $nextTheme = $isDark ? 'light' : 'dark';
@endphp

<nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 text-slate-800 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/80 dark:text-white">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-3 px-5 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-600 shadow-lg shadow-blue-600/20 transition group-hover:scale-105">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V5a4 4 0 018 0v2m-9 0h10a2 2 0 012 2v9a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z"
                    />
                </svg>
            </div>

            <div class="text-base font-bold tracking-tight text-slate-900 dark:text-white sm:text-lg">
                Learner<span class="text-blue-600 dark:text-blue-400">Portal</span>
            </div>
        </a>

        <div class="flex flex-wrap items-center justify-end gap-1.5 sm:gap-3">
            <form method="POST" action="{{ route('theme.update') }}">
                @csrf
                <input type="hidden" name="theme" value="{{ $nextTheme }}">
                <button
                    type="submit"
                    class="inline-flex items-center rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-white/10"
                    aria-label="Switch to {{ $nextTheme }} mode"
                >
                    @if ($isDark)
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2.25M12 18.75V21M4.5 12H2.25M21.75 12H19.5M6.34 6.34L4.76 4.76M19.24 19.24l-1.58-1.58M17.66 6.34l1.58-1.58M4.76 19.24l1.58-1.58M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <span class="ml-2 hidden sm:inline">Light</span>
                    @else
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                        </svg>
                        <span class="ml-2 hidden sm:inline">Dark</span>
                    @endif
                </button>
            </form>

            @guest
                <a
                    href="{{ route('login') }}"
                    class="rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white sm:px-4 {{ request()->routeIs('login') ? 'bg-slate-100 dark:bg-white/10' : '' }}"
                >
                    Login
                </a>

                <a
                    href="{{ route('register') }}"
                    class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800 dark:bg-white dark:text-slate-950 dark:hover:bg-slate-200 sm:px-5"
                >
                    Register
                </a>
            @else
                @if ($isAdmin)
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white sm:px-4 {{ request()->routeIs('admin.*') ? 'bg-slate-100 dark:bg-white/10' : '' }}"
                    >
                        Admin Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('my-applications') }}"
                        class="rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white sm:px-4 {{ request()->routeIs('my-applications') ? 'bg-slate-100 dark:bg-white/10' : '' }}"
                    >
                        My Applications
                    </a>

                    <a
                        href="{{ route('application') }}"
                        class="rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white sm:px-4 {{ request()->routeIs('application') ? 'bg-slate-100 dark:bg-white/10' : '' }}"
                    >
                        Apply
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-500"
                    >
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
