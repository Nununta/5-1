<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function add()
    {
        return view('post.create');
    }

    public function create(Request $request)
    {
            // Varidationを行う
    $this->validate($request, Post::$rules);
    $post = new Post;
    $form = $request->all();

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    
    // データベースに保存する
    $post->fill($form)->save();
    return redirect('post');

    }  

    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Post::where('body', $cond_title)->get();
        } else {
            // それ以外はすべて取得する
            $posts = Post::all();
        }
     
        return view('post.index', ['posts' => $posts, 'cond_title' => $cond_title]);
        }

        public function edit(Request $request)
        {
            // Todo Modelからデータを取得する
            $posts = Post::find($request->id);
            if (empty($posts)) {
              abort(404);    
            }
            return view('post.edit', ['post_form' => $posts]);
        }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, Post::$rules);
      // Todo Modelからデータを取得する
      $post = Post::find($request->get('id'));
      // 送信されてきたフォームデータを格納する
      $post_form = $request->all();
  
      unset($post_form['_token']);
      unset($post_form['remove']);
  
      // 該当するデータを上書きして保存する
      $post->fill($post_form)->save();
  
      return redirect('post');

    }

    public function delete(Request $request)
  {
      // 該当するTodo Modelを取得
      $posts = Post::find($request->id);
      // 削除する
      $posts->delete();
      return redirect('post');
  }

  
}
