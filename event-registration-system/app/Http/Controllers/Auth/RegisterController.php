<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'user_type' => ['required', 'in:attendee,organizer,company'],
            'terms' => ['required', 'accepted'],
        ];

        // Add validation rules for organizer/company fields
        if (isset($data['user_type']) && in_array($data['user_type'], ['organizer', 'company'])) {
            $rules = array_merge($rules, [
                'company_name' => ['required', 'string', 'max:255'],
                'contact_person' => ['required', 'string', 'max:255'],
                'website' => ['nullable', 'url', 'max:255'],
                'location' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string', 'max:1000'],
            ]);
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'date_of_birth' => $data['date_of_birth'],
            'user_type' => $data['user_type'],
            'role' => $data['user_type'] === 'attendee' ? 'user' : 'organizer',
        ]);

        // Add organizer/company specific fields
        if (in_array($data['user_type'], ['organizer', 'company'])) {
            $user->update([
                'company_name' => $data['company_name'],
                'contact_person' => $data['contact_person'],
                'website' => $data['website'] ?? null,
                'location' => $data['location'],
                'description' => $data['description'] ?? null,
            ]);
        }

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Log the user in automatically
        Auth::login($user);

        // Redirect with success message
        return redirect($this->redirectPath())
            ->with('success', 'Welcome to EventPro! Your account has been created successfully.');
    }
}
