<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/mongo_atlas_setup.php';

$movies_list = getMongoCollection('movie_list', 'movies');
$movies = $movies_list->find([], ['sort' => ['_id' => -1]]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie List CRUD App</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold mb-4 text-center">Movie List CRUD App</h1>

    <?php include 'create.php' ?>

    <div class="space-y-4">
      <?php foreach ($movies as $movie) : ?>
        <div class="p-4 border rounded shadow-sm bg-gray-50">
          <h2 class="text-2xl font-semibold"><?= $movie['movie_title'] ?></h2>
          <p class="text-gray-700">Year: <?= $movie['movie_year'] ?></p>
          <div class="mt-2">
            <a href="update.php?id=<?= $movie['_id'] ?>" class="bg-yellow-500 text-white py-1 px-3 rounded">Update</a>
            <a href="delete.php?id=<?= $movie['_id'] ?>" onclick="return confirm('Are you sure you want to delete this movie?')" class="bg-red-500 text-white py-1 px-3 rounded">Delete</a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>

</body>

</html>