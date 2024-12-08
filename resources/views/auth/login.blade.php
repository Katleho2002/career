<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 2rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); overflow: hidden; position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;">
            <h1 id="movingText" style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 3.5rem; color: #fff; text-transform: uppercase; letter-spacing: 5px; background: linear-gradient(to left, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);">
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
    </style>

    <x-guest>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="form-container">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <div>
                    <x-input-label for="email" class="input-label" :value="__('Email')" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <div>
                    <x-input-label for="password" class="input-label" :value="__('Password')" />
                    <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="input-error" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <div>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
            </div>

            <x-input-error :messages="$errors->get('general')" class="input-error" />

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="button-primary">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest>
</x-app-layout>
