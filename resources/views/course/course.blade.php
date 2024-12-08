<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1.5rem; background: #2b8a3e; border-radius: 12px; box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2); position: relative;">
            <!-- Header Title with New Gradient -->
            <h1 id="headerText" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 900; font-size: 3.5rem; color: white; text-transform: uppercase; letter-spacing: 5px; background: linear-gradient(to right, #2b8a3e, #57c26e); -webkit-background-clip: text; background-clip: text; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);">
            Career Guidance Web Application
            </h1>

            <!-- Button for Course Creation (only visible to Institutes) -->
            @auth
                @if (Auth::user()->institute)
                    <a href="{{ route('course.create') }}" id="createCourseButton" style="position: absolute; bottom: 20px; right: 20px;">
                        <x-primary-button @click="open = !open" style="background: #57c26e; border: none; color: white; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: bold; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); transition: background 0.3s;">
                            Create a New Course
                        </x-primary-button>
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <style>
        /* Styling for the Course Cards */
        .course-card {
            background: #f7fafc;
            border-radius: 10px;
            padding: 1.25rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #333;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .course-card h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: #2b8a3e;
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

        /* Styling for Course List Container */
        .course-list-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        /* Styling for the Page */
        .page-container {
            background: #e8f9f4;
            min-height: 100vh;
            padding: 3rem 2rem;
        }

        /* Pagination Styling */
        .pagination-container {
            margin-top: 2rem;
            text-align: center;
        }
    </style>

    <div class="page-container">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-semibold text-2xl text-center text-gray-800 mb-6" style="text-transform: uppercase; font-weight: 600;">
                Explore Our Courses
            </h2>
            
            <!-- Courses Grid -->
            <div class="course-list-container">
                @foreach($courses as $course)
                    <div class="course-card">
                        <a href="{{ route('course.show', $course->id) }}">
                            <h3 class="text-lg font-semibold">{{ $course->level . ' in ' . $course->course_name }}</h3>
                        </a>

                        <p>{{ 'Faculty: ' . $course->faculty->faculty_name }}</p>

                        <div class="text-sm text-gray-500 mt-2">
                            <span>{{ $course->level }}</span> | <span>{{ $course->course_duration }} months</span>
                        </div>

                        <p class="mt-2 text-sm">{{ 'Institute: ' . $course->faculty->institute->institute_name }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @cannot('institute')
                <div class="pagination-container">
                    {{$courses->links()}}
                </div>
            @endcannot
        </div>

        <!-- Success Modals -->
        @if (session('status') === 'course-deleted')
            <x-confirm-modal :name="'course-deleted'" :content="'The course was deleted successfully.'">
            </x-confirm-modal>
        @endif

        @if (session('status') === 'application-created')
            <x-confirm-modal :name="'application-created'" :content="'Your application has been submitted successfully.'">
            </x-confirm-modal>
        @endif
    </div>
</x-app-layout>
