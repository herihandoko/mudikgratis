<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsOfUse;
use Illuminate\Http\Request;

class TermsOfUseController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:terms-of-use-index|terms-of-use-create|terms-of-use-edit|terms-of-use-delete', ['only' => ['index','show']]);
         $this->middleware('permission:terms-of-use-create', ['only' => ['create','store']]);
         $this->middleware('permission:terms-of-use-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:terms-of-use-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tos = TermsOfUse::first();
        return view('admin.termsOfUseIndex', compact('tos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tos = TermsOfUse::first();
        if (!$tos) {
            $tos = new TermsOfUse();
        }
        $tos->content = $request->content;
        $tos->save();
        return redirect()->back();
    }
}
