<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\PageBuilder;
use App\Models\PageItem;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:menu-builder-index|menu-builder-create|menu-builder-edit|menu-builder-delete', ['only' => ['index','show']]);
         $this->middleware('permission:menu-builder-create', ['only' => ['create','store']]);
         $this->middleware('permission:menu-builder-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:menu-builder-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $items = Menu::whereNull('parent_id')->orderBy('order', 'asc')->get();
        return view('admin.menuBuilder', compact('items'));
    }
    public function addmenu(Request $request)
    {


        $env = env("DEMO_MODE");
        if ($env == true) {
            return response([
                'status' => 'demo_mode'
            ]);
        }

        $menu = new Menu();
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->status = 1;
        $menu->save();
        return $menu;
    }
    public function editmenu(Request $request)
    {

        $env = env("DEMO_MODE");
        if ($env == true) {
            return response([
                'status' => 'demo_mode'
            ]);
        }

        $menu =  Menu::find($request->id);
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->status = 1;
        $menu->save();
        return redirect()->back();
    }
    public function deletemenu(Request $request)
    {

        $env = env("DEMO_MODE");
        if ($env == true) {
            return response([
                'status' => 'demo_mode'
            ]);
        }

        if ($request->link == null) {
            return redirect()->back();
        }

        //Delete Parent Menu
        $menu =  Menu::find($request->id);
        $menu->delete();
        //Delete Child Menu
        $menu =  Menu::where('parent_id', $request->id);
        $menu->delete();
        return redirect()->back();
    }
    public function addsubmenu(Request $request)
    {

        $env = env("DEMO_MODE");
        if ($env == true) {
            return response([
                'status' => 'demo_mode'
            ]);
        }


        $menu = new Menu();
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->parent_id = $request->parent_id;
        $menu->status = 1;
        $menu->save();
        return $menu;
    }
    public function sortmenu(Request $request)
    {

        $env = env("DEMO_MODE");
        if ($env == true) {
            return response([
                'status' => 'demo_mode'
            ]);
        }

        $ids = $request->id;
        foreach ($ids as $order => $id) {
            $menu = Menu::findOrFail($id);
            $menu->order = $order;
            $menu->save();
        }
        return $ids;
    }
    public function menu_items()
    {
        return $items = PageBuilder::pluck('title', 'slug')
            ->prepend('Blog', 'blogs')
            ->prepend('Shop', 'shop');
    }
}
