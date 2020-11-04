<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Validator;

class CategoriesController extends Controller
{
    public function getAll()
    {
        $data = [
            'title' => 'Категории',
            'content' => view('admin.content.categoryList', [
                'categories' => Category::orderBy('id', 'desc')->paginate(100),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getCreate(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->except('_token');
            $validator = $this->validator($data);
            if($validator->fails()) {
                return redirect()->route('adminCategoryCreate')->withInput()->withErrors($validator);
            }
            if(Category::create($request->all())) {
                return redirect()->route('adminCategoriesAll')->with('status', 'Категория успешно создана');
            }
        }
        $data = [
            'title' => 'Создание категории',
            'content' => view('admin.content.categoryCreate'),
        ];
        return view('admin.panel', $data);
    }

    public function getUpdate(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->except('_token');
            $validator = $this->validator($data);
            if($validator->fails()) {
                return redirect()->route('adminCategoryUpdate', ['id'=>$id])->withInput()->withErrors($validator);
            }
            if(Category::find($id)->update($request->all())) {
                return redirect()->route('adminCategoriesAll')->with('status', 'Категория успешно обновлена');
            }
        }
        $data = [
            'title' => 'Редактирование категории',
            'content' => view('admin.content.categoryUpdate', [
                'category' => Category::find($id),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getDelete($id)
    {
        Category::find($id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('adminCategoriesAll')->with('status', 'Категория успешно удалена');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title'  => 'nullable|string',
            'description'  => 'nullable|string',
            'keywords'  => 'nullable|string',
            'icon'  => 'nullable|string',
            'head'  => 'nullable|string',
            'body'  => 'nullable|string',
        ]);
    }
}
