<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1.5rem; background-color: #2C3E50; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
            <h1 style="font-family: 'Arial', sans-serif; font-weight: 700; font-size: 2.5rem; color: white; text-transform: uppercase; letter-spacing: 2px; background: linear-gradient(to right, #2C3E50, #2980B9); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);">
                Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        /* Removed blinking animation */
        #movingText {
            color: white;
        }

        /* Professional and modern styling for stats cards */
        .stats-container {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            gap: 1.5rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeIn 1s forwards; /* Fade-in animation for stats container */
        }

        .stats-card {
            background: #34495E;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .stats-card h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .stats-card p {
            font-size: 1.2rem;
            margin: 0;
        }

        .section-title {
            text-align: center;
            color: white;
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        /* Fade-in effect for stats container */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>

    <div class="py-12" style="background: linear-gradient(to bottom, #2980B9, #2C3E50); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="section-title">
                Your Stats
            </h2>
            <div class="stats-container">
                @can('institute')
                    <div class="stats-card">
                        <h3>Faculties</h3>
                        <p>{{Auth::user()?->institute?->faculty?count(Auth::user()?->institute?->faculty):0}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Courses</h3>
                        <p>{{count($courses)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Applications</h3>
                        <p>{{count($applications)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Admissions</h3>
                        <p>{{count($admissions)}}</p>
                    </div>
                @endcan
                @can('student')
                    <div class="stats-card">
                        <h3>Applications</h3>
                        <p>{{count(Auth::user()?->student?->application)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Courses you applied for</h3>
                        <p>{{count(Auth::user()?->student?->application)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Institutes</h3>
                        <p>{{count($student_institutes)}}</p>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
