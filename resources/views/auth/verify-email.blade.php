<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 2rem; background-color: #004d40; border-radius: 12px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); overflow: hidden; position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;">
            <h1 id="movingText" style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 3.5rem; color: #fff; text-transform: uppercase; letter-spacing: 5px; background: linear-gradient(to left, #00bfae, #0288d1); -webkit-background-clip: text; background-clip: text; text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);">
                Career Guidance Web Application
            </h1>
        </div>
    </x-slot>

    <style>
        /* Keep header fixed */
        #movingText {
            animation: none; /* Removed the animation */
        }

        /* Form container styles */
        .form-container {
            background-color: #f7f7f7;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            margin-top: 5rem; /* Space for the fixed header */
        }

        /* Form field layout */
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .form-group > div {
            flex: 1;
            min-width: 250px;
        }

        .input-label {
            font-family: 'Roboto', sans-serif;
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
        }

        .input-field {
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 100%;
            margin-top: 0.5rem;
            font-size: 1rem;
            background-color: #fff;
            transition: all 0.3s;
        }

        .input-field:focus {
            border-color: #0288d1;
            outline: none;
        }

        .input-error {
            color: #e57373;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .button-primary {
            padding: 1rem 2rem;
            background-color: #0288d1;
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            transition: background-color 0.3s;
        }

        .button-primary:hover {
            background-color: #0277bd;
            cursor: pointer;
        }

        .link {
            font-size: 0.875rem;
            color: #0288d1;
            text-decoration: underline;
        }

        .link:hover {
            color: #01579b;
        }

        .status-message {
            color: #4caf50;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .logout-button {
            font-size: 0.875rem;
            color: #0288d1;
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .logout-button:hover {
            color: #01579b;
        }
    </style>

    <x-guest>
        <div class="form-container">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Verify E-Mail') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="status-message">
                    {{ __('A new verification link has been sent to your email.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button class="button-primary">
                            {{ __('Resend Email Verification') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-button">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-guest>
</x-app-layout>
