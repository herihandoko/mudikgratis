<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendLanguageController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:frontend-language-index|frontend-language-create|frontend-language-edit|frontend-language-delete', ['only' => ['index','show']]);
         $this->middleware('permission:frontend-language-create', ['only' => ['create','store']]);
         $this->middleware('permission:frontend-language-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:frontend-language-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $language = require resource_path('lang/en/frontend.php');
        return view('admin.frontendLanguage', compact('language'));
    }
    public function update(Request $request)
    {
        $var = $request->except(['_token', '_method']);
        $var = collect($var)
            ->keys()
            ->map(function ($key) {
                return str_replace('_', ' ', $key);
            })
            ->combine($var);
        $modifiedData = var_export($var->toArray(), true);
        file_put_contents(resource_path('lang/en/frontend.php'), "<?php\n return {$modifiedData};\n ?>");

        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->route('admin.frontend-language.index')->with($notification);
    }
}
