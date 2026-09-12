
<!DOCTYPE html>
<html lang="en" @class(['dark' => ($theme ?? 'light') === 'dark'])>

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Digital Learner License Application Platform"
    >

    <title>Digital Learner License | LearnerPortal</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>


<body class="min-h-screen bg-white text-slate-900 antialiased dark:bg-slate-950 dark:text-white">

    <x-app-navbar />


    <!-- ========================================================= -->
    <!-- HERO -->
    <!-- ========================================================= -->

    <main>

        <section class="relative isolate overflow-hidden">

            <!-- Background grid -->
            <div
                class="pointer-events-none absolute inset-0 -z-10 opacity-[0.035]"
                style="background-image: linear-gradient(rgba(255,255,255,.8) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.8) 1px, transparent 1px); background-size: 48px 48px;"
            ></div>


            <!-- Glow -->
            <div class="pointer-events-none absolute left-1/2 top-[-180px]
                        -z-10 h-[500px] w-[500px]
                        -translate-x-1/2 rounded-full
                        bg-blue-600/20 blur-[120px]">
            </div>

            <div class="pointer-events-none absolute -right-40 top-40
                        -z-10 h-[400px] w-[400px]
                        rounded-full bg-indigo-600/10 blur-[100px]">
            </div>

            <div class="pointer-events-none absolute -left-40 top-[500px]
                        -z-10 h-[350px] w-[350px]
                        rounded-full bg-cyan-500/10 blur-[100px]">
            </div>


            <!-- Hero content -->
            <div class="mx-auto max-w-7xl px-5 pb-24 pt-16
                        sm:px-6 sm:pb-28 sm:pt-20
                        lg:px-8 lg:pb-32 lg:pt-28">

                <div class="mx-auto max-w-4xl text-center">

                    <!-- Badge -->
                    <div class="mb-7 inline-flex items-center gap-2.5
                                rounded-full border border-blue-400/20
                                bg-blue-400/[0.08] px-4 py-2
                                text-xs font-semibold text-blue-300
                                shadow-lg shadow-blue-500/5
                                sm:text-sm">

                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full
                                         animate-ping rounded-full
                                         bg-blue-400 opacity-60"></span>

                            <span class="relative inline-flex h-2 w-2
                                         rounded-full bg-blue-400"></span>
                        </span>

                        Digital Application Platform

                    </div>


                    <!-- Heading -->
                    <h1 class="text-4xl font-black leading-[1.08]
                               tracking-[-0.03em]
                               sm:text-5xl
                               md:text-6xl
                               lg:text-7xl">

                        Your Learner License,

                        <span class="mt-2 block bg-gradient-to-r
                                     from-blue-400 via-cyan-300
                                     to-blue-500 bg-clip-text
                                     text-transparent">
                            Completely Digital.
                        </span>

                    </h1>


                    <!-- Description -->
                    <p class="mx-auto mt-7 max-w-2xl text-base
                              leading-7 text-slate-400
                              sm:text-lg sm:leading-8">

                        Apply for your learner license online,
                        manage your application securely, and
                        access your digital license from one
                        simple platform.

                    </p>


                    <!-- CTA -->
                    <div class="mt-10 flex flex-col items-stretch
                                justify-center gap-3
                                sm:flex-row sm:items-center">

                        <a
                            href="{{ auth()->check() ? route('application') : route('login') }}"
                            class="group inline-flex items-center
                                   justify-center rounded-xl
                                   bg-blue-600 px-6 py-3.5
                                   text-sm font-bold  
                                   shadow-xl shadow-blue-600/20
                                   transition-all duration-200
                                   hover:-translate-y-0.5
                                   hover:bg-blue-500
                                   hover:shadow-blue-500/30
                                   sm:px-7"
                        >

                            Apply Now

                            <svg
                                class="ml-2 h-4 w-4 transition-transform
                                       group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />
                            </svg>

                        </a>


                        <a
                            href="{{ auth()->check() ? route('my-applications') : route('register') }}"
                            class="inline-flex items-center
                                   justify-center rounded-xl
                                   border border-white/10
                                   bg-white/[0.04] px-6 py-3.5
                                   text-sm font-bold  
                                   backdrop-blur-sm transition-all
                                   duration-200
                                   hover:-translate-y-0.5
                                   hover:border-white/20
                                   hover:bg-white/[0.08]
                                   sm:px-7"
                        >
                            {{ auth()->check() ? 'My Applications' : 'Create Account' }}
                        </a>

                    </div>


                    <!-- Trust indicators -->
                    <div class="mt-9 flex flex-wrap items-center
                                justify-center gap-x-6 gap-y-3
                                text-xs text-slate-500 sm:text-sm">

                        <div class="flex items-center gap-2">

                            <svg
                                class="h-4 w-4 text-emerald-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 00-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.053-.382-3.016z"
                                />
                            </svg>

                            Secure Platform

                        </div>


                        <span class="hidden h-1 w-1 rounded-full
                                     bg-slate-700 sm:block"></span>


                        <div class="flex items-center gap-2">

                            <svg
                                class="h-4 w-4 text-blue-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            Track Anytime

                        </div>


                        <span class="hidden h-1 w-1 rounded-full
                                     bg-slate-700 sm:block"></span>


                        <div class="flex items-center gap-2">

                            <svg
                                class="h-4 w-4 text-cyan-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                            Fully Digital

                        </div>

                    </div>

                </div>


                <!-- Hero visual -->
                <div class="mx-auto mt-16 max-w-5xl sm:mt-20">

                    <div class="relative rounded-2xl border
                                border-slate-200 dark:border-white/10
                                bg-slate-50 dark:bg-white/[0.025] p-2
                                shadow-2xl shadow-blue-950/30
                                backdrop-blur-xl
                                sm:rounded-3xl sm:p-3">

                        <div class="overflow-hidden rounded-xl border
                                    border-white/[0.06]
                                    bg-slate-900
                                    sm:rounded-2xl">

                            <!-- Browser header -->
                            <div class="flex h-10 items-center
                                        gap-2 border-b border-white/[0.06]
                                        bg-slate-950/70 px-4">

                                <span class="h-2.5 w-2.5 rounded-full
                                             bg-red-400/70"></span>

                                <span class="h-2.5 w-2.5 rounded-full
                                             bg-yellow-400/70"></span>

                                <span class="h-2.5 w-2.5 rounded-full
                                             bg-green-400/70"></span>

                                <div class="mx-auto hidden h-5 max-w-sm
                                            flex-1 rounded-md
                                            bg-white/[0.04] sm:block">
                                </div>

                            </div>


                            <!-- Dashboard preview -->
                            <div class="grid min-h-[220px]
                                        grid-cols-1 gap-4 p-5
                                        sm:min-h-[300px]
                                        sm:grid-cols-3 sm:p-8">

                                <div class="hidden rounded-xl
                                            border border-white/[0.06]
                                            bg-slate-50 dark:bg-white/[0.025]
                                            p-5 sm:block">

                                    <div class="h-3 w-20 rounded
                                                bg-white/10"></div>

                                    <div class="mt-6 space-y-3">

                                        <div class="h-2.5 rounded
                                                    bg-blue-500/30"></div>

                                        <div class="h-2.5 w-4/5 rounded
                                                    bg-white/5"></div>

                                        <div class="h-2.5 w-3/5 rounded
                                                    bg-white/5"></div>

                                    </div>

                                </div>


                                <div class="rounded-xl border
                                            border-blue-500/10
                                            bg-blue-500/[0.04] p-5">

                                    <div class="flex items-center
                                                justify-between">

                                        <div>
                                            <div class="h-2.5 w-24 rounded
                                                        bg-white/10"></div>

                                            <div class="mt-3 h-6 w-16 rounded
                                                        bg-blue-400/30"></div>
                                        </div>

                                        <div class="flex h-9 w-9
                                                    items-center justify-center
                                                    rounded-lg bg-blue-500/10">

                                            <svg
                                                class="h-4 w-4 text-blue-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                                                />
                                            </svg>

                                        </div>

                                    </div>

                                    <div class="mt-8 h-2 rounded
                                                bg-white/5"></div>

                                    <div class="mt-2 h-2 w-4/5 rounded
                                                bg-white/5"></div>

                                </div>


                                <div class="rounded-xl border
                                            border-emerald-500/10
                                            bg-emerald-500/[0.04] p-5">

                                    <div class="flex items-center
                                                justify-between">

                                        <div>
                                            <div class="h-2.5 w-20 rounded
                                                        bg-white/10"></div>

                                            <div class="mt-3 h-6 w-20 rounded
                                                        bg-emerald-400/30"></div>
                                        </div>

                                        <div class="flex h-9 w-9
                                                    items-center justify-center
                                                    rounded-lg bg-emerald-500/10">

                                            <svg
                                                class="h-4 w-4 text-emerald-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 13l4 4L19 7"
                                                />
                                            </svg>

                                        </div>

                                    </div>

                                    <div class="mt-8 h-2 rounded
                                                bg-white/5"></div>

                                    <div class="mt-2 h-2 w-3/5 rounded
                                                bg-white/5"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- ========================================================= -->
        <!-- FEATURES -->
        <!-- ========================================================= -->

        <section class="relative border-t border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-slate-900/40">

            <div class="mx-auto max-w-7xl px-5 py-20
                        sm:px-6 sm:py-24
                        lg:px-8">

                <!-- Section heading -->
                <div class="mx-auto max-w-2xl text-center">

                    <p class="text-xs font-bold uppercase
                              tracking-[0.2em] text-blue-400 sm:text-sm">
                        Everything you need
                    </p>

                    <h2 class="mt-3 text-3xl font-black
                               tracking-tight sm:text-4xl">
                        Simple. Fast. Digital.
                    </h2>

                    <p class="mt-4 text-sm leading-6 text-slate-400
                              sm:text-base sm:leading-7">
                        A streamlined platform designed to make
                        your learner license journey easier.
                    </p>

                </div>


                <!-- Feature cards -->
                <div class="mt-12 grid gap-5 md:grid-cols-3">

                    <!-- Card 1 -->
                    <div class="group relative overflow-hidden
                                rounded-2xl border border-slate-200 dark:border-white/10
                                bg-slate-50 dark:bg-white/[0.025] p-7
                                transition-all duration-300
                                hover:-translate-y-1
                                hover:border-blue-500/20
                                hover:bg-white/[0.04]">

                        <div class="absolute right-0 top-0 h-32 w-32
                                    rounded-full bg-blue-500/10
                                    blur-3xl opacity-0 transition
                                    group-hover:opacity-100">
                        </div>


                        <div class="relative flex h-12 w-12
                                    items-center justify-center
                                    rounded-xl bg-blue-500/10
                                    text-blue-400 ring-1
                                    ring-blue-500/10">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                                />
                            </svg>

                        </div>


                        <h3 class="relative mt-6 text-lg font-bold">
                            Easy Application
                        </h3>

                        <p class="relative mt-3 text-sm leading-6
                                  text-slate-400">
                            Complete your learner license application
                            through a clear and organized digital form.
                        </p>

                    </div>


                    <!-- Card 2 -->
                    <div class="group relative overflow-hidden
                                rounded-2xl border border-slate-200 dark:border-white/10
                                bg-slate-50 dark:bg-white/[0.025] p-7
                                transition-all duration-300
                                hover:-translate-y-1
                                hover:border-indigo-500/20
                                hover:bg-white/[0.04]">

                        <div class="absolute right-0 top-0 h-32 w-32
                                    rounded-full bg-indigo-500/10
                                    blur-3xl opacity-0 transition
                                    group-hover:opacity-100">
                        </div>


                        <div class="relative flex h-12 w-12
                                    items-center justify-center
                                    rounded-xl bg-indigo-500/10
                                    text-indigo-400 ring-1
                                    ring-indigo-500/10">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                        </div>


                        <h3 class="relative mt-6 text-lg font-bold">
                            Track Your Application
                        </h3>

                        <p class="relative mt-3 text-sm leading-6
                                  text-slate-400">
                            Keep an eye on your submitted applications
                            and check their current status anytime.
                        </p>

                    </div>


                    <!-- Card 3 -->
                    <div class="group relative overflow-hidden
                                rounded-2xl border border-slate-200 dark:border-white/10
                                bg-slate-50 dark:bg-white/[0.025] p-7
                                transition-all duration-300
                                hover:-translate-y-1
                                hover:border-emerald-500/20
                                hover:bg-white/[0.04]">

                        <div class="absolute right-0 top-0 h-32 w-32
                                    rounded-full bg-emerald-500/10
                                    blur-3xl opacity-0 transition
                                    group-hover:opacity-100">
                        </div>


                        <div class="relative flex h-12 w-12
                                    items-center justify-center
                                    rounded-xl bg-emerald-500/10
                                    text-emerald-400 ring-1
                                    ring-emerald-500/10">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 00-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.053-.382-3.016z"
                                />
                            </svg>

                        </div>


                        <h3 class="relative mt-6 text-lg font-bold">
                            Digital License Card
                        </h3>

                        <p class="relative mt-3 text-sm leading-6
                                  text-slate-400">
                            Access your generated digital learner
                            license card once your application is approved.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- ========================================================= -->
        <!-- HOW IT WORKS -->
        <!-- ========================================================= -->

        <section class="border-t border-slate-200 dark:border-white/10">

            <div class="mx-auto max-w-7xl px-5 py-20
                        sm:px-6 sm:py-24
                        lg:px-8">

                <div class="grid items-center gap-14
                            lg:grid-cols-2 lg:gap-20">

                    <!-- Text -->
                    <div>

                        <p class="text-xs font-bold uppercase
                                  tracking-[0.2em] text-blue-400">
                            How it works
                        </p>

                        <h2 class="mt-3 text-3xl font-black
                                   tracking-tight sm:text-4xl">
                            Your application,
                            <span class="text-blue-400">
                                simplified.
                            </span>
                        </h2>

                        <p class="mt-5 max-w-xl text-sm leading-7
                                  text-slate-400 sm:text-base">
                            Everything is organized into a simple
                            digital workflow so you can focus on
                            completing your application correctly.
                        </p>


                        <div class="mt-8 space-y-6">

                            <!-- Step -->
                            <div class="flex gap-4">

                                <div class="flex h-9 w-9 shrink-0
                                            items-center justify-center
                                            rounded-full border
                                            border-blue-500/20
                                            bg-blue-500/10
                                            text-sm font-bold
                                            text-blue-400">
                                    01
                                </div>

                                <div>
                                    <h3 class="font-bold">
                                        Create your account
                                    </h3>

                                    <p class="mt-1 text-sm leading-6
                                              text-slate-500">
                                        Register securely and set up
                                        your applicant profile.
                                    </p>
                                </div>

                            </div>


                            <!-- Step -->
                            <div class="flex gap-4">

                                <div class="flex h-9 w-9 shrink-0
                                            items-center justify-center
                                            rounded-full border
                                            border-blue-500/20
                                            bg-blue-500/10
                                            text-sm font-bold
                                            text-blue-400">
                                    02
                                </div>

                                <div>
                                    <h3 class="font-bold">
                                        Submit your application
                                    </h3>

                                    <p class="mt-1 text-sm leading-6
                                              text-slate-500">
                                        Enter your information and
                                        submit your learner license application.
                                    </p>
                                </div>

                            </div>


                            <!-- Step -->
                            <div class="flex gap-4">

                                <div class="flex h-9 w-9 shrink-0
                                            items-center justify-center
                                            rounded-full border
                                            border-emerald-500/20
                                            bg-emerald-500/10
                                            text-sm font-bold
                                            text-emerald-400">
                                    03
                                </div>

                                <div>
                                    <h3 class="font-bold">
                                        Track & access your license
                                    </h3>

                                    <p class="mt-1 text-sm leading-6
                                              text-slate-500">
                                        Monitor your application and
                                        access your digital license when approved.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Visual card -->
                    <div class="relative">

                        <div class="absolute -inset-4 rounded-3xl
                                    bg-blue-500/10 blur-3xl">
                        </div>


                        <div class="relative rounded-3xl border
                                    border-slate-200 dark:border-white/10
                                    bg-slate-900/80 p-6
                                    shadow-2xl
                                    backdrop-blur-xl sm:p-8">

                            <div class="flex items-center
                                        justify-between">

                                <div>
                                    <p class="text-xs text-slate-500">
                                        APPLICATION
                                    </p>

                                    <p class="mt-1 text-lg font-bold">
                                        Learner License
                                    </p>
                                </div>

                                <div class="rounded-full
                                            bg-emerald-500/10
                                            px-3 py-1 text-xs
                                            font-semibold
                                            text-emerald-400">
                                    Approved
                                </div>

                            </div>


                            <div class="mt-8 space-y-4">

                                <div class="rounded-xl border
                                            border-white/[0.06]
                                            bg-slate-50 dark:bg-white/[0.025] p-4">

                                    <div class="flex items-center
                                                justify-between">

                                        <span class="text-xs text-slate-500">
                                            Application Status
                                        </span>

                                        <span class="text-xs font-semibold
                                                     text-emerald-400">
                                            Completed
                                        </span>

                                    </div>

                                    <div class="mt-3 h-2 overflow-hidden
                                                rounded-full bg-white/5">

                                        <div class="h-full w-full
                                                    rounded-full
                                                    bg-emerald-500">
                                        </div>

                                    </div>

                                </div>


                                <div class="grid grid-cols-2 gap-4">

                                    <div class="rounded-xl border
                                                border-white/[0.06]
                                                bg-slate-50 dark:bg-white/[0.025] p-4">

                                        <p class="text-xs text-slate-500">
                                            STATUS
                                        </p>

                                        <p class="mt-2 text-sm font-bold
                                                   ">
                                            Verified
                                        </p>

                                    </div>


                                    <div class="rounded-xl border
                                                border-white/[0.06]
                                                bg-slate-50 dark:bg-white/[0.025] p-4">

                                        <p class="text-xs text-slate-500">
                                            ACCESS
                                        </p>

                                        <p class="mt-2 text-sm font-bold
                                                   ">
                                            Digital
                                        </p>

                                    </div>

                                </div>


                                <div class="flex items-center gap-3
                                            rounded-xl border
                                            border-blue-500/10
                                            bg-blue-500/[0.05]
                                            p-4">

                                    <div class="flex h-9 w-9
                                                items-center justify-center
                                                rounded-lg
                                                bg-blue-500/10">

                                        <svg
                                            class="h-4 w-4 text-blue-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2zm10-10V6a4 4 0 00-8 0v3h8z"
                                            />
                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold">
                                            Secure Digital Access
                                        </p>

                                        <p class="mt-0.5 text-[11px]
                                                  text-slate-500">
                                            Your application information
                                            is protected.
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- ========================================================= -->
        <!-- CTA -->
        <!-- ========================================================= -->

        <section class="px-5 py-16 sm:px-6 sm:py-20 lg:px-8">

            <div class="relative mx-auto max-w-7xl overflow-hidden
                        rounded-3xl border border-blue-500/20
                        bg-gradient-to-br from-blue-600/20
                        via-slate-900 to-indigo-600/10
                        px-6 py-14 text-center
                        sm:px-10 sm:py-16">

                <div class="pointer-events-none absolute
                            left-1/2 top-0 h-64 w-64
                            -translate-x-1/2 rounded-full
                            bg-blue-500/20 blur-[100px]">
                </div>


                <div class="relative">

                    <p class="text-xs font-bold uppercase
                              tracking-[0.2em] text-blue-400">
                        Ready to get started?
                    </p>

                    <h2 class="mt-3 text-3xl font-black
                               tracking-tight sm:text-4xl">
                        Start your digital application today.
                    </h2>

                    <p class="mx-auto mt-4 max-w-xl text-sm
                              leading-6 text-slate-400 sm:text-base">
                        Create your account and begin your learner
                        license application in just a few steps.
                    </p>


                    <div class="mt-8 flex flex-col justify-center
                                gap-3 sm:flex-row">

                        <a
                            href="{{ auth()->check() ? route('application') : route('register') }}"
                            class="inline-flex items-center justify-center
                                   rounded-xl bg-white px-6 py-3.5
                                   text-sm font-bold text-slate-950
                                   transition hover:bg-slate-200"
                        >
                            {{ auth()->check() ? 'Continue Application' : 'Create Your Account' }}

                            <svg
                                class="ml-2 h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />
                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- ========================================================= -->
    <!-- FOOTER -->
    <!-- ========================================================= -->

    <footer class="border-t border-slate-200 dark:border-white/10">

        <div class="mx-auto max-w-7xl px-5 py-8
                    sm:px-6 lg:px-8">

            <div class="flex flex-col items-center
                        justify-between gap-4
                        text-center text-xs text-slate-500
                        sm:flex-row sm:text-left">

                <div>
                    © {{ date('Y') }} LearnerPortal.
                    All rights reserved.
                </div>

                <div class="flex items-center gap-2">

                    <span class="h-1.5 w-1.5 rounded-full
                                 bg-emerald-400"></span>

                    Digital Learner License Application Platform

                </div>

            </div>

        </div>

    </footer>

</body>

</html>
