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