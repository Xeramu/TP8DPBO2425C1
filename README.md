<< Saya, Umarex Shauma Andromeda, dengan NIM 2400598, mengerjakan TP8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek. Untuk keberkahan-Nya, maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasi >>

1. Design Program


  a.models
  
      folder models isinya class yg nanganin data dan INTERAKSI LANGSUNG sama database.
       
       1. DB.php isinya class buat ngebuka/nutup koneksi database dan jalanin query SQL.
       
       2. Lecturer.php, Course.php, Schedule.php isinya untuk ngelola tabel masing2 (Lecturer, Course, Schedule). Isinya ada fungsi CREATE, READ, UPDATE, DELETE, GetByID.

   
  b. controllers
  
      controllers isinya logika buat ngatur alur code. controller nerima request user (form submit, edit, delete), manggil model untuk ngambil/ngubah data trus ngirim hasilnya ke views.
      LecturerController.php, CourseController.php, ScheduleController.php punya fungsi **index()** buat nampilin data, **add()** buat nambah data, **delete()** buat delete data, **edit()** buat edit data, **GetByID()** buat ngambil data berdasarkan ID.
      
  c. views
  
      views isinya file php Lecturer, Course, Schedule yg ngurusin tampilan sebelum di masukin ke templates. 
      
  d. templates
      templates isinya file html statis yg ada placeholder yg bakal diisi views. html ada navbar, tabel, form, trus ada placeholder yg bakal digantiin sama views.

2. Penjelasan Alur
    
    1. User Melakukan Request
       - membuka halaman Lecturer, Course, atau Schedule
       - menekan tombol Add, Edit, atau Delete
       - mengirimkan form data


    2. Request Masuk ke Controllers
       lewat file utama kayak index.php, course.php, sama schedule.php. file utama akan ngedeteksi request trus diarahin ke controllers yg sesuai.


    3. Controllers Menghubungi Model
       abis ngetahuin tujuan aksi, controllers bakal manggil model untuk berkomunikasi dengan database.


    4. Model Mengembalikan Data ke Controller
       abis query dijalanin, model memberikan hasilnya kembali ke controllers dalam bentuk array.

       
    5. Controller Memproses dan Mengirim Data ke Views
       Controllers mengemas data yang didapat dari model trus dikirim ke views untuk ditampilkan.

       
    6. Views Menampilkan Data ke User
        Views hanya bertugas menampilkan HTML + data yang diberikan controller. Setelah view selesai dirender, hasilnya dikirim ke browser dan ditampilkan ke user.

3. Dokumentasi
   
