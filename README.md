# penggunaan git


download project pertama kali 

    git clone <url_repository>

install composer saat pertama kali download project

    composer install

download perubahan baru

    git pull

perintah untuk jalankan server

    php artisan serve

perintah untuk migrasi database sekaligus jalankan seeder (membuat database dan mengisi data ke dalam database)

    php artisan migrate:fresh --seed

menambahkan perubahan baru ke git local

    git add .


membuat komit baru

    git commit -m "keterangan"


mengirim perubahan dari local ke remote repository

    git push