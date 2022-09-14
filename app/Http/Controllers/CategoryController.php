<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Config,Validator;

class CategoryController extends Controller
{
    // 

    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        if($query) 
        {
            $categories = Category::where('id', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')
            ->get();
        }
        else 
        {
            $categories = Category::all();
        }
        return view('category/index', compact('categories'));
    }

    public function edit($id = null)
    { 
        if($id) {
            $category = Category::find($id);

            return view('category/edit')
            ->with('category', $category);
        } 
        else
        {
            return view('category/add');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $rules = array(
            'name' => 'required',
        );

        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 
        );

        $temp = array(
            'name' => $request->name, 
        );

        $id = $request->id;

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator -> fails()) {
            return redirect('product/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;

        $category->save();

        return redirect('category')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function insert (Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect('category')
        ->with('ok', true)
        ->with('msg', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function remove($id)
    {
        Category::find($id)->delete();

        return redirect('category')
        ->with('ok',true)
        ->with('msg','ลบข้อมูลสำเร็จ');
    }
}
