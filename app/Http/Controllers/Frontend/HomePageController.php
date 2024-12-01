<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ContactMessage;
use App\Models\EmailTemplate;
use App\Models\Product;
use App\Models\Subscriber;
use App\Services\NotificationApiService;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function login_form()
    {
        return view('frontend.loginIndex');
    }
    public function news_letter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response([
                'status' => 'invalid',
            ]);
        }
        if (Subscriber::where(['email' => $request->email])->count()) {
            return response([
                'status' => 'exist',
            ]);
        }
        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->is_confirmed = 0;
        $subscriber->save();
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $link = url('/email-subscribe') . '/' . $token;
        $template = EmailTemplate::find(4);
        $body = str_replace('{link}', $link, str_replace('http://', '', $template->description));
        Mail::send('frontend.emailHtml', ['body' => html_entity_decode($body)], function ($message) use ($request, $template) {
            $message->to($request->email);
            $message->subject($template->subject);
        });
        return response([
            'status' => 'success',
        ]);
    }
    public function news_letter_verify(Request $request)
    {
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
        if (!$tokenData) {
            toast(trans('frontend.Invalid Token!'), 'error')->width('350px');
            return redirect()->route('home');
        }
        $email = Subscriber::where('email', $tokenData->email)->first();
        if (!$email) {
            toast(trans('frontend.Email not found!'), 'error')->width('350px');
            return redirect()->route('home');
        }
        $email->is_confirmed = 1;
        $email->update();
        DB::table('password_resets')->where('email', $email->email)
            ->delete();
        $template = EmailTemplate::find(6);
        $body = str_replace('{website}', GetSetting('site_name'), $template->description);
        Mail::send('frontend.emailHtml', ['body' => html_entity_decode($body)], function ($message) use ($email, $template) {
            $message->to($email->email);
            $message->subject($template->subject);
        });
        toast(trans('frontend.Email subscribed successfully!'), 'success')->width('350px');
        return redirect()->route('home');
    }
    public function appointment()
    {
        return view('frontend.appointmentIndex');
    }
    public function appointment_submit(Request $request)
    {
        if (checkDemo()) {
            trans('frontend.This action is blocked in demo mode!');
            return redirect()->route('home');
        }
        if (ReCaptcha('recaptcha_status') == 1 && !$request->{'g-recaptcha-response'}) {
            toast(trans(trans('frontend.Captcha Required!')), 'error')->width('350px');
            return redirect()->route('home');
        }
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->appointment_date = $request->date;
        $appointment->message = $request->message;
        $appointment->service_id = $request->service_id;
        $appointment->status = 0;
        $appointment->save();

        toast(trans(trans('frontend.Appointment Requested!')), 'success')->width('400px');

        return redirect()->route('home');
    }
    public function cart_add(Request $request)
    {
        if ($request->quantity) {
            $qty = $request->quantity;
        } else {
            $qty = 1;
        }
        \Cart::add([
            'id' => $request->product_id,
            'name' => Product::find($request->product_id)->name,
            'qty' => $qty,
            'price' => Product::find($request->product_id)->discount_price ?: Product::find($request->product_id)->price,
            'weight' => 550,
            'options' => []
        ]);
        return response([
            'status' => 'success'
        ]);
    }
    public function cart_remove(Request $request)
    {
        \Cart::remove($request->item);
        return response([
            'status' => 'success'
        ]);
    }
    public function cart_quantity(Request $request)
    {
        if ($request->type == 'increment') {
            $request->quantity = $request->quantity + 1;
        } else {
            if ($request->quantity >= 2) {
                $request->quantity = $request->quantity - 1;
            }
        }
        \Cart::update($request->product_id, $request->quantity);
        return response([
            'status' => 'success'
        ]);
    }
    public function cart_clear()
    {
        \Cart::destroy();
        return response([
            'status' => 'success'
        ]);
    }
    public function contact_message(Request $request, NotificationApiService $notificationService)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'phone' => 'required|regex:/^0[1-9][0-9]{7,10}$/',
            'message' => 'required|min:5|max:500',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                toast($errors->get('name')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($errors->has('phone')) {
                toast($errors->get('phone')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }
            if ($errors->has('message')) {
                toast($errors->get('message')[0], 'error')->width('300px');
                return redirect()->back()->withInput();
            }
        }

        // $template = EmailTemplate::find(5);
        // $body = str_replace('{name}', $request->name, $template->description);
        // $body = str_replace('{email}', $request->email, $body);
        // $body = str_replace('{phone}', $request->phone, $body);
        // $body = str_replace('{subject}', $request->subject, $body);
        // $body = str_replace('{message}', $request->message, $body);
        // Mail::send('frontend.emailHtml', ['body' => html_entity_decode($body)], function ($message) use ($request, $template) {
        //     $message->to($request->email);
        //     $message->subject($template->subject);
        // });
        // if (GetSetting('save_contact_message') == 1) {
        $message = new ContactMessage();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        if ($message->save()) {
            $param = [
                'target' => $request->phone,
                'message' => "*Terima kasih atas pertanyaan Anda tentang Mudik Gratis!*\nKami senang Anda tertarik untuk ikut serta dalam program Mudik Gratis yang kami tawarkan. Berikut adalah informasi singkat mengenai program ini:\n*Apa itu Mudik Gratis?*\nMudik Gratis adalah program tahunan yang diselenggarakan untuk membantu masyarakat yang ingin mudik ke kampung halaman dengan menggunakan fasilitas transportasi yang disediakan secara gratis. Tujuannya adalah untuk mengurangi beban biaya perjalanan serta meningkatkan kenyamanan selama mudik.\nJika Anda tertarik untuk mendaftar atau ingin mendapatkan informasi lebih lanjut, Anda bisa mengunjungi https://jawaramudik.bantenprov.go.id/register atau menghubungi kami di ".env('CS_PHONE_NUMBER').". \n\nSalam hangat,\n[Tim Kami]"
            ];
            $notificationService->sendNotification($param);

            $param = [
                'target' => env('CS_PHONE_NUMBER'),
                'message' => "Halo Admin,\n\nKami menerima pesan baru dari pengguna melalui Kontak Kami. Berikut adalah detail pesan yang masuk:\nNama Pengirim : ".$request->name."\Phone Pengirim : ".$request->phone."\nPesan : ".$request->message." \n\nMohon untuk segera menindaklanjuti pesan ini. Jika ada informasi lebih lanjut yang dibutuhkan, kami siap membantu.\nTerima kasih atas perhatian dan kerjasamanya.\nSalam  \n[Tim Kami]"
            ];
            $notificationService->sendNotification($param);
        }
        // }
        toast(trans('frontend.Message Sent!'), 'success')->width('350px');
        return redirect()->back();
    }
}
