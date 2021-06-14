<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntryRequest;
use App\Http\Requests\UpdateEntryRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\Entry;
use App\Models\File;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class EntryController extends AppBaseController
{
    /**
     * Display a listing of the Entry.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function index(Request $request)
    {
        /** @var Entry $entries */
        // if (Auth::check()) {
        //     $entries = Entry::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(15);
        // } else {
        //     $entries = Entry::paginate(15);
        // }

        $entries = Entry::orderBy('created_at', 'DESC')->paginate(15);

        if ($request->view) {
            session(['view' => $request->view]);
        }


        return view('entries.index')
            ->with('entries', $entries);
    }

    /**
     * Show the form for creating a new Entry.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('entries.create');
        }
        return redirect(route('entries.index'));
    }

    /**
     * Store a newly created Entry in storage.
     *
     * @param CreateEntryRequest $request
     *
     * @return Response
     */
    public function store(CreateEntryRequest $request)
    {

        $input = $request->all();
        $images = $request->images;
        /** @var Entry $entry */
        $entry = Entry::create($input);

        if ($images) {
            $request->validate([
                'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15000',
            ]);
            $path = 'storage/uploads/';
            $imageName = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($path, $imageName);
            File::create([
                "user_id" => Auth::user()->id,
                "entry_id" => $entry->id,
                "entry_file_name" => $imageName,
                "entry_file_url" => url($path . $imageName),

            ]);
        }

        Flash::success('Entry saved successfully.');

        return redirect(route('entries.index'));
    }

    /**
     * Display the specified Entry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        /** @var Entry $entry */
        $entry = Entry::find($id);
        $comments = Comment::where('entry_id', $id)->orderBy('created_at', 'DESC')->get();

        if (empty($entry)) {
            Flash::error('Entry not found');

            return redirect(route('entries.index'));
        }

        return view('entries.show')->with(['entry' => $entry, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified Entry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Entry $entry */
        $entry = Entry::find($id);

        if (empty($entry)) {
            Flash::error('Entry not found');

            return redirect(route('entries.index'));
        }
        if (Auth::check()) {
            return view('entries.edit')->with('entry', $entry);
        } else {
            return redirect(route('entries.index'));
        }
    }

    /**
     * Update the specified Entry in storage.
     *
     * @param int $id
     * @param UpdateEntryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntryRequest $request)
    {
        /** @var Entry $entry */
        $entry = Entry::find($id);

        if (empty($entry)) {
            Flash::error('Entry not found');

            return redirect(route('entries.index'));
        }
        if (Auth::user()->id == $entry->user_id) {

            $entry->fill($request->all());
            $entry->save();

            Flash::success('Entry updated successfully.');
        }
        return redirect(route('entries.index'));
    }

    /**
     * Remove the specified Entry from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Entry $entry)
    {
        /** @var Entry $entry */
        $files = File::where('entry_id', $entry->id)->get();
        $comments = Comment::where('entry_id', $entry->id)->get();
        // dd($files."//".$comments."//".$entry);
        if (empty($entry)) {
            Flash::error('Entry not found');

            return redirect(route('entries.index'));
        }
        if (Auth::user()->id == $entry->user_id) {

            if ($entry) {
                $entry->delete();
            }

            if ($files) {
                foreach ($files as $file) {
                    $path = public_path() . "/storage/uploads/" . $file->entry_file_name;
                    unlink($path);
                    $file->delete();
                }
            }

            if ($comments) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            Flash::success('Entry deleted successfully.');
        }



        return redirect(route('entries.index'));
    }
}
