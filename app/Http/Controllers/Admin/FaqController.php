<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:faq-index|faq-create|faq-edit|faq-delete', ['only' => ['index','show']]);
         $this->middleware('permission:faq-create', ['only' => ['create','store']]);
         $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $faqDataTable)
    {
        return $faqDataTable->render('admin.faqIndex');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'question' => 'required',
            'answer' => 'required',

        ];
        $customMessages = [
            'question.required' => trans('admin.Question is required!'),
            'answer.required' => trans('admin.Answer is required!'),
        ];
        $this->validate($request, $rules, $customMessages);


        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $notification = trans('admin.Created Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.faq.index')->with($notification);


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqEdit', compact('faq'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'question' => 'required',
            'answer' => 'required',

        ];
        $customMessages = [
            'question.required' => trans('admin.Question is required!'),
            'answer.required' => trans('admin.Answer is required!'),
        ];
        $this->validate($request, $rules, $customMessages);


        $faq = Faq::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.faq.index')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
    }
}
