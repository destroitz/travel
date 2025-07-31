Login App (XAMPP) - README

Cara pasang:
1) Ekstrak folder 'login_app' ke C:\xampp\htdocs\
2) Jalankan Apache dari XAMPP Control Panel
3) Buka browser: http://localhost/login_app
4) Login dengan:
   - Username: admin
   - Password: 12345

Struktur:
login_app/
 ├─ config/config.php
 ├─ views/login.php (tidak digunakan - form ada di index.php, bisa ditambah jika mau)
 ├─ views/dashboard.php
 ├─ assets/css/style.css
 ├─ assets/js/script.js
 ├─ users.json
 ├─ index.php
 └─ logout.php

Catatan:
- Saat ini autentikasi membaca data dari users.json.
- Untuk produksi, sebaiknya ganti ke MySQL atau Google Sheets.
- Jangan lupa hapus akun default jika sudah menambah akun baru.
