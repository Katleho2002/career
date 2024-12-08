<x-admin-layout x-data="{ open: false }">
    <div class="py-12">
        <!-- Stylish Header with Centered Text -->
        <div class="flex justify-center align-center mb-6">
            <h2 class="font-bold text-4xl text-indigo-600 leading-tight uppercase tracking-wide">
                {{ __('Admissions') }}
            </h2>
        </div>

        <!-- Admission List Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold pb-6 text-2xl text-center text-gray-800">Admission List</h2>
            
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-8 grid md:grid-cols-3 sm:grid-cols-2 gap-6">
                @forelse($admissions as $admission) 
                    <div class="bg-gray-800 text-white rounded-lg py-4 px-6 shadow-lg transform transition-all hover:scale-105">
                        <h3 class="font-semibold text-xl text-indigo-400 mb-2">
                            Student: {{$admission->application->student->full_name}}
                        </h3>
                        <p class="text-lg">Course: {{$admission->application->course->course_name}}</p>
                        <p class="text-md text-gray-400">{{'Faculty of ' . $admission->application->course->faculty->faculty_name}}</p>
                        <p class="text-md text-gray-400">{{'Institute: ' . $admission->application->course->faculty->institute->institute_name}}</p>
                        <span class="text-sm text-gray-300">{{"Admission date: " . $admission->created_at}}</span>
                    </div>
                @empty
                    <p class="text-gray-600 text-center">
                        No data just yet
                    </p> 
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>

<style>
    /* Global font and text styles */
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    /* Header Style */
    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .font-bold {
        font-weight: 700;
    }

    .text-indigo-600 {
        color: #5a67d8;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .tracking-wide {
        letter-spacing: 1px;
    }

    .text-4xl {
        font-size: 2.25rem;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .text-lg {
        font-size: 1.125rem;
    }

    .text-md {
        font-size: 1rem;
    }

    /* Admission Cards Styling */
    .bg-gray-800 {
        background-color: #2d3748;
    }

    .text-white {
        color: #fff;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .shadow-lg {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .hover\:scale-105:hover {
        transform: scale(1.05);
    }

    .gap-6 {
        gap: 1.5rem;
    }

    .text-indigo-400 {
        color: #63b3ed;
    }

    .text-gray-400 {
        color: #e2e8f0;
    }

    .text-gray-300 {
        color: #d1d5db;
    }

    /* Responsive Grid Layout */
    .md\:grid-cols-3 {
        grid-template-columns: repeat(3, 1fr);
    }

    .sm\:grid-cols-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    .sm\:rounded-lg {
        border-radius: 0.75rem;
    }

    /* Adding hover and focus effects for interactivity */
    .transform {
        transition: transform 0.3s ease;
    }
</style>
