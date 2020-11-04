<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel()
    {
        $data = [
            'title' => 'Панель администратора',
            'content' => 'Текст панели администратора',
        ];
        return view('admin.panel', $data);
    }
}
