<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StoreImage;
use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([

            "pais"       => 'required',
            "estado"     => 'required',
            "ciudad"     => 'required',
            "direccion"  => 'required',
            "telefono"   => 'required',
            "edad"       => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'image' => 'mimes:jpg,jpeg,png'
        ]);

        $user = User::findOrFail(Auth::id());

        /* traemos todo desde el frontend */
        $image = $request->file('image');
        $name_user = $request->name;

        $username = $request->username;
        $user_pais = $request->pais;
        $user_estado = $request->estado;
        $user_ciudad = $request->ciudad;
        $user_direccion = $request->direccion;
        $user_telefono = $request->telefono;
        $user_edad = $request->edad;
        $show_name = $request->show_name;

        if (isset($image)) {
            $storeProfileImage = new StoreImage(
                'profile', $image, 500, 500, $name_user, $user->image
            );
            $unique_image_name = $storeProfileImage->storeImage();
            $user->image = $unique_image_name;
        }

        $user->name = $name_user;
        $user->email = $request->email;
        $user->about = $request->about;

        $user->username = $username;
        $user->pais = $user_pais;
        $user->estado = $user_estado;
        $user->ciudad = $user_ciudad;
        $user->direccion = $user_direccion;
        $user->telefono = $user_telefono;
        $user->edad = $user_edad;

        $user->show_name = isset($show_name);

        $user->save();

        Toastr::success('Profile Updated Successfully', 'Profile Updated');

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $plain_old_password = $request->old_password;
        $plain_new_password = $request->password;
        $hashed_password = Auth::user()->password;

        if (Hash::check($plain_old_password, $hashed_password)) {
            if (!Hash::check($plain_new_password, $hashed_password)) {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($plain_new_password);
                $user->save();
                Auth::logout();

                Toastr::success('Password Updated Successfully', 'Password Updated');
                return redirect()->back();
            } else {
                Toastr::error("You enter an old password", "Same Password");
                return redirect()->back();
            }
        } else {
            Toastr::error("Old password doesn't match", "Mismatch Old Password");
            return redirect()->back();
        }
    }
}
