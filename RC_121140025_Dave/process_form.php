<!-- Nama : Dave Nathanael Anthonius -->
<!-- NIM  : 121140025                -->
<!-- Kelas: RC                       -->

<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'MusicBank');

function getDBConnection() {
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $conn = getDBConnection();

        $artist = $_POST['artist'];
        $title = $_POST['title'];
        $audio = $_FILES['audio']['name'];
        $albumCover = $_FILES['albumCover']['name'];

        $uploadDir = __DIR__ . '/uploads/';
        move_uploaded_file($_FILES['audio']['tmp_name'], $uploadDir . $audio);
        move_uploaded_file($_FILES['albumCover']['tmp_name'], $uploadDir . $albumCover);

        $stmt = $conn->prepare("INSERT INTO music_data (artist, title, audio, album_cover)
                                VALUES (:artist, :title, :audio, :albumCover)");

        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':audio', $audio);
        $stmt->bindParam(':albumCover', $albumCover);

        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}
?>
