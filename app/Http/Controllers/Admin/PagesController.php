<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Helpers\Seo;
use App\Model\{
    Page
};

class PagesController extends Controller
{
    public function getAll()
    {
        $data = [
            'title' => 'Страницы',
            'content' => view('admin.content.pageList', [
                'pages' => Page::orderBy('id', 'desc')->paginate(100),
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
                return redirect()->route('adminPageCreate')->withInput()->withErrors($validator);
            }
            $request['url'] = Seo::genUrl($request->head);
            $request['body'] = base64_encode($request->body);
            if(Page::create($request->all())) {
                return redirect()->route('adminPages')->with('status', 'Страница успешно создана');
            }
        }
        $data = [
            'title' => 'Создание страницы',
            'content' => view('admin.content.pageCreate'),
        ];
        return view('admin.panel', $data);
    }

    public function getUpdate(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->except('_token');
            $validator = $this->validator($data);
            if($validator->fails()) {
                return redirect()->route('adminPageUpdate', ['id'=>$id])->withInput()->withErrors($validator);
            }
            $request['url'] = Seo::genUrl($request->head);
            $request['body'] = base64_encode($request->body);
            if(Page::find($id)->update($request->all())) {
                return redirect()->route('adminPages')->with('status', 'Страница успешно обновлена');
            }
        }
        $data = [
            'title' => 'Редактирование страницы',
            'content' => view('admin.content.pageUpdate', [
                'page' => Page::find($id),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getDelete($id)
    {
        Page::find($id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('adminPages')->with('status', 'Страница успешно удалена');
    }

    public function getDeleteNew($id)
    {
        Page::find($id)->delete();
        return redirect()->route('adminPages')->with('status', 'Страница успешно удалена навсегда и безвозвратно');
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
