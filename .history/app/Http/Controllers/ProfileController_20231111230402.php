<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
    //$リクエストされたデータを取得（外部キーはまだ空のため入れる必要あり）
        $profile = new Profile($request->all());
    //外部キー(左辺、user_id)に、ID(右辺)を代入している
        $profile->user_id = $request->user()->id;
        $profile->nickname = 
    //画像取得($profileは画像以外もあるから、$fileに画像だけいれる)
        $file = $request->file('image');
        $profile->image = date('YmdHis') . '_' . $file->getClientOriginalName();

        DB::beginTransaction();
        try{
            $profile->save();

            if(!Storage::putFileAs('images/profiles', $file, $profile->image)) {
                throw new \Exception('画像ファイルの保存に失敗しました');
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
        }
        return redirect()
            ->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
