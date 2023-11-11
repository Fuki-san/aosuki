<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTalkRequest;
use App\Http\Requests\UpdateTalkRequest;
use App\Models\Talk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('talks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTalkRequest $request)
    {
        $talk = new Talk($request->all());
        $talk->user_id = $request->user()->id;

        $file = $request->file('image');
        $talk->image = date('YmdHis') . '_' . $file->getClientOriginalName();

        DB::beginTransaction();
        try{
            $talk->save();

            if(!Storage::putFileAs('images/talks', $file, $talk->image)) {
                throw new \Exception('画像ファイルの保存に失敗しました');
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
        return redirect()
            ->route('talks.show', $talk)
            ->with('notice', 'チャットを送信しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $talk = Talk::find($id);

        return view('talks.show', compact('talk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $talk = Talk::find($id);

        return view('talks.edit')
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalkRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}