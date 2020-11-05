<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Validator;
use App\User;

class UsersController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'  => 'nullable|string',
            'last_name'  => 'nullable|string',
            'email'  => 'nullable|unique:users',
            'phone'  => 'nullable|string|unique:users',
            'info'  => 'nullable|string',
        ]);
    }

    public function getAll()
    {
        $data = [
            'title' => 'Пользователи',
            'content' => view('admin.content.usersList', [
                'users' => User::orderBy('id', 'desc')->paginate(100),
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
                return redirect()->route('adminUsersCreate')->withInput()->withErrors($validator);
            }
            $request['password'] = Hash::make($request->password);
            if(User::create($request->all())) {
                return redirect()->route('adminUsersAll')->with('status', 'Пользователь успешно создан');
            }
        }
        $data = [
            'title' => 'Создание пользователя',
            'content' => view('admin.content.usersCreate'),
        ];
        return view('admin.panel', $data);
    }

    public function getUpdate(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->except('_token');
            $validator = $this->validator($data);
            if($validator->fails()) {
                return redirect()->route('adminUsersUpdate', ['id'=>$id])->withInput()->withErrors($validator);
            }
            if(User::find($id)->update($request->all())) {
                return redirect()->route('adminUsersAll')->with('status', 'Пользователь успешно обновлен');
            }
        }
        $data = [
            'title' => 'Редактирование пользователя',
            'content' => view('admin.content.usersUpdate', [
                'user' => User::find($id),
            ]),
        ];
        return view('admin.panel', $data);
    }

    public function getDelete($id)
    {
        User::find($id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('adminUsersAll')->with('status', 'Пользователь успешно удален');
    }

    public function getDeleteNew($id)
    {
        User::find($id)->delete();
        return redirect()->route('adminUsersAll')->with('status', 'Пользователь успешно удален');
    }
}
