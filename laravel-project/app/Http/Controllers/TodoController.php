<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Todo;
use Auth;
use App\UseCase\Todo\CreateTodoInput;
use App\UseCase\Todo\CreateTodoInteractor;
use App\UseCase\Todo\EditTodoInput;
use App\UseCase\Todo\EditTodoInteractor;
use App\UseCase\Todo\ShowTodoInput;
use App\UseCase\Todo\ShowTodoInteractor;
use App\Models\ValueObject\Todo\TodoValue;
use App\Models\ValueObject\Todo\Deadline;
use App\Models\ValueObject\Todo\Comment;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    $this->middleware(['auth']);
    }

    public function index()
    {
        // モデルに定義した関数を実行する．
        $todos = Todo::getMyAllOrderByDeadline();
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
        $validator = Validator::make($request->all(), [
            'todo' => 'required|max:255',
            'deadline' => 'required|date',
            'comment' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('todo.create')
                ->withInput()
                ->withErrors($validator);
        }

        $input = new CreateTodoInput(
            Auth::user()->id,
            new TodoValue($request->input('todo')),
            new Deadline($request->input('deadline')),
            new Comment($request->input('comment'))
        );

        $interactor = new CreateTodoInteractor();
        $output = $interactor->handle($input);

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
        $input = new ShowTodoInput($id);
        $interactor = new ShowTodoInteractor();
        $output = $interactor->handle($input);

        return view('todo.show', ['todo' => $output->getTodo()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', ['todo' => $todo]);
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
        $validator = Validator::make($request->all(), [
            'todo' => 'required|max:255',
            'deadline' => 'required|date',
            'comment' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('todo.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }

        $input = new EditTodoInput(
            $id,
            new TodoValue($request->input('todo')),
            new Deadline($request->input('deadline')),
            new Comment($request->input('comment'))
        );

        $interactor = new EditTodoInteractor();
        $output = $interactor->handle($input);

        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Todo::find($id)->delete();
        return redirect()->route('todo.index');
    }
}