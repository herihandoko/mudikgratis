<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\User;
use App\Notifications\WhatsappNotification;
use App\Services\NotificationApiService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function forgot()
    {
        return view('frontend.forgotPassword');
    }

    public function resetLink(Request $request, NotificationApiService $notificationService)
    {

        if (User::where(['nik' => $request->nik])->where(['phone' => $request->phone])->count()) {

            $token = Str::random(64);
            $password = $this->generatePassword();
            DB::table('password_resets')->insert([
                'nik' => $request->nik,
                'phone' => $request->phone,
                'token' => $token,
                'pass_code' => $password,
                'created_at' => Carbon::now()
            ]);

            $dataUser = User::where(['nik' => $request->nik])->where(['phone' => $request->phone])->first();
            User::where(['nik' => $request->nik])->where(['phone' => $request->phone])->update([
                'password' => Hash::make($password),
                'pass_code' => $password
            ]);

            $param = [
                'target' => $request->phone,
                'message' => "[Reset Password] - Jawara Mudik \nReset Password Jawara Mudik DISHUB Propinsi Banten berhasil. \nSilahkan login ke (" . url('login') . ") dengan data sebagai berikut \n\n=========Credentials========== \n\nusername: *" . $dataUser->email . "* \npassword: *" . $password . "* \n\n========================== \n\nHarap segera mengganti password Anda setelah melakukan login atau klik link berikut: ". route('user.reset') ." \n \n\nTerima kasih"
            ];
            $notificationService->sendNotification($param);

            // $link = url('/password-reset') . '/' . $token;
            // $template = EmailTemplate::find(1);
            // $body = str_replace('{link}', $link, str_replace('http://', '', $template->description));

            // Mail::send('frontend.emailHtml', ['body' => html_entity_decode($body)], function ($message) use ($request, $template) {
            //     $message->to($request->email);
            //     $message->subject($template->subject);
            // });

            alert()->success('Reset password terkirim!.', 'Silahkan check whatsapp Anda.');
            return redirect()->route('user.login');
        }

        alert()->error('Oops!', 'NIK dan Nomor Telepon Tidak Terdaftar!');
        return redirect()->route('user.login');
    }

    function generatePassword($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
