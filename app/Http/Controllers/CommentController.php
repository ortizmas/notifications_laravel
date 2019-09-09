<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Auth;
use App\Notifications\PostCommented;
use App\Http\Requests\StoreCommentFormRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentFormRequest $request)
    {
        //$request['user_id'] = Auth::id();
        //$createComment = Comment::create($request->all());

        //return redirect()->back()->with('success', 'Comentario com sucesso');
        

        $comment = $request->user()->comments()->create($request->all());

        $author = $comment->post->user; //Pegando o author dopost

        $author->notify(new PostCommented($comment));

        return redirect()
                    ->route('posts.show', $comment->post_id)
                    ->withSuccess('Comentairo ralizado com sucesso');

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
