<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 2rem; background-color: #004d73; border-radius: 15px; box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);">
            <h1 id="headerText" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: 700; font-size: 3.2rem; color: white; text-transform: uppercase; letter-spacing: 2px; background: linear-gradient(to right, #004d73, #00bfae); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        /* Styling for the header */
        #headerText {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            font-size: 3.2rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(to right, #004d73, #00bfae);
            -webkit-background-clip: text;
            background-clip: text;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Styling for the page background */
        .py-12 {
            background: linear-gradient(to top, #00bfae, #004d73);
            min-height: 100vh;
            padding: 4rem 0;
        }

        /* Styling for the main container */
        .max-w-7xl {
            max-width: 90%;
            margin: 0 auto;
        }

        /* Course form container */
        .bg-white {
            background-color: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 3rem;
        }

        /* Text styling */
        h2 {
            font-size: 1.5rem;
            color: #004d73;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        /* Button styling for course creation */
        .primary-button {
            background-color: #00bfae;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, transform 0.2s;
        }

        .primary-button:hover {
            background-color: #004d73;
            transform: scale(1.05);
        }

        /* Course card container */
        .course-card {
            background-color: #f9f9f9;
            padding: 1.25rem;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #333;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            margin-bottom: 1.5rem;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .course-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #004d73;
        }

        .course-card p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .course-card span {
            font-size: 0.9rem;
            color: #888;
        }

        /* Course list container */
        .course-list-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        /* Pagination Styling */
        .pagination-container {
            margin-top: 2rem;
            text-align: center;
        }

        /* Text and link styling */
        .text-gray-500 {
            color: #666;
        }

        .text-sm {
            font-size: 0.875rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold pb-3 text-xl" style="color: #004d73; text-align: center; font-size: 1.5rem; text-transform: uppercase;">
                New Course
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Include Course Form -->
                @include('course.course-form')
            </div>
        </div>
    </div>
</x-app-layout>
