<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Flash;
use Response;

class CommentController extends AppBaseController
{
    /**
     * Display a listing of the Comment.
     *
     * @param Request $request
     *
     * @return Response
     */

    /**
     * Show the form for creating a new Comment.
     *
     * @return Response
     */
    /**
     * Store a newly created Comment in storage.
     *
     * @param CreateCommentRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentRequest $request)
    {
        $input = $request->all();

        /** @var Comment $comment */
        $comment = Comment::create($input);

        Flash::success('Comment saved successfully.');

        return redirect(route('entries.show', $comment->entry_id));
    }
    /**
     * Show the form for editing the specified Comment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateCommentRequest $request)
    {
        /** @var Comment $comment */
        $comment = Comment::find($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $comment->fill($request->all());
        $comment->save();

        Flash::success('Comment updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comment $comment */
        $comment = Comment::find($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $comment->delete();

        Flash::success('Comment deleted successfully.');

        return redirect(route('comments.index'));
    }
}
