<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menu = MenuItem::all();
        $categories = MenuCategory::all();
        return view('admin.menu.show-menu', compact('menu', 'categories'));
    }

    public function show($id){
        $menu = MenuItem::where('category_id', $id)->get();
        $categories = MenuCategory::all();
        return view('admin.menu.show-menu', compact('menu', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = MenuCategory::all();
        return view('admin.menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'weight'=>'required',
            'price'=>'required',
            'image' => 'image'
        ]);
        $data = $request->all();
        $data['image'] = MenuItem::uploadImage($request);
        $menu_item = MenuItem::create($data);
        return redirect()->route('menu.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu_item = MenuItem::where('id', $id)->first();
        $categories = MenuCategory::all();
        return view('admin.menu.edit', compact('menu_item', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description' => 'required',
            'category_id'=>'required',
            'weight' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'image'
        ]);
        $menu_item = MenuItem::find($id);
        $data = $request->all();
        if($request['image']!=null)
            $data['image'] = MenuItem::uploadImage($request, $menu_item->image);
        $menu_item->update($data);
        return redirect()->route('menu.index');
    }

    public function destroy($id)
    {
        $menu_item = MenuItem::find($id);
        Storage::delete($menu_item->image);
        $menu_item->delete();
        return redirect()->route('menu.index');
    }
}
