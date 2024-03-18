# TUGAS1-PBF Indah Kurniawati S-220102085

## Apa itu CodeIgniter?
CodeIgniter adalah salah satu FreamWork yang ada di PHP yang bersifat Open Source yang menggunakan Metode MVC (Model,Viwe,Controler). Framwork (softwear freamwork) adalah sudatu kerangka kerja yang berisi aturan” sesuai dengan bahasanya, dan ada fungsi” yang reuseability atau di gunakan berulang”
#### **Mengapa Perlu Menggunakan CodeIgniter**
1.	Small footprint = Ci adalah  freamwork yang ukuran nya kecil 
2.	Perfomance yang baik
3.	Hampir ”zero configuration” = hanya dengan menginstall saja sudah siap di gunakan tidak banyak melakukan konfigurasi
4.	Tidak harus menggunakan command line
5.	Tidak harus mengikuti aturan coding yang ketat 
6.	Tidak harus menggunakan tempalte engine
7.	Dokumentasi yang jelas
8.	Menggunakan mvc
## Installation
#### Syarat Menginstall CodeIgniter
Diperlukan PHP minimal versi 7.4 atau lebih baru.
#### **Installation Composer**
   1.Cek apakah ada composer atau tidak dengan perintah :
```shell
$ composer -v
```
<img width="620" alt="Screenshot 2024-03-18 101440" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/0f2fa79c-8580-42cc-aba9-e2f97d499dfe">

2. Buka folder root yang akan digunakan untuk menyimpan Folder CodeIgniter, lalu buka CMD lalu ketik
    <img width="311" alt="Screenshot 2024-03-18 095234" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/8343a220-8d85-4c85-8fda-5227b7a06f77">
    
    atau bisa klik kanan lalu buka folder tersebut lewat Terminal. dan Ketikkan :
```shell
$ composer create-project codeigniter4/appstarter nama-project
```
perintah di atas memerlukan koneksi internet pada saat install, maka dari itu cepat atau lambat nya proses install di pengaruih dengan koneksi internet

3. Jalankan server
```shell
$ cd nama-root
$ php spark serve
```
4. Pada saat dijalankan maka tampilannya seperti
   ![image](https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/a0d04955-619c-4d24-a01e-037b5802625f)

#### **Installation Manual**
1. Install Manual CodeIgniter4 melalui web resminya, dan hasil downloadnya berbentuk zip 
[CodeIgniter 4.](https://www.codeigniter.com/download)
2. Lalu Ekstrak folder CodeIgniter yang sudah di download ke direktori root web server pada penyimpanan, Jika menggunakan laragon maka exctract pada C:\laragon\www
4. Jalankan server dengan masuk ke dalam root project yang terdapat folder CI → code editor (Visual Studio Code) → Terminal atau masuk ke Command Prompt → ketik :
```shell
$ cd nama-root
$ php spark serve
```
5. Perintah diatas akan menjalankan Codeigniter 4 di port 8080. Proses running ini akan terus berjalan sampai jika ingin memberhentikan maka menekan tombol CTRL+C,
Untuk melihat hasilnya, silahkan buka browser dan arahkan ke http://localhost:8080/.
![image](https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/a0d04955-619c-4d24-a01e-037b5802625f)

#### **Konfigurasi Awal**
konfigurasi bisa dilakukan dengan **app/Config/App.php** atau menggunakan **.env**
1. Menetapkan base konfigurasi $baseURL (App.php) atau app.baseURL (.env)
   ```php
    public string $baseURL = 'http://localhost:8080/'; //Pastikan untuk menambahkan slash(/) di akhir jika menggunakan (App.php)
    app.baseURL = 'http://localhost/' //Jika menggunakan (.env)
   ```
2. Menentukan halaman index
   Jika tidak ingin menyertakan **index.php** di URI setel `$indexPage`ke `''` pada **`app/Config/App.php`**.
   ```php
   pada awalnya seperti ini :
   public string $indexPage = 'index.php';
   di ubah menjadi :
   public string $indexPage = '';
   ```
#### **Konfigurasi Data Base**
1. Mengatur ke Mode Development
   setel `CI_ENVIRONMENT`ke `development` dalam file **.env** untuk memanfaatkan alat debugging.
   ```php
   # CI_ENVIRONMENT = production -> # CI_ENVIRONMENT = development
   ```
## Bangun Aplikasi Pertama
#### **Halaman Erorr**
Buka **app/Controllers/Home.php** dan ubah beberapa baris untuk menghasilkan kesalahan (menghapus titik koma atau kurung kurawal).
<img width="926" alt="image" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/19019677-0afb-49a8-93ea-ebc1b8bb68f5">
#### **Static Page**
#### **Setting Routing Rules**
1. Buka File routes yang ada di **app/Config/Routes.php.**, Lalu menambahkan baris berikut, untuk meyambungkan dengan Pages.php yang di Controllers
```php
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Tambahkan Baris Berikut
use App\Controllers\Pages;
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
#### **Create Pages Controller**
2. Buat file Pages controller di app/Controllers/Pages.php dengan kode berikut :
```php
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```
#### **Create Views**
3. Buat Views
Tambahkan folder baru **templates** dan file **header.php** didalamnya, pada folder **app/Views.**
Lalu isikan, kode berikut pada header.php :
```php
<!doctype html>
<html>

<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>

    <h1><?= esc($title) ?></h1>
    <!-- esc fungsi global yang disediakan oleh CodeIgniter untuk membantu mencegah serangan XSS -->
```
Tambahkan **file** footer di **app/Views/templates**, Lalu tambahkan Kode berikut :
```php
<footer>ini adalah footer</footer>
<em>&copy; 2024</em>
</body>

</html>
```
#### **Adding Logic to the Controller**
4. Tambahkan folder **pages** di **app/Views/** lalu tambahkan dua file bernama **home.php** dan **about.php** pada **app/Views/pages/**.
Pada **home.php** tambahkan kode berikut :
```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <h1>Selamat Datang Di Home Page</h1>
</body>

</html>
```
Pada **about.php** tambahkan kode berikut :
```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>

<body>
    <h1>Tetang saya</h1>
    <p>Ini adalah halaman tentang situs web.</p>
    <p>Nama saya Indah Kurniawati Salongan</p>
</body>

</html>
```
**Pada file app/controllers/Pages.php** 
Yang sebelumnya seperti ini :
```php
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
```
Lengkapi menjadi seperti ini :
```php
<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
		//untuk menampilkan index() welcome_message
    public function index()
    {
        // Menampilkan halaman utama (welcome_message.php)
        return view('welcome_message');
    }

    public function view($page = 'home')
    {

        // Mengecek apakah halaman yang diminta ada
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Jika tidak ada, lempar PageNotFoundException
            throw new PageNotFoundException($page);
        }

        // Mengatur judul halaman berdasarkan nama halaman
        $data['title'] = ucfirst($page); // Kapitalkan huruf pertama

        // Memuat template header, halaman statis (home, about), dan footer
        return view('templates/header', $data)
            . view('pages/' . $page, $data)
            . view('templates/footer');
    }
}
```
**Running the app** 
5. Masuk ke URL : http://localhost:8080/home 
tampilan yang di hasilkan :

![image](https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/1babf438-25ec-46fd-b530-b7feb503aab2)

6. Masuk ke URL : http://localhost:8080/about
tampilannya :

![image](https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/c88bc0b8-2217-4ccc-98d8-af6e5aefc04c)

#### **News Section**
1. Buat data base ci4tutorial
<img width="446" alt="image" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/acd6d8cb-cdc5-48c1-8d4b-046f0f34df03">
Lalu create
2. Membuat table dengan perintah SQL

```php
CREATE TABLE news (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    slug VARCHAR(128) NOT NULL,
    body TEXT NOT NULL,
    PRIMARY KEY (id),
    UNIQUE slug (slug)
);
```
3. Insert data ke dalam table
```php
INSERT INTO news (title, slug , body) VALUES 
('Pembukaan Cafe!!', 'Pembukaan-Cafe-YOLIS', 'Cafe ini di buka pada tanggal 12/3/2024 ,Di kota Jakarta, cafe ini memiliki banyak pengunjung pada saat Grand Opening di jakarta kemarin.'),
('Konser Music di GBK!', 'Konser-Penyanyi-Terkenal-The-1975', 'Konser ini mendatangkan audience yang cukup banyak ke GBK untuk menonton band kesayangannya yaitu The 1975 .'),
('Buku BestSeller!', 'Buku-buku-BestSeller-di-indonesia-tahun-2023', 'Buku-buku BestSeller itu antara lain Laut Bercerita, Filosofi Teras, Automic Habbit .');
```
4. Menghubungkan ke database
Hubungkan ke Database pada file **.env** hilangkan comment (#) dan ganti database yang sesuai
```php
 database.default.hostname = localhost
 database.default.database = ci4tutorial
 database.default.username = root
 database.default.password = 
 database.default.DBDriver = MySQLi
 database.default.DBPrefix =
 database.default.port = 3306
```
5. Membuat Model News Buka direktori **app/Models** setelah itu buat file baru bernama **NewsModel.php** dan tambahkan kode berikut ini :
```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
}
```
6. Menambahkan Method **NewsModel::getNews()** pada **app/Models**
dari :
```php
    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
```
menjadi seperti :

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

// Kelas NewsModel mewarisi kelas Model(defult) dari CodeIgniter
class NewsModel extends Model
{
    // Variabel $table digunakan untuk mendefinisikan tabel yang digunakan model
    protected $table = 'news';

    // Variabel $allowedFields mendefinisikan kolom apa saja yang bisa diisi dalam tabel
    // Ini adalah bagian dari fitur mass assignment protection di CodeIgniter
    //Pembahasan poin 7 pada Create News Items (Bangun aplikasi pertama Anda)
    protected $allowedFields = ['title', 'slug', 'body'];
    //...

    // Fungsi getNews digunakan untuk mengambil data berita
    // Jika parameter $slug bernilai false, maka fungsi akan mengembalikan semua berita
    // Jika parameter $slug memiliki nilai, maka fungsi akan mencari berita dengan deskripsi yang sesuai
    public function getNews($slug= false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
```
7. Menambahkan Routing Rules
Ubah file **app/Config/Routes.php** , sehingga terlihat seperti berikut:
```php
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;
use App\Controllers\News; // Tambah baris ini

$routes->get('news', [News::class, 'index']);           // Tambah baris ini
$routes->get('news/(:segment)', [News::class, 'show']); // Tambah baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
8. Menambahkan Create News Controller
Tambahkan News Controller pada **app/Controllers/News.php**,Lalu tambahkan kode berikut :
```php
<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews();
    }

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);
    }
}
```
9. Lengkapi Method News::index() yang ada pada **app/Controllers/News.php**
```php
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException; //baru

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'Berita',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }
    //..
    public function show($description= null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($description);
    }
}
```
10. Membuat tampilan untuk **app/Views/news/index.php**
```php
<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
```
11. Melengkapi **Method News::show()** yang ada pada **app/controllers/News.php**
```php
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // ...

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}
```
12. Membuat tampilan untuk berita dengan membuat folde **news** pada **app/views** lalu membuat file **app/Views/news/view.php**, setelah itu tuliskan kode berikut :
```php
<h2><?= esc($news['title']) ?></h2>
<p><?= esc($news['body']) ?></p>
```
13. Mengakses tampilan berita yang dibuat dengan mengetikan localhost:8080/news
Maka akan muncul tampilan seperti ini :
![image](https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/edbcc824-604f-40a1-9ee8-726af95d3da8)

## Create News Items
#### **Aktifkan Filter CSRF**
Buka file **app/Config/Filters.php** dan perbarui $methods properti seperti berikut:
```php
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    // ... ini

    public $methods = [
        'post' => ['csrf'],
    ];

    // ...
}
```
#### **Menambahkan Routing Rules**
Menambahkan routing rule tambahan ke file **app/Config/Routes.php** .
```php
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;
use App\Controllers\News; // Tambah baris ini

$routes->get('news', [News::class, 'index']);           // Tambah baris ini

$routes->get('news/new', [News::class, 'new']); // Tambah baris ini (poin create News items)
$routes->post('news', [News::class, 'create']); // Tambah baris ini (poin create News items)

$routes->get('news/(:segment)', [News::class, 'show']); // Tambah baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
Ini mengkonfigurasi filter CSRF untuk diaktifkan untuk semua permintaan POST 
#### **Membuat Formulir **
buat file baru **create.php** pada folder **app/Views/news**  lalu pada **app/Views/news/create.php**, Tambahkan kode berikut :
```php
<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/news" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>
```
### **Membuat News Controller**
**Tambahkan **`News::new()`** pada `app/controllers/News.php`untuk Menampilkan Formulir.Pertama, buatlah metode untuk menampilkan form HTML yang telah buat.**

```php
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // ...
    //Tambahkan mulai dari baris bawah ini
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/create')
            . view('templates/footer');
    }
}
```
**Tambahkan News::create() pada app/controllers/News.php untuk menambahkan Items Berita**
```php
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // ...
		// Dari Poin 5 pembahasan Create News Items (Bangun aplikasi pertama Anda)
    public function create()
    {
        helper('form'); // Memanggil helper form

        $data = $this->request->getPost(['title', 'body']); // Mengambil data dari form

        // Mengecek apakah data yang dikirimkan memenuhi aturan validasi.
        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]', // Judul harus ada, maksimal 255 karakter, minimal 3 karakter
            'body'  => 'required|max_length[5000]|min_length[10]', // Isi berita harus ada, maksimal 5000 karakter, minimal 10 karakter
        ])) {
            // Jika validasi gagal, kembali ke form.
            return $this->new();
        }

        // Mengambil data yang telah divalidasi.
        $post = $this->validator->getValidated();

        $model = model(NewsModel::class); // Membuat instance dari NewsModel

        // Menyimpan data ke dalam database
        $model->save([
            'title' => $post['title'], // Menyimpan judul
            'description'  => url_title($post['title'], '-', true), // Membuat deskripsi dari judul
            'body'  => $post['body'], // Menyimpan isi berita
        ]);

        // Menampilkan halaman sukses setelah data berhasil disimpan
        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }
    //...
}
```
### **Buat tampilan di app/Views/news/success.php dan tulis pesan sukses.**
```php
<p>News item created successfully.</p>
```
### **Edit NewsModel → app/Models/NewsModel.php untuk memberikannya daftar bidang yang dapat diperbarui di $allowedFields properti.**
```php
<?php

namespace App\Models;

use CodeIgniter\Model;

// Kelas NewsModel mewarisi kelas Model(defult) dari CodeIgniter
class NewsModel extends Model
{
    // Variabel $table digunakan untuk mendefinisikan tabel yang digunakan model
    protected $table = 'news';

    // Variabel $allowedFields mendefinisikan kolom apa saja yang bisa diisi dalam tabel
    // Ini adalah bagian dari fitur mass assignment protection di CodeIgniter
    //Pembahasan poin 7 pada Create News Items (Bangun aplikasi pertama Anda)
    protected $allowedFields = ['title', 'slug', 'body'];
    //...

    // Fungsi getNews digunakan untuk mengambil data berita
    // Jika parameter $slug bernilai false, maka fungsi akan mengembalikan semua berita
    // Jika parameter $slug memiliki nilai, maka fungsi akan mencari berita dengan deskripsi yang sesuai
    public function getNews($slug= false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
```
### **Membuat item berita membuka pada alamat localhost:8080/news/new**
<img width="328" alt="image" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/1117ec77-fd0e-4fdb-9ece-25c11c55201b">
<img width="333" alt="image" src="https://github.com/indahkurniawati19/TUGAS1-PBF/assets/134476013/0c549907-e474-4fcb-87cb-1d19ec14d660">

## CodeIgniter4 Overview
### **STRUKTUR APLIKASI**
Struktur folder pada Ci :
• Folder App : adalah folder inti pada ci 
• Folder Public : tempat menyimpan asset,  terdapat htacsess digunakan untuk membuat preaty url  agar url bersih tanpa ada nama file nya, menggunakan fiture modrewrite
Ada file favicon untuk membuat icon disebelah tab pada website. File index.php dimisalkan  file boostrap, atau dengan kata lain suatu file yang membawa file lainnya, atau ci berwal dari file ini, File robots.txt biasanya digunakan untuk sherce engin. 
• Folder Test : digunakan ketika aplikasi kita menjalankan testing 
• Folder Vendor : Folder tempat untuk menyimpan dependency pada aplikasi yang dibuat, dependency tersebut di kelola pada file composer.json
•Folder Writeadble : Tempat untuk menyimpan file sementara, file log, dan file cache yang dapat ditulis oleh aplikasi

**app/**
    Config/         Menyimpan file konfigurasi
    Controllers/    menentukan alur program
    Database/       Menyimpan file database migrasi dan seed basis data
    Filters/        Menyimpan kelas filter yang dapat dijalankan sebelum dan setelah controller
    Helpers/        Helpers menyimpan kumpulan fungsi mandiri
    Language/       Dukungan multi bahasa membaca string bahasa dari sini
    Libraries/      Kelas-kelas yang berguna yang tidak cocok dalam kategori lainnya
    Models/         Models bekerja dengan database untuk merepresentasikan entitas bisnis
    ThirdParty/     libary pihak ke 3 yang di gunakan di aplikasi 
    Views/          Views tempat untuk interface yang di tampilkan ke pengguna
### **MVC**
•Model
Model merupakan bagian penanganan yang berhubungan atau manipulasi data dengan database, misal mengambil data dari database, dan proses crud atau intruksi yang berhubungan dengan database diletakan di dalam model.
•View
View merupakan bagian penanganan interface atau antarmuka web, yang muncul kepada user, dengan memisahkan controller dengan model dapat memudahkan programmer untuk melakukan suatu pengembangan web pada tampilan halaman suatu website.
•Controller
Controller merupakan bagian instruksi aksi yang menghubungkan model dan view, jadi controller ini kumpulan instruksi aksi yang berfungsi sebagai jembatan dari model dan view.
### **Auto Loading**
**Memeriksa konfigurasi Namespace**
```php
php spark namespaces
```
### **Service**
Berada pada direktori **App\Config\Service.php**. Berfungsi untuk menyatukan instance dari kelas yang digunakan secara global, seperti timer, dan logger.
### **Factories**
Factories atau Pabrik adalah alat yang memungkinkan Anda membuat objek atau instance dari kelas-kelas tertentu secara dinamis
**Menghapus file cache**
```php
php spark cache:clear
```

