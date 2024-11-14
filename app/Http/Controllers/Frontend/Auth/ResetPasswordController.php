<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Services\NotificationApiService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $notificationApiService;

    public function __construct(NotificationApiService $notificationApiService)
    {
        $this->middleware('guest');
        $this->notificationApiService = $notificationApiService;
    }

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    public function showResetForm(Request $request)
    {
        return view('frontend.passwordReset');
    }

    public function showResetFormUser(): View
    {
        return view('frontend.passwordResetUser');
    }

    public function resetPassword(Request $request)
    {
        $period = MudikPeriod::where('status', 'active')->first();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'old_password' => 'required',
            'password' => 'required|string|min:4|confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $user = User::where('email', $request->email)->where('periode_id', $period->id)->where('periode_id', $period->id)->first();
        if (!$user) return redirect()->back()->withInput()->withErrors(['email' => 'Email not found']);

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('password', 'Password lama tidak valid.');
        }

        $model = User::find($user->id);
        $model->password = Hash::make($request->password);
        $model->pass_code = $request->password;
        if ($model->save()) {
            $param = [
                'target' => $user->phone,
                'message' => "[Ubah Password Mudik Bersama] - Jawara Mudik \n Ubah Password portal mudik bersama Dishub Banten berhasil. \nSilahkan login ke (" . url('login') . ") dengan menggunakan username dan password yang baru. \n\nTerima kasih"
            ];
            $response = $this->notificationApiService->sendNotification($param);
        }
        alert()->success('Password reset successfully!.');
        return redirect('/');
    }


    public function storeResetFormUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->pass_code = $request->password;
        if ($user->save()) {
            $param = [
                'target' => $user->phone,
                'message' => "[Ubah Password Mudik Bersama] - Jawara Mudik \n Ubah Password portal mudik bersama Dishub Banten berhasil. \nSilahkan login ke (" . url('login') . ") dengan menggunakan username dan password yang baru. \n\nTerima kasih"
            ];
            $response = $this->notificationApiService->sendNotification($param);
        }
        alert()->success('Ubah password berhasil!.');
        return redirect()->back();
    }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
