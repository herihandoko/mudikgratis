<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailSubscriberDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:subscriber-index|subscriber-create|subscriber-edit|subscriber-delete', ['only' => ['index','show']]);
         $this->middleware('permission:subscriber-create', ['only' => ['create','store']]);
         $this->middleware('permission:subscriber-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subscriber-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmailSubscriberDataTable $dataTables)
    {
        return $dataTables->render('admin.emailSubscriberIndex');
    }
}
