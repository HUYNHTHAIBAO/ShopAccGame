<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

//        $data = $request->validate(
//            [
//                    'title' => 'required',
//                    // bắt buộc là hình ảnh, và phải là đuôi, hình ảnh dưới 2mb, chiều dài và chiều cao, chiều dài và chiều cao tối đa
////                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
//            ],
//            [
//                    'title.required' => 'Tên danh mục không được để trống'
////                    'image.required' => 'Tên danh mục không được để trống'
//            ]
//        );
        $category = new Category();
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        // thêm hình ảnh
        $get_image = $request->image;
        $path = 'uploads/category/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $category->image = $new_image;
        $category->save();
        return redirect()->route('backend.category.index')->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
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
        //
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        // Sửa hình ảnh
        $get_image = $request->image;
        // nếu người dùng có chọn ảnh
        if ($get_image) {
            // bỏ hình ảnh cũ
            $path_unlink = 'uploads/category/'.$category->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            // thêm mới hình ảnh
            $path = 'uploads/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $category->image = $new_image;
        }
        $category->save();
        return redirect()->route("backend.category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        // bxóa hình ảnh
        $path_unlink = 'uploads/category/'.$category->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $category->delete();
        return redirect()->route('backend.category.index');
    }
}
