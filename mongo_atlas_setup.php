<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new MongoDB\Client(
  'mongodb+srv://' . $_ENV['MDB_USER'] . ':' . $_ENV['MDB_PASS'] . '@movie-list.s6r7qkr.mongodb.net/?retryWrites=true&w=majority&appName=movie-list'
);

function getMongoClient()
{
  global $client;
  return $client;
}

function getMongoCollection($database, $collection)
{
  $client = getMongoClient();
  return $client->selectCollection($database, $collection);
}