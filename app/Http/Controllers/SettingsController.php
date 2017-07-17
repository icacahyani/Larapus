<?php

namespace App\Http\Controllers;

use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function profile()
	{
		return view('settings.profile', array('user' => Auth::user()));
	}

	public function editProfile()
	{
		return view('settings.edit-profile', array('user' => Auth::user()));
	}

	public function updateProfile(Request $request)
	{
		$user = Auth::user();

		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:users,email,' . $user->id
		]);

		$user->name = $request->get('name');
		$user->email = $request->get('email');

		if($request->hasFile('photo'))
        {   
            $files = $request->file('photo');
            $filename = time(). '.' .$files->getClientOriginalExtension();
            Image::make($files)->resize(300, 300)->save(public_path('/image/'. $filename));

            if($user->photo){
                $old_photo = $user->photo;
                $filepath = public_path(). DIRECTORY_SEPARATOR. '/image/'. 
                    DIRECTORY_SEPARATOR. $user->photo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){

                }
            }
            $user->photo = $filename;
        }
		$user->save();

		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Profil berhasil diubah"
		]);
		return redirect('settings/profile');
	}

	public function editPassword()
	{
		return view('settings.edit-password');
	}

	public function updatePassword(Request $request)
	{
		$user = Auth::user();

		$this->validate($request, [
			'password' => 'required|passcheck:' . $user->password,
			'new_password' => 'required|confirmed|min:6',
		], [
			'password.passcheck' => 'Password lama tidak sesuai'
		]);

		$user->password = bcrypt($request->get('new_password'));
		$user->save();

		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Password berhasil diubah"
		]);
		return redirect('settings/password');
	}
}
