<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #1C2833; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: #F4D03F; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #F4D03F, #2980B9); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                Faculty Management
            </h1>
        </div>
    </x-slot>

    <style>
        /* Header Styling */
        #movingText {
            animation: none;
        }

        /* Styling for the Update Faculty Section */
        .update-faculty-container {
            background: linear-gradient(to right, #2980B9, #1C2833);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .update-faculty-container:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .update-faculty-container h1 {
            font-size: 2rem;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #F4D03F;
            text-transform: uppercase;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .update-faculty-container p {
            font-size: 1rem;
            color: #566573;
            font-weight: 600;
        }
    </style>

    <div class="py-12" x-data="{name:''}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="update-faculty-container">
                <h1>Update Faculty Details</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    @include('includes.edit-faculty')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
