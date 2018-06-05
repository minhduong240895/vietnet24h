<?php

use Illuminate\Support\Facades\File;
/**
 * Upload image to folder use faker
 *
 * @param int $countImages
 * @param string $path
 *
 * @return array
 */
if (!function_exists('uploadImages')) {
    function uploadImages($countImages = 5, $path = 'uploads/fakers')
    {
        $faker = Faker\Factory::create();
        $path = public_path($path);
        $images = [];
        if (checkAndMakeDirectory($path)) {
            for ($i = 0; $i < $countImages; $i++) {
                $images[$i] = $faker->image($path, 200, 200);
            }
        }

        return $images;
    }
}

/**
 * Get all image from folder
 *
 * @param string $path
 *
 * @return array
 */
$getImagesFromFolder = function ($path = 'uploads/fakers') use(&$getImagesFromFolder)
{
    $images = [];
    $path = public_path($path);
    if(checkAndMakeDirectory($path)){
        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $files = File::allFiles($path);
        foreach ($files as $file) {
            $contentType = mime_content_type((string)$file);
            if (in_array($contentType, $allowedMimeTypes)) {
                $images[] = stristr((string)$file, DIRECTORY_SEPARATOR . "uploads");
            }
        }

        if(empty($images) or count($images) < 5){
            uploadImages();

            return $getImagesFromFolder();
        }
    }

    return $images;
};

/**
 * Check directory, if not exist then create it
 *
 * @param $path
 *
 * @return bool
 */
if (!function_exists('checkAndMakeDirectory')) {
    function checkAndMakeDirectory($path)
    {
        if (!File::exists($path)) {

            return File::makeDirectory($path, 0775, true);
        }

        return true;
    }
}

//Groups
$factory->define(App\Models\Group::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
    ];
});
//Users
$factory->define(App\Models\User::class, function (Faker\Generator $faker)use ($getImagesFromFolder)
{
    $images = $getImagesFromFolder();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$LZxs01ieTYHIYHO/gRUC6ua77mMl3XV1378EaxAkiXqhGHzZxCfce', // 123456
        'avatar' => $faker->randomElement($images),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'group_id' => $faker->numberBetween(1, 4),
        'remember_token' => str_random(10),
    ];
});

//Types
$factory->define(App\Models\Types::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(100, 500),
    ];
});
//Tags
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
    ];
});
//Categories
$factory->define(App\Models\Category::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
    ];
});
//Topics
$factory->define(App\Models\Topic::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'category_id' => $faker->numberBetween(1, 5),
    ];
});
//Options
$factory->define(App\Models\Option::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text,
    ];
});

//Banners
$factory->define(App\Models\Banner::class, function (Faker\Generator $faker)use ($getImagesFromFolder)
{
    $images = $getImagesFromFolder();
    return [
        'title' => $faker->text,
        'link' => $faker->url,
        'image' => $faker->randomElement($images),
        'click' => $faker->numberBetween(100, 300),
    ];
});
//Comments
$factory->define(App\Models\Comment::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'ip' => $faker->ipv6,
        'description' => $faker->text,
        'news_id' => $faker->numberBetween(1, 3),
        'status' => $faker->numberBetween(1, 3),
    ];
});

//News
$factory->define(App\Models\News::class, function (Faker\Generator $faker)use ($getImagesFromFolder)
{
    $images = $getImagesFromFolder();
    return [
        'title' => $faker->text,
        'slug' => $faker->slug,
        'capo' => $faker->text,
        'description' => $faker->text,
        'image' => $faker->randomElement($images),
        'related_news' => '1|2',
        'sibling_news' => '1|2|3',
        'public_time' => $faker->time(),
        'type_id' => $faker->numberBetween(1, 3),
        'source' => $faker->word,
        'user_id' => $faker->numberBetween(1, 3),
        'nickname' => $faker->word,
        'seo_title' => $faker->text,
        'seo_keyword' => $faker->text,
        'seo_description' => $faker->text,
        'price' => $faker->numberBetween(100, 300),
        'views' => $faker->numberBetween(1, 3),
        'hot' => $faker->numberBetween(1, 2),
        'topic_id' => $faker->numberBetween(1, 3),
        'status' => $faker->numberBetween(1, 3),
    ];
});
