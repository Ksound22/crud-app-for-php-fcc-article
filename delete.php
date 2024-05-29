<?php
require_once __DIR__ . '/mongo_atlas_setup.php';

use MongoDB\BSON\ObjectId;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $movies = getMongoCollection('movie_list', 'movies');
  $filter = ['_id' => new ObjectId($_GET['id'])];
  $result = $movies->deleteOne($filter);
  if ($result->getDeletedCount() === 1) {
    // echo "Movie deleted successfully!";
    header('Location: ' . '/');
  } else {
    echo "Failed to delete movie.";
  }
} else {
  echo "No movie provided.";
}
?>

<a href="index.php">Back to List</a>