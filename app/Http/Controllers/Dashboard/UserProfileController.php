<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use App\Models\UserProfile;

class UserProfileController extends Controller
{

	public function index(UserProfile $user)
	{
		return view('dashboard.userprofile',
			array('current_user' => Auth::user()) 
		);
	}

	public function update(Request $request)
	{

		if ($request->isMethod('GET')) {
			return redirect()->route('profile');
		}

		$current_user = Auth::user();

		$request->validate([
			'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $current_user->id],
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'email', 'max:100', 'unique:users,email,' . $current_user->id],
			'avatar' => ['mimes:jpeg, jpg, png, gif', 'max:2048'],
		]);

		$current_user->username = $request->get('username');
		$current_user->first_name = $request->get('first_name');
		$current_user->last_name = $request->get('last_name');
		$current_user->email = $request->get('email');
		$current_user->bio = $request->get('bio');

		// Upload avatar
		if (isset($request->avatar)) {
			$imageName = md5(time()) . $current_user->id . '.' . $request->avatar->extension();
			$request->avatar->move(public_path('images/avatars'), $imageName);
			$current_user->avatar = $imageName;
		}

		// Update user
		$current_user->update();
		return redirect('dashboard/profile')
			->with('success', 'User data updated successfully');
	}

	// Delete avatar
	public function deleteavatar($id, $fileName)
	{
		$current_user = Auth::user();
		$current_user->avatar = "default.png";
		$current_user->save();

		if (File::exists(public_path('images/avatars/' . $fileName))) {
			File::delete(public_path('images/avatars/' . $fileName));
		}
	}
}
