<?php

namespace App\Http\Controllers\Student;

use App\Helpers\UserHelper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        UserHelper::middleware($this);
    }

    public function changePasswordView()
    {
        return view('student.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required'
        ]);

        $student = User::find(Auth::id());
        if (Hash::check($request->old_password, $student->password)) {
            if ($request->password == $request->password_confirmation) {
                $student->password = Hash::make($request->password);
                $student->save();
                return back()->with('success', 'Password Change Successful.');
            } else {

                return back()->with('error', 'Confirmation Password Mismatch.');
            }
        } else {
            return back()->with('error', 'Password Mismatch.');
        }

    }


}
