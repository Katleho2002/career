<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #003366; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 2.5rem; color: #00bfa6; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
                Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        /* Main Page Background */
        .page-background {
            background: linear-gradient(135deg, #003366 40%, #00bfa6 100%);
            min-height: 100vh;
            padding: 3rem 0;
        }

        /* Section Title */
        .section-title {
            color: #ffffff;
            font-size: 1.75rem;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        /* Vertical Institute Card Layout */
        .institute-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
        }

        .institute-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            padding: 1.5rem;
            text-align: left;
            width: 100%;
            max-width: 500px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .institute-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .institute-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #003366, #00bfa6);
            border-radius: 12px 12px 0 0;
        }

        .institute-card h2 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #003366;
            margin-bottom: 0.5rem;
        }

        .institute-card p {
            font-size: 1rem;
            color: #555;
        }

        .institute-card p span {
            font-weight: bold;
            color: #00bfa6;
        }
    </style>

    <div class="page-background">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="section-title">Institutes</h2>
            <div class="institute-container">
                @foreach($institutes as $institute)
                    <div class="institute-card">
                        <h2>{{ $institute->institute_name }}</h2>
                        <p><span>Location:</span> {{ $institute->location }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        @if (session('status') === 'application-created')
            <x-confirm-modal :name="'create'" :content="'The application was submitted successfully'">
            </x-confirm-modal>
        @endif
    </div>
</x-app-layout>
