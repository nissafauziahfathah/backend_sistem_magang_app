# Sistem Manajemen Tugas Anak Magang

## Deskripsi Sistem

**Sistem Manajemen Tugas Anak Magang** merupakan aplikasi berbasis web yang digunakan untuk membantu proses pengelolaan kegiatan PKL (Praktik Kerja Lapangan) atau magang pada suatu instansi/perusahaan.

Aplikasi ini membantu admin dalam mengelola data mahasiswa magang, memberikan tugas PKL, menerima laporan tugas, serta memantau perkembangan penyelesaian tugas anak magang secara lebih terstruktur dan efisien.

---

## Fitur Utama

Berikut fitur yang tersedia pada sistem:

- Login pengguna (Admin & Anak Magang)
- Dashboard informasi sistem
- CRUD Data Mahasiswa
- CRUD Data Tugas PKL
- Input dan upload laporan tugas
- Monitoring progres penyelesaian tugas
- Logout pengguna

---

## Hak Akses Pengguna

### 1. Admin

Admin memiliki hak akses untuk mengelola seluruh data pada sistem.

Fitur Admin:

- Login ke sistem
- Melihat dashboard
- Mengelola data mahasiswa magang:
  - Menambah data mahasiswa
  - Melihat data mahasiswa
  - Mengubah data mahasiswa
  - Menghapus data mahasiswa
- Mengelola data tugas PKL:
  - Menambah tugas
  - Melihat tugas
  - Mengubah tugas
  - Menghapus tugas
- Melihat dan memonitor laporan tugas mahasiswa
- Logout

---

### 2. Anak Magang

Anak magang memiliki hak akses untuk melihat dan mengelola tugas yang diberikan.

Fitur Anak Magang:

- Login ke sistem
- Melihat dashboard
- Melihat daftar tugas yang diberikan
- Menginput atau upload laporan tugas
- Melihat status penyelesaian tugas
- Logout

---

# Struktur Folder Project

```
sistem_magang_app
│
├── application/
│   │
│   ├── controllers/
│   │     ├── Auth.php
│   │     ├── Dashboard.php
│   │     ├── Mahasiswa.php
│   │     ├── Tugas.php
│   │     └── Laporan.php
│   │
│   ├── models/
│   │     ├── Auth_model.php
│   │     ├── Dashboard_model.php
│   │     ├── Mahasiswa_model.php
│   │     ├── Tugas_model.php
│   │     └── Laporan_model.php
│   │
│   └── views/
│
├── uploads/
│   └── tugas/
│
├── system/
│
└── index.php
```

---

# Penjelasan Struktur Folder

## Controllers

Folder **controllers** berisi file yang mengatur proses logika aplikasi dan menghubungkan antara model dengan tampilan.

| Controller | Fungsi |
|---|---|
| Auth.php | Mengatur proses login dan autentikasi pengguna |
| Dashboard.php | Mengatur tampilan dan data dashboard |
| Mahasiswa.php | Mengatur CRUD data mahasiswa |
| Tugas.php | Mengatur CRUD data tugas PKL |
| Laporan.php | Mengatur proses laporan tugas |

---

## Models

Folder **models** berisi file yang mengatur proses komunikasi dengan database.

| Model | Fungsi |
|---|---|
| Auth_model.php | Mengelola data login pengguna |
| Dashboard_model.php | Mengambil data statistik dashboard |
| Mahasiswa_model.php | Mengelola data mahasiswa |
| Tugas_model.php | Mengelola data tugas |
| Laporan_model.php | Mengelola data laporan tugas |

---

## Uploads

Folder **uploads** digunakan untuk menyimpan file yang diupload oleh pengguna.

Struktur:

```
uploads/
└── tugas/
```

Folder tersebut digunakan untuk menyimpan dokumen laporan atau file tugas magang.

---

# Database

Database yang digunakan pada sistem ini terdiri dari beberapa tabel:

### 1. Users

Menyimpan data akun pengguna.

Kolom utama:
- id_user
- username
- password
- role

---

### 2. Mahasiswa

Menyimpan data mahasiswa magang.

Kolom utama:
- id_mahasiswa
- id_user
- nim
- nama_mahasiswa
- jurusan
- perusahaan_magang
- tanggal_mulai
- tanggal_selesai

---

### 3. Tugas

Menyimpan data tugas PKL yang diberikan.

Kolom utama:
- id_tugas
- id_mahasiswa
- judul_tugas
- deskripsi
- deadline
- file_tugas
- status

---

### 4. Laporan

Menyimpan data laporan tugas mahasiswa.

Kolom utama:
- id_laporan
- id_mahasiswa
- nama_laporan
- periode
- file_laporan
- tanggal_upload

---

# Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| Framework | CodeIgniter 3 |
| Bahasa Pemrograman | PHP |
| Database | MySQL |
| Tampilan | Bootstrap |
| Server | XAMPP (Apache & MySQL) |

---

# Cara Menjalankan Project

1. Install XAMPP.
2. Aktifkan Apache dan MySQL pada XAMPP.
3. Simpan folder project ke:

```
C:/xampp/htdocs/
```

4. Import database melalui phpMyAdmin.

5. Atur koneksi database pada file:

```
application/config/database.php
```

6. Jalankan aplikasi melalui browser:

```
http://localhost/sistem_magang_app
```

---

# Akun Login Default

## Admin

Username:
```
admin
```

Password:
```
admin123
```

---

## Anak Magang

Username:
```
mahasiswa1
```

Password:
```
123456
```

---

# Pengembangan Selanjutnya

Beberapa pengembangan yang dapat dilakukan:

- Notifikasi deadline tugas
- Grafik perkembangan tugas mahasiswa
- Export laporan ke PDF
- Sistem komentar pada tugas
- Manajemen data perusahaan magang

---

# Author

**Sistem Manajemen Tugas Anak Magang**  
Project Web Programming - CodeIgniter 3