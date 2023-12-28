<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:transaction-index|transaction-create|transaction-edit|transaction-delete', ['only' => ['index','show']]);
         $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
         $this->middleware('permission:transaction-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transaction-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionDataTable $transactionDataTable)
    {
        return $transactionDataTable->render('admin.transactionIndex');
    }
}
