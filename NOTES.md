# LARAVEL
guide: https://youtu.be/376vZ1wNYPA?t=16599

## DATABASE
php artisan make:factory PostFactory

php artisan make:model <name[sole]> -m
php artisan make:controller <name[plural]>
php artisan make:controller <name[plural]> --resource

php artisan migrate

php artisan route:list

php artisan tinker
>>> \App\Models\Post::factory()->create();
>>> \App\Models\Post::factory()->count(<n>)->create();






// EXAMPLES WITH DB
public function index()
{
    $id = 1;

    // $posts = DB::table('posts')
    //     ->find($id)
    //     ->get();
    // $posts = DB::table('posts')
    //     ->insert([
    //         'title' => 'title', 'description' => 'description'
    //     ])
    // $posts = DB::table('posts')
    //     ->where('id', '=', 1)
    //     ->update([
    //         'title' => 'new title', 'description' => 'new description'
    //     ]);
    $posts = DB::table('posts')
        ->where('id', '=', 1)
        ->delete();

    dd($posts);
}

// FIRST EXAMPLES
// public function index()
// {
//     // $title = "Welcome to my products page.";
//     // $description = "Very cool indeed.";

//     // compact method
//     // return view('products/index', compact('title', 'description'));

//     $items = [
//         'first',
//         'second',
//         'third',
//     ];

//     return view('posts.index', [
//         'items' => $items
//     ]);
// }

// public function detail($name)
// {
//     $items = [
//         'first' => 'one',
//         'second' => 'two',
//         'third' => 'three',
//     ];

//     return view('posts.detail', [
//         'item' => $items[$name] ?? 'post ' . $name . ' is not found.'
//     ]);
// }
}