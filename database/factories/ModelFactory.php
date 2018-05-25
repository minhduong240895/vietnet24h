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
        'password' => '$2y$10$GIud/C4bcu.hPpuzcKDh9u41xz5WlBLsz2hIxGRJ78Ta299UWPGZK', // leoduong
        'avatar' => $faker->randomElement($images),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'group_id' => $faker->numberBetween(1, 4),
        'remember_token' => str_random(10),
    ];
});

//News
$factory->define(App\Models\News::class, function (Faker\Generator $faker)use ($getImagesFromFolder)
{
    $images = $getImagesFromFolder();
    return [
        'title' => $faker->text,
        'description' => $faker->text,
        'image' => $faker->randomElement($images),
        'status' => $faker->numberBetween(1, 3),
    ];
});
