<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function user_register()
    {
        return view('client.client_register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'))->with('logout', 'You have logged out');
    }

    public function userIsReg(Request $request)
    {
        $user = new User();
        $user->role = 'student';
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nama = $request->nama;
        $user->save();
        return redirect(route('index'))->with('userReg', 'Account has been created successfully');
    }

    public function userLogin(Request $request)
    {
        $jadwal = Jadwal::all();
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        // echo 'berhasil login';
        if (Auth::attempt($request->only(['username', 'password']))) {
            session(['userNow' => Auth::user()]);

            return redirect(route('user_dashboard', ['jadwal' => $jadwal]))->with('loginSuccess', 'You have logged in');
        } else {
            return redirect('/')->withErrors(['error' => 'Your Username or password is wrong']);
        }
    }

    public function user_dashboard()
    {
        $jadwal = Jadwal::all();
        return view('client.client_dashboard', ['jadwal' => $jadwal]);
    }

    public function user_ViewCourse()
    {
        $jadwal = Jadwal::all();
        return view('client.client_course', ['jadwal' => $jadwal]);
    }

    public function user_course($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('client.client_courseDetail', compact('jadwal'));
    }

    public function user_submit(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'status_id' => 'required',
        ]);

        $data = Jadwal::findOrFail($id);
        $data->status_id = '2';

        $data->save();
        return redirect(route('user_ViewCourse'))->with('submitCourse', 'Course have been submitted');
    }
}
