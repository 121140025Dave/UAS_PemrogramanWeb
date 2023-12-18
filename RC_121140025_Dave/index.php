<!-- Nama : Dave Nathanael Anthonius -->
<!-- NIM  : 121140025                -->
<!-- Kelas: RC                       -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .album-img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "MusicBank";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$query = "SELECT artist, title, audio, album_cover FROM music_data";
$result = $conn->query($query);
?>

<form id="musicForm" method="POST" enctype="multipart/form-data" action="process_form.php">
    <label for="artist">Nama Artis:</label>
    <input type="text" id="artist" name="artist" required><br>

    <label for="title">Judul Lagu:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="audio">File Audio:</label>
    <input type="file" id="audio" name="audio" accept="audio/*" required><br>

    <label for="albumCover">Foto Album:</label>
    <input type="file" id="albumCover" name="albumCover" accept="image/*" required><br>

    <button type="button" onclick="previewAudio()">Preview Audio</button><br>

    <audio id="audioPlayer" controls></audio><br>

    <img id="albumPreview" alt="Album Cover" style="max-width: 200px; max-height: 200px;"><br>

    <button type="button" onclick="submitMusic()">Submit Lagu</button>

    <button type="button" onclick="myCustomEvent()">My Custom Event</button>
</form>

<hr>

<h2>Data Musik:</h2>
<table border="1" id="musicTable">
    <tr>
        <th>Artis</th>
        <th>Judul Lagu</th>
        <th>File Audio</th>
        <th>Foto Album</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['artist'] . '</td>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . $row['audio'] . '</td>';
        echo '<td><img src="uploads/' . $row['album_cover'] . '" alt="Album Cover" class="album-img"></td>';
        echo '</tr>';
    }
    ?>
</table>

<script src="script.js"></script>

</body>
</html>
