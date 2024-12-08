<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div class="flex justify-between align-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Career Guidance Web Application') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold pb-3 text-xl text-gray-800">Admissions List</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 space-y-6"> <!-- Vertical space between items -->
                @foreach($admissions as $admission)
                    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-lg py-4 px-6 shadow-lg hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h2 class="font-semibold text-xl text-white">
                            Student: {{$admission->application->student->full_name}}
                        </h2>
                        <p class="mt-2 text-gray-100"><strong>Course:</strong> {{$admission->application->course->course_name}}</p>
                        <p class="mt-2 text-gray-100"><strong>Faculty of:</strong> {{$admission->application->course->faculty->faculty_name}}</p>
                        <p class="mt-2 text-gray-100"><strong>Institute:</strong> {{$admission->application->course->faculty->institute->institute_name}}</p>
                        <span class="mt-2 block text-gray-200"><strong>Admission date:</strong> {{$admission->created_at}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
