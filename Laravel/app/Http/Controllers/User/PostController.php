<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Helpers\StoreImage;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserPost;
use App\Post;
use App\Tag;
use App\User;
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
        $posts = Auth::user()->posts()->latest()->get();
        return view('user.post.index', compact('posts'));
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

        return view('user.post.create', compact('tags', 'categories'));
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
            "post_image1" => 'mimes:jpg,jpeg,png',
            "categories" => 'required',
            
        ]);

        $post = new Post();

        /* traemos las cosas desde el front */
        $image1 = $request->file('post_image1');
        $image2 = $request->file('post_image2');
        $image3 = $request->file('post_image3');
        $image4 = $request->file('post_image4');
        $image5 = $request->file('post_image5');

        $post_title = $request->post_title;
        
        $slug = str_slug($post_title);


        /* las usamos */
        $post->title = $post_title;
        
        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->body = $request->post_body;
        $post->status = isset($request->status);
        $post->is_approved = true;

        $arrayimagenes = [];

        for ($i=1; $i < 6 ; $i++) {
            $imagennumero = "image".$i;
            if (isset($$imagennumero)) {
                $storeImage = new StoreImage(
                    'post', $$imagennumero, 1600, 1066, $post_title
                );
    
                $unique_image_name = $storeImage->storeImage();
                
                $arrayimagenes += [ $i => $unique_image_name ];
            }
        }

        $arrayimageneslistas = implode(" | ", $arrayimagenes);
        
        $post->image = $arrayimageneslistas;

        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        //$users = User::where('role_id', 1)->get();
        //Notification::send($users, new NewUserPost($post));

        Toastr::success('Post Inserted Successfully', 'Success');

        return redirect(route('user.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id())
            return redirect()->back();

        return view('user.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id())
            return redirect()->back();

        $categories = Category::all();
        $tags = Tag::all();

        return view('user.post.edit', compact('post', 'categories', 'tags'));
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
        if ($post->user_id !== Auth::id())
            return redirect()->back();

        $request->validate([
            "post_title" => 'required',
            "categories" => 'required',
            "tags"       => 'required',
            "post_body"  => 'required',
            "post_pais"       => 'required',
            "post_estado"     => 'required',
            "post_ciudad"     => 'required',
            "post_direccion"  => 'required',
            "post_telefono"   => 'required',
            "post_edad"       => 'required',
        ]);

/* traemos las cosas desde el front */
        $image1 = $request->file('post_image1');
        $image2 = $request->file('post_image2');
        $image3 = $request->file('post_image3');
        $image4 = $request->file('post_image4');
        $image5 = $request->file('post_image5');

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

        $arrayimagenes = [];

        for ($i=1; $i < 6 ; $i++) {
            $imagennumero = "image".$i;
            if (isset($$imagennumero)) {
                $storeImage = new StoreImage(
                    'post', $$imagennumero, 1600, 1066, $post_title
                );
    
                $unique_image_name = $storeImage->storeImage();
                
                $arrayimagenes += [ $i => $unique_image_name ];
            }
        }

        $arrayimageneslistas = implode(" | ", $arrayimagenes);
        
        if (isset($arrayimageneslistas)) {
            $post->image = $arrayimageneslistas;
        }
        
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('User Post updated successfully');

        return redirect(route('user.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id())
            return redirect()->back();

        StoreImage::deleteExistingImage('post', $post->image);

        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        Toastr::success('User Post deleted successfully');

        return redirect(route('user.post.index'));
    }
}
