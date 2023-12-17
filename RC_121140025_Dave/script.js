//Nama : Dave Nathanael Anthonius 
//NIM  : 121140025                
//Kelas: RC                       

var audioPlayer = document.getElementById('audioPlayer');
var albumPreview = document.getElementById('albumPreview');

function previewAudio() {
    var fileInput = document.getElementById('audio');
    var file = fileInput.files[0];

    if (file) {
        var objectURL = URL.createObjectURL(file);
        audioPlayer.src = objectURL;
        audioPlayer.play();
    }
}

function previewAlbumCover() {
    var fileInput = document.getElementById('albumCover');
    var file = fileInput.files[0];

    if (file) {
        var objectURL = URL.createObjectURL(file);
        albumPreview.src = objectURL;
    }
}

document.getElementById('albumCover').addEventListener('change', previewAlbumCover);

function submitMusic() {
    var artist = document.getElementById('artist').value;
    var title = document.getElementById('title').value;
    var audioInput = document.getElementById('audio');
    var albumCoverInput = document.getElementById('albumCover');

    if (artist.trim() === '' || title.trim() === '' || audioInput.files.length === 0 || albumCoverInput.files.length === 0) {
        alert('Semua kolom harus diisi.');
        return;
    }

    var formData = new FormData(document.getElementById('musicForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_form.php', true);
    xhr.onload = function () {
        console.log(xhr.responseText);

        var newRow = musicTable.insertRow(-1);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);

        cell1.innerHTML = artist;
        cell2.innerHTML = title;
        cell3.innerHTML = audioInput.files[0].name;
        cell4.innerHTML = '<img src="uploads/' + albumCoverInput.files[0].name + '" alt="Album Cover" class="album-img">';

        document.getElementById('artist').value = '';
        document.getElementById('title').value = '';
        audioInput.value = '';
        albumCoverInput.value = '';
    };
    xhr.send(formData);
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}

function saveState(artist, title) {
    localStorage.setItem('artist', artist);
    localStorage.setItem('title', title);
}

function getState() {
    var artist = localStorage.getItem('artist');
    var title = localStorage.getItem('title');
    return { artist, title };
}

function clearState() {
    localStorage.removeItem('artist');
    localStorage.removeItem('title');
}

function setStateWithCookie(artist, title) {
    setCookie('artist', artist, 7);
    setCookie('title', title, 7);
}
