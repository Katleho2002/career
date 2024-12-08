<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #2C3E50; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #8E44AD, #2980B9); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
            Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        /* Updated header text style */
        #movingText {
            animation: none; 
        }

        /* Updated form and button styles */
        .faculty-form {
            background: linear-gradient(to right, #8E44AD, #3498DB);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .faculty-form:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .faculty-form h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .faculty-form .input-label {
            font-weight: bold;
            color: #2980B9;
        }

        .faculty-form .text-input {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid #BDC3C7;
            margin-top: 0.5rem;
            font-size: 1rem;
        }

        .faculty-form .primary-button {
            background-color: #2C3E50;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .faculty-form .primary-button:hover {
            background-color: #8E44AD;
        }

        /* Updated faculty cards */
        .faculty-card {
            background: linear-gradient(to right, #8E44AD, #3498DB);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem; /* Space between faculty cards */
        }

        .faculty-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .faculty-card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .faculty-card p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
    </style>

    <div class="py-12" style="background: linear-gradient(to bottom, #8E44AD, #2980B9); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <h2 class="font-medium text-white" style="text-align: center; font-size: 2rem; text-transform: uppercase;">New Faculty</h2>
            <div class="faculty-form">
                <form method="POST" action="{{ route('create-faculty') }}">
                    @csrf

                    <!-- faculty field -->
                    <div>
                        <x-input-label for="faculty_name" :value="__('Faculty name')" class="input-label"/>
                        <x-text-input id="faculty_name" class="text-input" 
                                      type="text" name="faculty_name" :value="old('faculty_name')" required
                                      autofocus />
                    </div>

                    <div>
                        <x-primary-button class="primary-button">
                            {{ __('Add faculty') }}
                        </x-primary-button>
                    </div>
                    <x-input-error :messages="$errors->get('faculty_name')" class="mt-2" />
                </form>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold pb-3 text-xl text-white" style="text-align: center; font-size: 1.5rem; text-transform: uppercase;">
                Faculty List
            </h2>
            <div class="flex flex-col gap-6"> <!-- Changed from grid to flex-col for vertical stacking -->
                @if ($faculties && $faculties->count() > 0)
                    @foreach($faculties as $faculty)
                        <div class="faculty-card">
                            <h2 class="text-indigo-500">{{ $faculty->faculty_name }}</h2>
                            <p>{{ 'Location: ' . $faculty->location }}</p>
                            <div>
                                <a href="{{ route('faculty.edit', $faculty->id) }}">
                                    <x-primary-button>Edit</x-primary-button>
                                </a> 
                                <x-danger-button id="delete" data-faculty-id="{{$faculty->id}}">Delete</x-danger-button>
                            </div>
                        </div>
                        <form method="POST" id="delete-form" action="{{ route('faculty.destroy', $faculty->id) }}" class="hidden">
                            @csrf
                            @method("DELETE")
                        </form>
                    @endforeach
                @else
                    <p class="font-semibold text-xl text-gray-500">No faculty just yet</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>