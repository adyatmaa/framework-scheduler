<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('logout', 'You have logged out');
    }

    public function loggingIn(Request $request)
    {
        $jadwal = Jadwal::all();

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only(['username', 'password']))) {
            session(['user' => Auth::user()]);

            return redirect(route('admin_dashboard'))->with('loginSuccess', 'You have logged in');
        } else {
            return redirect('/login')->with('salah', 'Your username or password is wrong');
        }
    }

    public function admin_dashboard()
    {
        $jadwal = Jadwal::all();
        return view('admin.admin_dashboard', ['jadwal' => $jadwal]);
    }

    public function admin_participant()
    {
        $user = User::all();
        return view('admin.admin_participant', ['user' => $user]);
    }

    public function admin_course()
    {
        $jadwal = Jadwal::all();
        return view('admin.admin_course', ['jadwal' => $jadwal]);
    }

    public function admin_inputCourse()
    {
        $user = User::all();
        return view('admin.admin_inputCourse', ['user' => $user]);
    }

    public function admin_parDetail($id)
    {
        $jadwal = Jadwal::with(['getUser'])->where('user_id', $id)->get();
        $user = User::with('selectUser')->where('id', $id)->get();
        // dd($user);
        return view('admin.admin_parDetail', compact('jadwal', 'user'));
    }

    public function admin_editCourse($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.admin_editCourse', compact('jadwal'));
    }

    public function admin_updateCourse(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $data = Jadwal::findOrFail($id);
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->lokasi = $request->lokasi;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;

        $data->save();

        return redirect(route('admin_course'))->with('editCourse', 'Course has been changed');
    }

    public function admin_deleteCourse($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect(route('admin_course'))->with('deleteSuccess', 'Course already delete');
    }

    public function admin_deletePar($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('admin_participant'));
    }

    public function isRegister(Request $request)
    {
        $user = new User();
        $user->role = 'admin';
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nama = $request->nama;
        $user->save();

        return redirect(route('login'))->with('adminReg', 'Account has been created successfully');
    }

    public function makeCourse(Request $request)
    {
        $jadwal = new Jadwal();

        $jadwal->judul = $request->judul;
        $jadwal->deskripsi = $request->deskripsi;
        $jadwal->lokasi = $request->lokasi;
        $jadwal->tanggal_mulai = $request->tanggal_mulai;
        $jadwal->tanggal_selesai = $request->tanggal_selesai;
        $jadwal->status_id = '1';
        $jadwal->user_id = $request->user;

        $jadwal->save();

        return redirect(route('admin_course'))->with('makeCourse', 'Course successfully created');
    }
}
