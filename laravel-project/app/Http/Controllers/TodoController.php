<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下記2行を追加
use Validator;
use App\Models\Todo;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
          // モデルに定義した関数を実行する．
        $todos = Todo::getAllOrderByDeadline();
        return view('todo.index', [
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'todo' => 'required | max:191',
            'deadline' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('todo.create')
            ->withInput()
            ->withErrors($validator);
        }
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Todo::create($request->all());
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}