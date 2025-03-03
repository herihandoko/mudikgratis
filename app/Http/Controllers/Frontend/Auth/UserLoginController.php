<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\MudikPeriod;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::USERPANEL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('userLogout');
    }


    public function userLoginForm()
    {
        return view('frontend.loginIndex');
    }

    public function userCheckLogin(Request $request)
    {
        $period = MudikPeriod::where('status', 'active')->first();
        $this->validate($request, [
            'phone' => ['required', function ($attribute, $value, $fail) use ($period) {
                $phone = User::where('phone', $value)->where('periode_id', $period->id)->first();
                if ($phone == null) {
                    $fail($attribute . ' does not exist.');
                }
            },],
            // 'g-recaptcha-response' =>  ReCaptcha('recaptcha_status') == 1 ? 'required|captcha' : [],
            'password' => 'required|min:4'
        ]);



        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password, 'periode_id' => $period->id], $request->get('remember'))) {
            $user = User::find(auth()->user()->id);
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();
            return redirect()->intended(RouteServiceProvider::USERPANEL);
        }

        return redirect()->back()->withInput($request->only('phone', 'remember'))->withErrors([
            'error' => 'Wrong password.',
        ]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
