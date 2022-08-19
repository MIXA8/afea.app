<?php

namespace App\Http\Controllers\Web\Workers\Lord\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Workers\post\addPostRequest;
use App\Http\Requests\Web\Workers\post\updatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostLordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(50);
        return view('worker.lord.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.lord.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(addPostRequest $request)
    {
//        $validated = $request->validated();
        if ($request->hasFile('img')) {
            $folder = date("Y-m-d");
            $img = $request->file('img')->store("post/{$folder}");
        }
        Post::create(
            [
                'title' => $request->title,
                'text' => $request->text,
                'shorts' => $request->short,
                'slug' => Str::slug($request->title),
                'img' => $img,
                'worker_id' => Auth::guard('worker')->user()->id,
                'department_id' => Auth::guard('worker')->user()->department,
                'status' => $request->status,
            ]
        );
        return redirect()->back()->with('success', "Статья добавлена");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('worker.lord.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, Post $post)
    {
        if ($request->hasFile('img')) {
            Storage::delete($post->img);
            $folder = date("Y-m-d");
            $img = $request->file('img')->store("post/{$folder}");
            $result = DB::table('posts')->where('id', $post->id)->update([
                'img' => $img
            ]);
        }
        $post->update(
            [
                'title' => $request->title,
                'text' => $request->text,
                'shorts' => $request->shorts,
                'slug' => Str::slug($request->title),
                'worker_id' => Auth::guard('worker')->user()->id,
                'department_id' => Auth::guard('worker')->user()->department,
                'status' => $request->status,
            ]
        );
        return redirect()->back()->with('success', "Статья изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->update(
            [
                'delete' => 1,
            ]
        );
        return redirect()->back()->with('success', "Статья удалена");
    }
}
