# TP8DPBO2025C2

# JANJI
Saya Muhammad Igin Adigholib dengan NIM 2301125 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
![Desain Diagram](https://github.com/user-attachments/assets/eb9f4fed-7d29-4685-a9bf-91366d584753)

# Alur Program
Program ini menggunakan arsitektur MVC (Model-View-Controller) untuk mengelola data mahasiswa, mata kuliah, dan pendaftaran. File index.php menjadi entry point utama yang menentukan halaman berdasarkan parameter view. Controller seperti StudentController, CourseController, dan EnrollmentController bertugas mengelola logika aplikasi, seperti mengambil data dari model (Student, Course, Enrollment) yang berinteraksi langsung dengan database melalui connection.php.

Data yang diambil dari model kemudian diteruskan ke file view, seperti index.php, untuk ditampilkan kepada pengguna. View juga menyediakan form atau tombol untuk menambah, mengedit, atau menghapus data, yang akan diproses kembali oleh controller.

Relasi antar tabel di database diatur dengan foreign key, di mana tabel enrollments terhubung ke tabel students dan courses. Alur ini memastikan data terorganisir dengan baik dan mudah dikelola. Pendekatan ini membuat program modular, sehingga mudah dikembangkan atau dimodifikasi.

# Dokumentasi
![Screen Recording 2025-05-03 232124](https://github.com/user-attachments/assets/40aeb1fb-46c1-4ea8-89d4-093f5cd56452)


