<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    public function index()
    {
        return view('auth.signin'); // Adjust the view path as necessary
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == "1") {
                $admin_session = session()->put('admin_id', '$user->id');
                session()->put('user', $user);
                return redirect('/admin/dashboard');
            } else if ($user->role == "2") {
                $employee_session = session()->put('employee_id', '$user->id');
                session()->put('user', $user);
                return redirect('/sign-in');
            } else if ($user->role == "3") {
                $client_session = session()->put('client_id', '$user->id');
                session()->put('user', $user);
                return redirect('/client-dash/dashboard');
            }
        } else {
            // dd ("error login");
            return redirect('/sign-in')->withErrors(['old_password' => 'Wrong email or password.']);
        }
    }


    public function adminLogout()
    {
        session()->forget('admin_id');
        session()->forget('user');

        return redirect('/sign-in');
    }

    public function employeeLogout()
    {
        session()->forget('employee_id');
        session()->forget('user');
        return redirect('/sign-in');
    }

    public function clientLogout()
    {
        session()->forget('client_id');
        session()->forget('user');
        return redirect('/sign-in');
    }

    public function apiLogin(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in with the credentials
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the logged-in user

            // Set user session based on the role
            if ($user->role == 1) {
                session()->put('admin_id', $user->id);
                session()->put('user', $user);
                return response()->json([
                    'message' => 'Admin logged in successfully',
                    'user' => $user
                ], 200);
            } elseif ($user->role == 2) {
                session()->put('employee_id', $user->id);
                session()->put('user', $user);
                return response()->json([
                    'message' => 'Employee logged in successfully',
                    'user' => $user
                ], 200);
            } elseif ($user->role == 3) {
                session()->put('client_id', $user->id);
                session()->put('user', $user);
                return response()->json([
                    'message' => 'Client logged in successfully',
                    'user' => $user
                ], 200);
            }
        } else {
            // If authentication fails, return an error message
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }
    }

    public function apiAdminLogout()
    {
        session()->forget('admin_id');
        session()->forget('user');
        return response()->json(['message' => 'Admin logged out successfully'], 200);
    }

    public function apiEmployeeLogout()
    {
        session()->forget('employee_id');
        session()->forget('user');
        return response()->json(['message' => 'Employee logged out successfully'], 200);
    }

    public function apiClientLogout()
    {
        session()->forget('client_id');
        session()->forget('user');
        return response()->json(['message' => 'Client logged out successfully'], 200);
    }

}
