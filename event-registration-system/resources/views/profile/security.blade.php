@extends('layouts.app')

@section('title', 'Security Settings - EventSmart')

@push('styles')
<style>
    .password-strength {
        height: 4px;
        transition: all 0.3s ease;
    }
    .password-strength-weak { width: 25%; background-color: #ef4444; }
    .password-strength-fair { width: 50%; background-color: #f59e0b; }
    .password-strength-good { width: 75%; background-color: #10b981; }
    .password-strength-strong { width: 100%; background-color: #059669; }
    .input-group { position: relative; }
    .toggle-password {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-6 py-8 max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Security Settings</h1>

        <!-- Password Change -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Change Password</h2>
                <span class="text-sm text-gray-500">Last changed: {{ auth()->user()->password_changed_at?->diffForHumans() ?? 'Never' }}</span>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label class="block text-gray-700 mb-1" for="current_password">
                        Current Password
                        @error('current_password')
                            <span class="text-red-600 text-sm ml-2">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="relative">
                        <input id="current_password" name="current_password" type="password" required
                            class="w-full px-4 py-2 border @error('current_password') border-red-300 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500">
                        <span class="toggle-password" onclick="togglePassword('current_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="input-group">
                    <label class="block text-gray-700 mb-1" for="password">
                        New Password
                        @error('password')
                            <span class="text-red-600 text-sm ml-2">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-2 border @error('password') border-red-300 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500"
                            onkeyup="checkPasswordStrength(this.value)">
                        <span class="toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div class="password-strength rounded-full bg-gray-200"></div>
                        <div class="flex justify-between mt-1">
                            <span class="text-xs text-gray-500" id="password-strength-text">Password strength</span>
                            <span class="text-xs text-gray-500">Must be at least 8 characters</span>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label class="block text-gray-700 mb-1" for="password_confirmation">
                        Confirm New Password
                        @error('password_confirmation')
                            <span class="text-red-600 text-sm ml-2">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-4 py-2 border @error('password_confirmation') border-red-300 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-purple-500">
                        <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                        <i class="fas fa-key mr-2"></i>Update Password
                    </button>
                    <button type="reset" class="text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-undo mr-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- 2FA Settings -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Two-Factor Authentication (2FA)</h2>
                @if(auth()->user()->two_factor_enabled ?? false)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <i class="fas fa-shield-alt mr-1"></i>Protected
                    </span>
                @endif
            </div>

            <div class="border-b border-gray-200 pb-4 mb-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-mobile-alt text-2xl text-gray-400"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-md font-medium text-gray-900">Authenticator App</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Use an authenticator app like Google Authenticator, Microsoft Authenticator, or Authy to get two-factor authentication codes.
                        </p>
                    </div>
                </div>
            </div>

            @if(auth()->user()->two_factor_enabled ?? false)
                <div class="space-y-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Two-factor authentication is enabled and protecting your account
                    </div>

                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clock text-purple-500 mr-2"></i>
                        Last used: {{ auth()->user()->two_factor_last_used?->diffForHumans() ?? 'Never' }}
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    If you disable 2FA, your account will be less secure. Make sure you have a strong password.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <form method="POST" action="{{ route('profile.2fa.disable') }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors font-semibold">
                                <i class="fas fa-shield-alt mr-2"></i>Disable 2FA
                            </button>
                        </form>
                        <button type="button" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors font-semibold">
                            <i class="fas fa-sync-alt mr-2"></i>Regenerate Codes
                        </button>
                    </div>
                </div>
            @else
                <div class="space-y-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-unlock text-yellow-500 mr-2"></i>
                        Two-factor authentication is not enabled yet
                    </div>

                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-400"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">Why enable 2FA?</h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li>Protect against unauthorized access</li>
                                        <li>Secure your events and attendee data</li>
                                        <li>Get notified of login attempts</li>
                                        <li>Required for event organizers handling sensitive data</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.2fa.enable') }}">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                            <i class="fas fa-shield-alt mr-2"></i>Enable 2FA
                        </button>
                    </form>
                </div>
            @endif
        </div>

        @push('scripts')
        <script>
            function togglePassword(inputId) {
                const input = document.getElementById(inputId);
                const icon = input.nextElementSibling.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }

            function checkPasswordStrength(password) {
                const strengthBar = document.querySelector('.password-strength');
                const strengthText = document.getElementById('password-strength-text');

                // Reset classes
                strengthBar.className = 'password-strength rounded-full bg-gray-200';

                if (password.length === 0) {
                    strengthText.textContent = 'Password strength';
                    return;
                }

                let strength = 0;
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
                if (password.match(/\d/)) strength++;
                if (password.match(/[^a-zA-Z\d]/)) strength++;

                switch (strength) {
                    case 0:
                    case 1:
                        strengthBar.classList.add('password-strength-weak');
                        strengthText.textContent = 'Weak';
                        break;
                    case 2:
                        strengthBar.classList.add('password-strength-fair');
                        strengthText.textContent = 'Fair';
                        break;
                    case 3:
                        strengthBar.classList.add('password-strength-good');
                        strengthText.textContent = 'Good';
                        break;
                    case 4:
                        strengthBar.classList.add('password-strength-strong');
                        strengthText.textContent = 'Strong';
                        break;
                }
            }
        </script>
        @endpush
    </div>
</div>
@endsection
