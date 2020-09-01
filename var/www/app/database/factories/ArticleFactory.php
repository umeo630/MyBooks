<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use App\User;
use Faker\Generator as Faker;

//Articleモデルの値をランダムで生成
$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class);
        },
        'book_title' => $faker->text(50),
        'book_evaluation' => $faker->numberBetween(1, 5),
        'book_content' => $faker->text(500),
        'read_at' => $faker->date,
        'display_flg' => '0',
        'delete_flg' => '0',
        'create_at' => $faker->dateTime,
    ];
});
