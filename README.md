# UAS_PemrogramanWeb

Bagian 1: Client-side Programming (Bobot: 30%)
1.1 (15%) Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM.

Panduan:
- Buat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.)
- Menampilkan data dari server kedalam sebuah halaman menggunakan tag `table`

Penjelasan: pada index.php terdapat form yang diinputkan 4 data, menggunakan 2 tipe input yaitu teks dan file. yang setelah disubmit akan mengubah data pada tabel di halaman index.html

1.2 (15%) Buatlah beberapa event untuk menghandle interaksi pada halaman web

Panduan:
- Tambahkan minimal 3 event yang berbeda untuk menghandle form pada 1.1
- Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP
Bagian 2: Server-side Programming (Bobot: 30%)

Penjelasan: Terdapat 3 event yang ada pada index.php dan tersambung pada script.js yaitu pada line 65, 71, dan 73
	    Dimana line 65 Ini memanggil fungsi previewAudio di file JavaScript (script.js), yang memainkan audio dan menampilkan preview.
	    Dimana line 71 Ini memanggil fungsi submitMusic di file JavaScript (script.js), yang melakukan validasi dan mengirim formulir 	    menggunakan AJAX.
	    Dimana line 73 ini bebas untuk kreasi

2.1 (20%) Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar.

Panduan:
- Gunakan metode POST atau GET pada formulir.
- Parsing data dari variabel global dan lakukan validasi disisi server
- Simpan ke basisdata termasuk jenis browser dan alamat IP pengguna

Penjelasan: implementasi PHP untuk mengelola data dari formulir menggunakan variabel global seperti $_POST telah dilakukan di file process_form.php. 

2.2 (10%) Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.

Panduan:
- Objek yang dibuat harus terkait dengan konteks pengembangan web saat ini.

Penjelasan: Terdapat 4 objek yaitu Artis, Judul, Audio, dan logo album

Bagian 3: Database Management (Bobot: 20%)
3.1 (5%) Buatlah sebuah tabel pada database MySQL

Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata

Penjelasan: 1. Buka cmd diwindows
	    2. cd c:\xampp\mysql\bin
	    3. CREATE Database MusicBank;
	    4. Use MusicBank
	    5. CREATE TABLE IF NOT EXISTS music_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    audio VARCHAR(255) NOT NULL,
    album_cover VARCHAR(255) NOT NULL,
    browser VARCHAR(255) NOT NULL,
    ip_address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3.2 (5%) Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.

Panduan:
- Gunakan konstanta atau variabel untuk menyimpan informasi koneksi (host, username, password, nama database).

Penjelasan: Koneksi ke database MySQL pada file PHP umumnya menggunakan ekstensi mysqli atau PDO terdapat pada Index.php dan process_form.php

3.3 (10%) Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.

Panduan:
- Gunakan query SQL yang sesuai dengan skenario yang diberikan.

Penjelasan: manipulasi data pada tabel database dilakukan dengan menggunakan query SQL. Pada bagian formulir, data yang dimasukkan oleh pengguna dikirim ke server dengan metode POST, dan kemudian diolah di file process_form.php. terdapat pada process_form.php

Bagian 4: State Management (Bobot: 20%)
4.1 (10%) Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.

Panduan:
- Gunakan `session_start()` untuk memulai session.
- Simpan informasi pengguna ke dalam session.

Penjelasan: terdapat pada process_form.php yang dimana terdapat session_start() untuk memulaik sebuah percabangan dalam mengeksekusi dari hasil inputan yang diberikan oleh index.php

4.2 (10%) Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.

Panduan:
- Buat fungsi-fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.
- Gunakan browser storage untuk menyimpan informasi secara lokal.

Penjelasan: Terdapat pada bagian script.js dari line 72-120 yang dimana terdapat cookie untuk menerima,menyimpan dan menghapus nama serta judul apabila sudah lewat dari 7 hari. Jika belum masih tersimpan pada local storage

Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)
Bagian bonus ini akan memberikan bobot tambahan 20% jika Anda berhasil meng-host aplikasi web yang Anda buat. Jawablah pertanyaan-pertanyaan berikut:

(5%) Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
	1. Masuk ke 000webhost.com
	2. Login/signup menggunakan email aktif
	3. Buat website dan masukkan passwordnya.
	4. masuk kedalam web dan upload filenya
	5. ke bagian pengelolaan web, buat database baru
	6. pastikan database baru username dan passwordnya dihapal
	7. export database local, lalu import ke database baru di webhost
	8. ganti semua file yang terkoneksi dengan database, hanya ganti username, password, dan namadatabase terbaru saja
	9. refresh website yang kita buat, dan website dapat diakses

(5%) Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
	1. Mudah diakses dan dilakukan caranya
	2. Gratis
	3. Keamanan lumayan bagus dikarenakan setiap web harus ada password yang admin saja tau

(5%) Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
	1. Keamanan dapat terjamin dikarenakan untuk database ada password, dan website itu sendiri dalam mengakses sebagai admin ada 	passwordnya
(5%) Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
	1. Konfigurasi jaringan, yang disediakan oleh webhost untuk dapat diakses oleh seluruh device yang memiliki jaringan
	2. keamanan, setiap input atau data dapat terjamin keamanannya karena kembali lagi harus memakai password apabila ingin mengubah seluruh data yang sudah diinput
