<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Http\Controllers\Controller,
    Session;

class SearchController extends Controller
{
    function index()
    {
        //
    }

    function create()
    {
        // セッションにログイン情報があるか確認
        if (!Session::exists('user')) {
            // ログインしていなければログインページへ
            return redirect('/login');
        }

        // 画面表示
        return view('search.index');
    }

    function store(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $user = User::all();
        
        if(!empty($keyword)){
            $query = User::query();

            $query->where('name','like', '%' .$keyword. '%');

            $user = $query->get();

            return view('search.index')
            ->with([
                'users' => $users,
                'keyword' => $keyword,
            ]);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
