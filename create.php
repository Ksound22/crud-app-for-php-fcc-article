<?php
require_once __DIR__ . '/mongo_atlas_setup.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $movies = getMongoCollection('movie_list', 'movies');
  $newMovie = [
    'movie_title' => $_POST['movie-title'],
    'movie_year' => (int)$_POST['movie-year'],
  ];
  $result = $movies->insertOne($newMovie);
  if ($result->getInsertedCount() === 1) {
    echo "Movie created successfully!";
    header('Location: ' . '/');
  } else {
    echo "Failed to create movie.";
  }
}
?>



<form method="POST" action="create.php" class="space-y-4 mb-6">
  <div>
    <label class="block text-gray-700">Movie Title</label>
    <input type="text" name="movie-title" required class="w-full p-2 border rounded max-w-md">
  </div>
  <div>
    <label class="block text-gray-700">Movie Year</label>
    <input type="text" name="movie-year" required class="w-full p-2 border rounded max-w-md">
  </div>
  <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Create</button>
</form>