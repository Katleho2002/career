<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Higher Learning') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        /* Body Styles */
        body {
            background-color: #f5f5f5;
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
        }

        /* Sidebar Styles */
        aside {
            background-color: #1f2937; /* Dark background */
            color: #D1D5DB; /* Light gray text */
            width: 250px;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        aside:hover {
            transform: translateX(0);
        }

        aside .title {
            font-size: 1rem;
            font-weight: 600;
            color: #D1D5DB;
            text-transform: uppercase;
            padding-left: 12px;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        /* Sidebar Links */
        x-responsive-admin-nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        x-responsive-admin-nav-link:hover {
            background-color: #4C51BF;
            color: white;
            border-radius: 5px;
        }

        x-responsive-admin-nav-link .title:hover {
            color: #ffffff;
        }

        /* Sidebar Icon */
        x-carbon-dashboard, x-carbon-book, x-carbon-box, x-carbon-course, x-carbon-application, x-carbon-checkmark-outline {
            transition: transform 0.3s ease;
        }

        x-responsive-admin-nav-link:hover x-carbon-dashboard,
        x-responsive-admin-nav-link:hover x-carbon-book,
        x-responsive-admin-nav-link:hover x-carbon-box,
        x-responsive-admin-nav-link:hover x-carbon-course,
        x-responsive-admin-nav-link:hover x-carbon-application,
        x-responsive-admin-nav-link:hover x-carbon-checkmark-outline {
            transform: scale(1.1);
        }

        /* Header Styles */
        #header {
            background-color: #3B82F6; /* Bright blue for header */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        #header .max-w-7xl {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Main Content Section */
        section {
            background-color: #E5E7EB; /* Light gray background for content area */
            padding-top: 90px;
        }

        section h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        section p {
            font-size: 1rem;
            color: #555;
        }

        /* Button Styles */
        button {
            background-color: #3B82F6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #2563EB;
            transform: translateY(-3px);
        }

        /* Dropdown Menu */
        .x-dropdown-link {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            margin-top: 5px;
            background-color: #fff;
            color: #1F2937;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .x-dropdown-link:hover {
            background-color: #E5E7EB;
            color: #1F2937;
            transform: translateY(-2px);
        }

        /* Icon Sizes */
        .x-carbon-dashboard,
        .x-carbon-book,
        .x-carbon-box,
        .x-carbon-course,
        .x-carbon-application,
        .x-carbon-checkmark-outline {
            width: 20px;
            height: 20px;
        }

        .x-carbon-user-avatar {
            width: 18px;
            height: 18px;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            aside {
                width: 60px;
                padding-top: 10px;
            }

            aside .title {
                display: none;
            }

            aside:hover {
                width: 250px;
            }

            .x-dropdown-link {
                padding: 12px;
            }
        }

        @media screen and (max-width: 640px) {
            #header {
                padding: 10px;
            }

            .title {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body class="font-sans antialiased pb-3">
    <div class=" bg-gray-100">
        <!-- Page Content -->
        <main class="max-[640px]:px-4">
            <div class="">
                <aside class="bg-gray-800 text-indigo-500 fixed top-0 py-6 pr-2 left-0 bottom-0">
                    <x-responsive-admin-nav-link href="/dashboard" :active="request()->is('dashboard')">
                        <x-carbon-dashboard class="{{request()->is('dashboard') ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Dashboard</span>
                    </x-responsive-admin-nav-link>
                    <x-responsive-admin-nav-link href="/ad/institute" :active="request()->is('ad/institute') || request()->is('ad/institute/*')">
                        <x-carbon-book class="{{(request()->is('ad/institute') ||request()->is('ad/institute/*')) ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Institutes</span>
                    </x-responsive-admin-nav-link>
                    <x-responsive-admin-nav-link href="/ad/faculty" :active="request()->is('ad/faculty') || request()->is('ad/faculty/*')">
                        <x-carbon-box class="{{(request()->is('ad/faculty') || request()->is('ad/faculty/*')) ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Faculties</span>
                    </x-responsive-admin-nav-link>
                    <x-responsive-admin-nav-link href="/ad/course" :active="request()->is('ad/course') ||request()->is('ad/course/*')">
                        <x-carbon-course class="{{(request()->is('ad/course') ||request()->is('ad/course/*')) ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Courses</span>
                    </x-responsive-admin-nav-link>
                    <x-responsive-admin-nav-link href="/ad/applications" :active="request()->is('ad/applications') || request()->is('ad/applications/*')">
                        <x-carbon-application class="{{(request()->is('ad/applications') || request()->is('ad/applications/*')) ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Applications</span>
                    </x-responsive-admin-nav-link>
                    <x-responsive-admin-nav-link href="/ad/admissions" :active="request()->is('ad/admissions')">
                        <x-carbon-checkmark-outline class="{{request()->is('ad/admissions') ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Admissions</span>
                    </x-responsive-admin-nav-link>
                    <hr>
                    <x-responsive-admin-nav-link href="/ad/create" :active="request()->is('ad/create')">
                        <x-carbon-user-avatar class="{{request()->is('ad/create') ? 'text-indigo-500' : 'text-gray-100'}} h-5 w-5" />
                        <span class="title">Create Admin</span>
                    </x-responsive-admin-nav-link>
                </aside>
                <section class="py-10 mt-28 max-w-7xl mx-auto">
                    <h2 class="text-2xl font-semibold mb-5 text-gray-800">Welcome, Admin</h2>
                    <p class="text-gray-700">Manage Institutes, Faculties, Courses, Applications, and Admissions from this dashboard.</p>
                </section>
            </div>
        </main>
    </div>
</body>

</html>
