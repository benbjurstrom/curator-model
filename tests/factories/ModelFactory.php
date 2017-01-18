<?php

$factory->define(\BenBjurstrom\CuratorModel\Account::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->unique()->userName,
        'username' => $faker->name,
        // OPTIONAL: affiliation_id
        // OPTIONAL: category_id
        // OPTIONAL: entity_id
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\Affiliation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->jobTitle,
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\Entity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        // REQUIRED: entity_type_id
        // OPTIONAL: parent_entity_id
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\EntityKeyword::class, function (Faker\Generator $faker) {
    return [
        // REQUIRED: entity_id
        // REQUIRED: keyword_type_id
        'keyword' => $faker->unique()->name,
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\EntityTweet::class, function (Faker\Generator $faker) {
    return [
        // REQUIRED: tweet_id
        // REQUIRED: entity_id
        // REQUIRED: keyword_id
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\EntityType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\KeywordType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(\BenBjurstrom\CuratorModel\Tweet::class, function (Faker\Generator $faker) {
    return [
        // REQUIRED: account_id
        'text' => $faker->realText,
    ];
});