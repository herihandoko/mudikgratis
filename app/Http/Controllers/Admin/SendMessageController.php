<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MudikPenggunaDataTable;
use App\Http\Requests\MessageRequest;
use App\Models\MudikPeriod;
use App\Models\MudikTujuan;
use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use App\Models\User;
use App\Models\UserInactive;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:brodcast-pengguna-index|brodcast-pengguna-create|brodcast-pengguna-edit|brodcast-pengguna-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:brodcast-pengguna-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brodcast-pengguna-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brodcast-pengguna-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MudikPeriod::pluck('name', 'id')->prepend('Pilih Taget Notifikasi', '');
        $periode = collect(['input' => 'Input Manual'])->union(MudikPeriod::select('name', 'id')->pluck('name', 'id'));
        return view('admin.sendMessageIndex', compact('periode'));
    }

    public function store(MessageRequest $messageRequest)
    {
        $ikm = '';
        $message = $messageRequest->message;
        if ($messageRequest->skm) {
            $ikm = url('survei-kepuasan-masyarakat');
            $message = $message . '\n' . $ikm;
        }
        if ($messageRequest->target == 'input') {
            $notifHistory = new NotifHistory();
            $notifHistory->recipient_number = $messageRequest->phone_number;
            $notifHistory->message  = $message;
            $notifHistory->status = 'sent';
            $notifHistory->created_by = auth()->user()->name;
            $notifHistory->source = 'send-message';
            $notifHistory->save();
        } else {
            $users = User::where('periode_id', $messageRequest->target);
            if ($messageRequest->status_mudik) {
                $users->where('status_mudik', $messageRequest->status_mudik);
            }
            $result = $users->get();
            foreach ($result as $key => $value) {
                $notifHistory = new NotifHistory();
                $notifHistory->recipient_number = $value->phone;
                $notifHistory->message  = $message;
                $notifHistory->status = 'sent';
                $notifHistory->created_by = auth()->user()->name;
                $notifHistory->source = 'send-message';
                $notifHistory->save();
            }
        }
        $notification = 'Notifkasi Berhasil Dikirim';
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.history-notifikasi.index')->with($notification);
    }
}
