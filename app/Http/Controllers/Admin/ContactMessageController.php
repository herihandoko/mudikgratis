<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactMessageDataTable;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:contact-message-index|contact-message-create|contact-message-edit|contact-message-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:contact-message-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact-message-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact-message-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactMessageDataTable $contactMessageDataTable)
    {
        return $contactMessageDataTable->render('admin.contactMessageIndex');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.contactMessageShow', compact('message'));
    }
}
