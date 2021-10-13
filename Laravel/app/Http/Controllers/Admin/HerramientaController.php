<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\StoreImage;
use App\Helpers\StoreScad;
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

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->where('is_post', false)->get();
        return view('admin.herra.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        //$categories = Category::all();
        return view(' admin.herra.create', compact('tags')); //, 'categories'
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
            "tags"       => 'required',
            "post_body"  => 'required',
            "post_scad"  => 'required',
            "post_image"  => 'required',
        ]);

        $post = new Post();

        /* traemos las cosas desde el front */
        $image = $request->file('post_image');
        $scad = $request->file('post_scad');

        $post_title = $request->post_title;

        $slug = str_slug($post_title);


        /* las usamos */
        $post->title = $post_title;

        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->body = $request->post_body;
        $post->status = isset($request->status);
        $post->is_approved = true;
        $post->is_post = false;

        if (isset($image)) {
            $storeImage = new StoreImage(
                "herramientas", $image, 1600, 1066, $post_title
            );

            $unique_image_name = $storeImage->storeImage();
            
            $post->image = $unique_image_name;
        };

        if (isset($scad)) {
            $storeScad = new StoreScad(
                "herramientas", $scad, Null, Null, $post_title
            );

            $unique_scad_name = $storeScad->storeImage();
            
            $post->scad = $unique_scad_name;
        };
    
        $post->save();

        //$post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        //$this->sendNotificationViaEmail($post, null, Subscriber::all());

        /* $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            Notification::route('mail', $subscriber->email)
                ->notify(new NewPostNotify($post));
        } */

        Toastr::success(' admin.herra Created Successfully');

        return redirect(route('admin.herramienta.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view(' admin.herra.show', compact('post'));
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

        return view('admin.herra.edit', compact('post', 'categories', 'tags'));
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
            "post_title" => 'required|unique:posts,title',
            "tags"       => 'required',
            "post_body"  => 'required',
            ]);

        /* traemos las cosas desde el front */

        $image = $request->file('post_image');
        $scad = $request->file('post_scad');

        $post_title = $request->post_title;

        $slug = str_slug($post_title);

        /* las usamos */
        $post->title = $post_title;

        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->body = $request->post_body;
        $post->status = isset($request->status);
        $post->is_approved = true;
        $post->is_post = false;

        $arrayimagenes = [];

        ///////

       
        if (isset($image)) {
            $storeImage = new StoreImage(
                "herramientas", $image, 1600, 1066, $post_title
            );

            $unique_image_name = $storeImage->storeImage();
            
            $post->image = $unique_image_name;
        };

        if (isset($scad)) {
            $storeScad = new StoreScad(
                "herramientas", $scad, Null, Null, $post_title
            );

            $unique_scad_name = $storeScad->storeImage();
            
            $post->scad = $unique_scad_name;
        };
    
        $post->save();

        //$post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('admin.herra updated successfully');

        return redirect(route('admin.herra.index'));
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

        Toastr::success(' admin.herra deleted successfully');

        return redirect(route(' admin.herra.index'));
    }
/*
    public function pending()
    {
        $posts = Post::where('is_approved', false)->latest()->get();

        return view(' admin.herra.pending', compact('posts'));
    }*/
/*
    public function approval(Post $post)
    {
        if (!$post->is_approved) {
            $post->is_approved = true;
            $post->save();

            Notification::send($post->user, new AuthorPostApproved($post));

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                Notification::route('mail', $subscriber->email)
                    ->notify(new NewPostNotify($post));
            }

            $this->sendNotificationViaEmail($post, $post->user, Subscriber::all());

            Toastr::success('Post approved successfully');
            return redirect(route(' admin.herra.pending'));
        } else {
            Toastr::info('Post already approved!');
            return redirect(route(' admin.herra.pending'));
        }
    }
*/
/*    private function sendNotificationViaEmail($post, $author, $subscribers)
    {
        if ($author)
            Notification::send($author, new AuthorPostApproved($post));

        if ($subscribers) {
            foreach ($subscribers as $subscriber) {
                Notification::route('mail', $subscriber->email)
                    ->notify(new NewPostNotify($post));
            }
        }
    }*/
}
