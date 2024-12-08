<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gradient-to-r from-indigo-500 to-purple-600">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Higher Learning') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Global Styles */
        body {
            font-family: 'Figtree', sans-serif;
            background: #f0f4f8; /* Soft background color */
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-gradient-to-r {
            background: linear-gradient(to right, #4F46E5, #9333EA); /* Gradient background */
        }

        .font-sans {
            font-family: 'Figtree', sans-serif;
        }

        .antialiased {
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        .bg-gray-100 {
            background-color: #f5f5f5;
        }

        /* Header Styles */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header .max-w-7xl {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            color: #4B5563;
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #4F46E5; /* Eye-catching color */
        }

        /* Navigation */
        .navigation {
            display: flex;
            justify-content: space-between;
            background-color: #4F46E5;
            padding: 15px 40px;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navigation a {
            text-decoration: none;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navigation a:hover {
            color: #9333EA; /* Highlight color on hover */
            transform: scale(1.05);
        }

        /* Page Content */
        .content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.1rem;
            color: #4B5563;
            line-height: 1.7;
        }

        /* Button Styles */
        button {
            background-color: #9333EA; /* Bright accent color */
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #4F46E5; /* Hover color */
            transform: translateY(-5px);
        }

        /* Footer Styles */
        footer {
            background-color: #4F46E5;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        footer p {
            font-size: 1rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            header .max-w-7xl {
                padding: 20px;
            }

            .navigation {
                flex-direction: column;
                align-items: center;
                padding: 15px;
            }

            .navigation a {
                margin: 5px 0;
            }

            .content {
                padding: 20px 15px;
            }

            button {
                width: 100%;
                padding: 15px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body class="font-sans antialiased h-full">
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="content max-[640px]:px-4">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Higher Learning. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>
