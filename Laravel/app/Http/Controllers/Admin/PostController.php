<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\StoreImage;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotify;
use App\Post;
use App\Subscriber;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->where('is_post', true)->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            "post_title" => 'required|unique:posts,title',
            "categories" => 'required',
        ]);

        $post = new Post();

        /* traemos las cosas desde el front */
        $image1 = $request->file('post_image1');
        
        $post_title = $request->post_title;
        $post_pais = $request->post_pais;
        $post_estado = $request->post_estado;
        $post_ciudad = $request->post_ciudad;
        $post_direccion = $request->post_direccion;
        $post_telefono = $request->post_telefono;
        $post_edad = $request->post_edad;

        $slug = str_slug($post_title);


        /* las usamos */
        $post->title = $post_title;
        
        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->body = $request->post_body;
        $post->status = isset($request->status);
        $post->is_approved = true;

        
        if (isset($image1)) {
            $storeImage = new StoreImage(
                'post', $image1, 1600, 1066, $post_title
            );

            $unique_image_name = $storeImage->storeImage();
            
            $post->image = $image1;
        }
                
        

        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        //$this->sendNotificationViaEmail($post, null, Subscriber::all());

        /* $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            Notification::route('mail', $subscriber->email)
                ->notify(new NewPostNotify($post));
        } */

        Toastr::success('Admin Post Created Successfully');

        return redirect(route('admin.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "post_title" => 'required',
            "categories" => 'required',
            "tags"       => 'required',
            "post_body"  => 'required',
            ]);

        /* traemos las cosas desde el front */

        $image1 = $request->file('post_image1');
        
        $post_title = $request->post_title;
        $post_pais = $request->post_pais;
        $post_estado = $request->post_estado;
        $post_ciudad = $request->post_ciudad;
        $post_direccion = $request->post_direccion;
        $post_telefono = $request->post_telefono;
        $post_edad = $request->post_edad;

        $slug = str_slug($post_title);

        /* las usamos */

        $post->title = $post_title;
        $post->pais = $post_pais;
        $post->estado = $post_estado;
        $post->ciudad = $post_ciudad;
        $post->direccion = $post_direccion;
        $post->telefono = $post_telefono;
        $post->edad = $post_edad;

        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->body = $request->post_body;
        $post->status = isset($request->status);
        $post->is_approved = true;

        if (isset($image1)) {
            $storeImage = new StoreImage(
                'post', $image1, 1600, 1066, $post_title
            );

            $unique_image_name = $storeImage->storeImage();
            
            $post->image = $image1;
        }
        
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('Admin Post updated successfully');

        return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
        StoreImage::deleteExistingImage('post', $post->image);

        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        Toastr::success('Admin Post deleted successfully');

        return redirect(route('admin.post.index'));
    }

    public function pending()
    {
        $posts = Post::where('is_approved', false)->latest()->get();

        return view('admin.post.pending', compact('posts'));
    }

    public function approval(Post $post)
    {
        if (!$post->is_approved) {
            $post->is_approved = true;
            $post->save();

            /*Notification::send($post->user, new AuthorPostApproved($post));

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                Notification::route('mail', $subscriber->email)
                    ->notify(new NewPostNotify($post));
            }*/

            $this->sendNotificationViaEmail($post, $post->user, Subscriber::all());

            Toastr::success('Post approved successfully');
            return redirect(route('admin.post.pending'));
        } else {
            Toastr::info('Post already approved!');
            return redirect(route('admin.post.pending'));
        }
    }

    private function sendNotificationViaEmail($post, $author, $subscribers)
    {
        if ($author)
            Notification::send($author, new AuthorPostApproved($post));

        if ($subscribers) {
            foreach ($subscribers as $subscriber) {
                Notification::route('mail', $subscriber->email)
                    ->notify(new NewPostNotify($post));
            }
        }
    }
}
