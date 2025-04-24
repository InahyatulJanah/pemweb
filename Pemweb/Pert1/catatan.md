# PERTEMUAN 1

Website berguna untuk membuat portofolio dll
contoh adress/disebut domain: 
- facebook.com
- youtube.com
berfungsi dalam mengakses website

.env nya untuk uas/uts/project bisa dirubah yahh:
COMPOSE_PROJECT_NAME=esgul (nama sendiri)
REPOSITORY_NAME=pemweb (project Uas)
IMAGE_TAG=latest

docker compose.yml : buat version hukum mati nya. berikut adalah isi nya

version: '3'

services:
  Web:  
    image: nginx:latest
    ports:
      - 80:80
    volumes: --> isinya file buat ngejalanin di docker
      - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
      - ./src:/usr/share/nginx/html

listen 80; yang ada di nginx.conf harus disamain sama dengan port nya yang ada di .yml

80 (untuk os): 80 (untuk port didocker)
./src/index.html:/usr/share/nginx/html
port di os      :       port didocker

## extension yang dipakai disini
- auto rename tag
- auto close tag
- auto complete tag

## Langkah - langkah menjalankan Html:
1. buat direktori pemweb 
2. kemudian membuat folder pert1
3. isi folder pert1
  - buat folder coding dalamnya ada folder latihan, nginx, dan src
4. kalo sudah kemudian dibuild
  - cara masukin image atau gambar ke syntax nya buat folder terserah apa aja namanya lalu drop img ke folder yg sudah dibuat llau di syntax tambahkan codingan yang bisa menginput gambar ke web lau ctrl+sve

## Tag tag di HTML
- html : Menandai awal dan akhir dokumen HTML.
- head : Berisi metadata dan informasi tentang dokumen.
- title : Menentukan judul halaman yang muncul di tab browser.
- body : Berisi konten utama yang ditampilkan di browser.
- meta : Menyimpan informasi meta seperti charset dan deskripsi halaman.
- link : Menghubungkan dengan file CSS eksternal.
- style : Menulis CSS langsung di dalam HTML.
- script : Menjalankan kode JavaScript.
- <!DOCTYPE> : Menentukan tipe dokumen HTML.
- div : sering digunakan untuk mengelompokkan beberapa elemen HTML menjadi satu kesatuan.

- <h1> hingga <h6> : Heading (judul) dari yang terbesar ke terkecil.
- <p> : Paragraf teks.
- <br> : Baris baru.
- <hr> : Garis horizontal pemisah.