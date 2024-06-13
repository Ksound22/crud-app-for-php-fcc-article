# Movie List CRUD App

This is a simple PHP CRUD application for the article collaboration between freeCodeCamp and MongoDB. It uses MongoDB Atlas for the database and Tailwind CSS for styling.

## Features

- Create, read, update, and delete movies
- Styling with Tailwind CSS
- Uses MongoDB Atlas for database management

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- PHP 8+
- Composer
- MongoDB PHP extension

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Ksound22/crud-app-for-php-fcc-article.git
   cd movie-list-crud-app
   ```

2. **Ensure MongoDB extension is Enabled**

   Make sure the MongoDB PHP extension is installed and enabled. You can install it using PECL:

   ```bash
   sudo pecl install mongodb
   ```

   Then, add the following line to your php.ini file:

   ```bash
   extension=mongodb.so
   ```

3. **Install Dependencies**

   ```bash
   composer install
   ```

4. **Create a `.env` File Off the Existing `.env.example` File in the Root and add your Atlas URI, A.K.A Connection String**

   Create .env file

   ```bash
   cp .env.example .env
   ```

   Add your Mongo URI

   ```bash
   MDB_URI="mongodb atlas connection string"
   ```

5. **Start the PHP Built-in Server**

   ```bash
   php -S localhost:port-number
   ```

## Project Structure

- `index.php`: the main page that lists all movies.
- `create.php`: the page to create a new movie.
- `update.php`: the page to update an existing movie.
- `delete.php`: the page to delete a movie.
- `mongo_atlas_setup.php`: MongoDB connection setup.
- `.env`: environment variables (not included in the repository).
- `vendor/`: composer dependencies (not included in the repository).
