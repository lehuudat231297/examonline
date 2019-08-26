<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $data = [
            [
                'tai_khoan' => 'admin1',
                'mat_khau' => bcrypt('12345'),
                'ho_ten' => 'Lê Hữu Đạt',
                'ngay_sinh' => '1998-01-02',
                'gioi_tinh' => '0',
                'email' => 'lehuudat231297@gmail.com',
                'so_dien_thoai' => '0949147381',
                'dia_chi' => 'Hà Nội',
            ],
            [
                'tai_khoan' => 'admin2',
                'mat_khau' => bcrypt('12345'),
                'ho_ten' => 'Nguyễn Đình Quang',
                'ngay_sinh' => '1998-05-05',
                'gioi_tinh' => '0',
                'email' => 'quangbombom@gmail.com',
                'so_dien_thoai' => '0123456789',
                'dia_chi' => 'Hà Nội',
            ],
            [
                'tai_khoan' => 'admin3',
                'mat_khau' => bcrypt('12345'),
                'ho_ten' => 'Lê Nguyễn Quang Linh',
                'ngay_sinh' => '1998-05-05',
                'gioi_tinh' => '0',
                'email' => 'linhxoanxoan@gmail.com',
                'so_dien_thoai' => '0123456789',
                'dia_chi' => 'Hà Nội',
            ],
        ];
        DB::table('quantris')->insert($data);
    }
}
