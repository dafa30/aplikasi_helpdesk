# Aplikasi Helpdesk

Aplikasi web sederhana untuk mengelola tiket bantuan internal. Proyek ini dibuat dengan PHP native dan MySQL/MariaDB; aplikasi ini **tidak menggunakan Laravel**.

## Teknologi

- PHP
- MySQL atau MariaDB, diakses menggunakan `mysqli`
- Bootstrap dan jQuery untuk antarmuka
- Apache (disarankan menggunakan Laragon untuk lingkungan lokal)

## Fitur

- Login dengan hak akses admin, pegawai, dan teknisi.
- Admin mengelola data pekerja, teknisi, dan tiket.
- Pegawai melihat data teknisi serta membuat dan mengelola tiket.
- Teknisi melihat dan memperbarui tiket yang ditugaskan.
- Status tiket: `Rejected`, `Progress`, dan `Done`.

## Menjalankan di Laragon

1. Letakkan folder proyek di `C:\laragon\www\aplikasi_helpdesk`.
2. Jalankan Apache dan MySQL/MariaDB melalui Laragon.
3. Buka phpMyAdmin, lalu impor file `helpdesk.sql`. File tersebut membuat database bernama `helpdesk` beserta tabel dan data awal.
4. Periksa pengaturan koneksi di `koneksi.php`. Nilai bawaan proyek adalah host `localhost`, user `root`, password kosong, dan database `helpdesk`. Sesuaikan bila konfigurasi lokal berbeda.
5. Buka `http://localhost/aplikasi_helpdesk/` di browser.

## Akun Demo

Data awal pada `helpdesk.sql` menyediakan beberapa akun dengan password `123`:

| Username | Peran |
| --- | --- |
| `admin` | Admin |
| `dafa` | Admin |
| `idris` | Pegawai |
| `joko` | Pegawai |

Password akun di atas dicocokkan melalui hash MD5 pada aplikasi. Dump juga memiliki akun `meyrina`, tetapi README ini tidak mencantumkan password-nya karena nilainya tidak dapat dipastikan dari data yang tersedia. Tidak ada akun teknisi pada data awal.

## Struktur Utama

- `index.php`: halaman login.
- `route.php`: pemetaan halaman berdasarkan parameter `id`.
- `koneksi.php`: konfigurasi koneksi database.
- `admin.php`, `pegawai.php`, `teknisi.php`: halaman utama berdasarkan peran.
- `admin/`, `pegawai/`, `teknisi/`: halaman fitur masing-masing peran.
- `layout/`: header, sidebar, dan footer.
- `assets/`: berkas CSS, JavaScript, dan font.
- `helpdesk.sql`: skema dan data awal database.

## Catatan

Aplikasi ini menggunakan MD5 untuk password dan beberapa query database dibangun langsung dari input pengguna. Pola tersebut tidak aman untuk aplikasi yang dipublikasikan. Sebelum digunakan di lingkungan produksi, migrasikan penyimpanan password ke `password_hash()`/`password_verify()` dan gunakan prepared statements.