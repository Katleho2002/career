<x-app-layout x-data="{ open: false }">
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; background: linear-gradient(90deg, #1d3557, #457b9d); border-radius: 12px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); color: white;">
            <h1 style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 2.2rem; text-transform: uppercase; letter-spacing: 2px;">
                Career Guidance Web Application
            </h1>
            @can('institute')
                <form method="POST" action="/control/{{ Auth::user()->institute->id }}" style="display: flex; gap: 15px;">
                    @csrf
                    @method("PATCH")
                    @if (count($applications[1]) > 0)
                        <x-primary-button class="bg-gradient-to-r from-teal-500 to-cyan-600 text-white hover:from-teal-600 hover:to-cyan-700 transition duration-300" name="action" value="admission">
                            {{ Auth::user()->institute->control->admissions !== 'open' ? 'Publish Admissions' : 'Published' }}
                        </x-primary-button>
                    @endif
                    <x-primary-button class="bg-gradient-to-r from-teal-500 to-cyan-600 text-white hover:from-teal-600 hover:to-cyan-700 transition duration-300" name="action" value="application">
                        {{ Auth::user()->institute->control->applications !== 'open' ? 'Open Applications' : 'Close Applications' }}
                    </x-primary-button>
                </form>
            @endcan
        </div>
    </x-slot>

    <style>
        .category-section {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 2rem;
            gap: 20px;
        }

        .category-card {
            flex: 1;
            max-width: 22%;
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .category-card h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1d3557;
            margin-bottom: 1rem;
        }

        .category-card span {
            display: block;
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .application-card {
            margin-bottom: 1rem;
            padding: 1rem;
            background: #ffffff;
            border-radius: 6px;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .application-card:hover {
            background: #f8f9fa;
            border-color: #ced4da;
        }

        .application-card a {
            text-decoration: none;
            color: #212529;
        }

        .application-card h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .application-card p {
            font-size: 0.875rem;
            color: #495057;
        }

        .application-card span {
            font-size: 0.8rem;
            color: #868e96;
        }
    </style>

    <div class="py-12">
        @can('institute')
            <div class="category-section">
                <!-- Pending Applications -->
                <div class="category-card">
                    <h2 style="color: #ff6f61;">Pending Applications</h2>
                    @foreach ($applications[0] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h3>Course: {{ $application->course->course_name }}</h3>
                                <p>Faculty: {{ $application->course->faculty->faculty_name }}</p>
                                <p>Institute: {{ $application->course->faculty->institute->institute_name }}</p>
                                <span>Application Date: {{ $application->created_at }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Admitted Applications -->
                <div class="category-card">
                    <h2 style="color: #6ab04c;">Admitted Applications</h2>
                    @foreach ($applications[1] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h3>Course: {{ $application->course->course_name }}</h3>
                                <p>Faculty: {{ $application->course->faculty->faculty_name }}</p>
                                <p>Institute: {{ $application->course->faculty->institute->institute_name }}</p>
                                <span>Application Date: {{ $application->created_at }}</span>
                                <span>Admitted Date: {{ $application->updated_at }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Waitlisted Applications -->
                <div class="category-card">
                    <h2 style="color: #ffa502;">Waitlisted Applications</h2>
                    @foreach ($applications[2] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h3>Course: {{ $application->course->course_name }}</h3>
                                <p>Faculty: {{ $application->course->faculty->faculty_name }}</p>
                                <p>Institute: {{ $application->course->faculty->institute->institute_name }}</p>
                                <span>Application Date: {{ $application->created_at }}</span>
                                <span>Waitlisted Date: {{ $application->updated_at }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Rejected Applications -->
                <div class="category-card">
                    <h2 style="color: #d63031;">Rejected Applications</h2>
                    @foreach ($applications[3] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h3>Course: {{ $application->course->course_name }}</h3>
                                <p>Faculty: {{ $application->course->faculty->faculty_name }}</p>
                                <p>Institute: {{ $application->course->faculty->institute->institute_name }}</p>
                                <span>Application Date: {{ $application->created_at }}</span>
                                <span>Rejected Date: {{ $application->updated_at }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endcan
    </div>
</x-app-layout>
