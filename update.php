<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/mongo_atlas_setup.php';

use MongoDB\BSON\ObjectId;

$movies_list = getMongoCollection('movie_list', 'movies');
$title = '';
$year = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $filter = ['_id' => new ObjectId($_POST['id'])];
  $update = ['$set' => [
    'movie_title' => $_POST['movie-title'],
    'movie_year' => (int)$_POST['movie-year'],
  ]];
  $result = $movies_list->updateOne($filter, $update);
  if ($result->getModifiedCount() === 1) {
    // echo "Movie updated successfully!";
    header('Location: ' . '/');
  } else {
    echo "Failed to update movie.";
  }
} else {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $movie = $movies_list->findOne(['_id' => new ObjectId($id)]);
    if ($movie) {
      $title = $movie['movie_title'];
      $year = $movie['movie_year'];
    } else {
      echo "Movie not found.";
      exit;
    }
  } else {
    echo "No movie ID provided.";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Update Movie </title>
</head>

<body class="bg-gray-100 p-10">

  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold mb-4">Update <?= $title ?> </h1>

    <form method="POST" action="update.php" class="space-y-4">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div>
        <label class="block text-gray-700">Title</label>
        <input type="text" name="movie-title" value="<?= htmlspecialchars($title); ?>" required class="w-full p-2 border rounded" />
      </div>

      <div>
        <label class="block text-gray-700">Release Year</label>
        <input type="number" name="movie-year" value="<?= htmlspecialchars($year); ?>" required class="w-full p-2 border rounded" />
      </div>

      <button class=" bg-green-500 text-white py-2 px-4 rounded" type="submit">Update</button>
    </form>

    <div class="mt-4">
      <a href="index.php" class="bg-gray-500 text-white py-2 px-4 rounded">Back to List</a>
    </div>
  </div>

</body>

</html>