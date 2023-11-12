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
        $talks = Talk::latest()->paginate(4)

        return view('talks.index', compact('talks'));
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
        try {
            $talk->save();

            if (!Storage::putFileAs('images/talks', $file, $talk->image)) {
                throw new \Exception('画像ファイルの保存に失敗しました');
            }
            DB::commit();
        } catch (\Exception $e) {
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

        return view('talks.edit', compact('talk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalkRequest $request, string $id)
    {
        $talk = talk::find($id);

        if ($request->user()->cannot('update', $talk)) {
            return redirect()->route('talks.show', $talk)
                ->withErrors('自分の記事以外は更新できません');
        }

        $file = $request->file('image');
        if ($file) {
            $delete_file_path = 'images/talks/' . $talk->image;
            $talk->image = date('YmdHis') . '_' . $file->getClientOriginalName();
        }
        $talk->fill($request->all());

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 更新
            $talk->save();

            if ($file) {
                // 画像アップロード
                if (!Storage::putFileAs('images/talks', $file, $talk->image)) {
                    // 例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの保存に失敗しました。');
                }

                // 画像削除
                if (!Storage::delete($delete_file_path)) {
                    //アップロードした画像を削除する
                    Storage::delete('images/talks/' . $talk->image);
                    //例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの削除に失敗しました。');
                }
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()->route('talks.show', $talk)
            ->with('notice', '記事を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
