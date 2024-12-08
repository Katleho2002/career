<x-app-layout x-data="{ open: false }">
    <x-slot name="header">
        <!-- Header Section with Gradient and Animation -->
        <div style="display: flex; justify-content: center; align-items: center; padding: 2rem; background-color: #1D4ED8; border-radius: 8px; box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <h1 id="movingText" style="font-family: 'Helvetica', sans-serif; font-weight: bold; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 3px; background: linear-gradient(to right, #1D4ED8, #4ADE80); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3); animation: blinkMove 4s ease-in-out infinite;">
                Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        @keyframes blinkMove {
            0% {
                transform: translateX(-100%);
                color: #1D4ED8;
            }
            50% {
                transform: translateX(50%);
                color: #4ADE80;
            }
            100% {
                transform: translateX(100%);
                color: #1D4ED8;
            }
        }

        #movingText {
            animation: blinkMove 4s ease-in-out infinite;
        }

        /* Body Styling */
        .bg-gradient {
            background: linear-gradient(to bottom, #4ADE80, #1D4ED8);
            min-height: 100vh;
            color: white;
            font-family: 'Helvetica', sans-serif;
        }

        .section-header {
            text-align: center;
            font-size: 2.25rem;
            font-weight: 600;
            color: #333;
            margin-top: 3rem;
        }

        /* Customizing the Form */
        .faculty-form {
            background: linear-gradient(to right, #4ADE80, #2D3748);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .faculty-form:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .faculty-form h2 {
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #2D3748;
        }

        .faculty-form .input-label {
            font-weight: bold;
            color: #2B6CB0;
        }

        .faculty-form .text-input {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid #E2E8F0;
            margin-top: 0.5rem;
            font-size: 1rem;
            background-color: #F7FAFC;
        }

        .faculty-form .primary-button {
            background-color: #2D3748;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            border: none;
            margin-top: 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .faculty-form .primary-button:hover {
            background-color: #4ADE80;
        }

        /* Faculty Cards */
        .faculty-card {
            background: linear-gradient(to right, #2D3748, #4ADE80);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .faculty-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .faculty-card h2 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .faculty-card p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 1rem;
            text-align: center;
        }

        table th {
            background-color: #2D3748;
            color: white;
        }

        .table-row {
            border-bottom: 1px solid #E2E8F0;
        }

        .table-cell {
            padding: 0.75rem;
            text-align: center;
        }

        /* Application Table Custom Styles */
        .application-table {
            background-color: #fff;
            padding: 2rem;
            margin-top: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .application-table caption {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #2D3748;
        }

        .application-table tr:hover {
            background-color: #F7FAFC;
        }

        .application-table th {
            text-align: left;
            color: #2D3748;
        }

        .application-table td {
            font-weight: normal;
        }

        /* Action Button Styling */
        .action-button {
            padding: 1rem 2rem;
            background-color: #2D3748;
            color: white;
            font-size: 1rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #4ADE80;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .action-buttons button:disabled {
            background-color: #E2E8F0;
            cursor: not-allowed;
        }
    </style>

    <div class="py-12 bg-gradient">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <h2 class="font-medium text-white section-header">Application for {{ $application->student->full_name }}</h2>
            
            <!-- Faculty Form Section -->
            <div class="faculty-form">
                <form method="POST" action='{{ "/applications/$application->id" }}'>
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between gap-4">
                        @if ($status !== 'admitted')
                            @can('institute')
                                <x-primary-button class="bg-green-500 action-button" name="action" value="admit">Admit</x-primary-button>
                                <x-primary-button name="action" value="waitlist" class="action-button">Waitlist</x-primary-button>
                                <x-danger-button name="action" value="reject" class="action-button">{{ __('Reject') }}</x-danger-button>
                            @endcan
                        @else
                            @can('institute')
                                <x-primary-button class="bg-green-500 action-button" disabled>Admitted</x-primary-button>
                            @endcan
                        @endif
                    </div>
                </form>
            </div>

            <!-- Application Details Section -->
            <div class="application-table">
                <h3 class="text-center font-semibold text-lg">Application Details</h3>
                <table>
                    <caption>Course and Student Information</caption>
                    <tr class="table-row">
                        <th class="table-cell">Application Id</th>
                        <td class="table-cell">{{$application->id}}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-cell">Course</th>
                        <td class="table-cell">{{$application->course->course_name}}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-cell">Status</th>
                        <td class="table-cell">{{ ucfirst($status) }}</td>
                    </tr>
                </table>
            </div>

            <!-- Results Table -->
            <div class="application-table">
                <h3 class="text-center font-semibold text-lg">Student Results</h3>
                <table>
                    <caption>Passes and Credits</caption>
                    <tr class="table-row">
                        <th class="table-cell">Subject</th>
                        <th class="table-cell">Result</th>
                    </tr>
                    @foreach($application->student->results as $result)
                        <tr class="table-row">
                            <td class="table-cell">{{ $result->subject }}</td>
                            <td class="table-cell">{{ $result->result }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
