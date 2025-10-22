<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Ini menentukan guard dan pengaturan reset password default.
    | Kamu bisa ubah sesuai kebutuhan, tapi biasanya ini sudah cukup.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Di sini kita mendefinisikan setiap guard autentikasi aplikasi.
    | Laravel menyediakan guard 'web' (session) dan kita tambahkan
    | guard 'api' untuk JWT agar bisa digunakan pada auth:api middleware.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'jwt', // 🟩 ubah ke jwt agar support tymon/jwt-auth
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Provider menjelaskan bagaimana data user diambil dari database.
    | Di sini kita pakai model Eloquent: App\Models\User.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Jika ingin pakai query langsung ke DB (tidak direkomendasikan)
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Konfigurasi reset password untuk pengguna. Token reset hanya valid
    | dalam jangka waktu tertentu (default: 60 menit).
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Durasi waktu (dalam detik) sebelum konfirmasi password kedaluwarsa.
    | Default: 10800 detik (3 jam).
    |
    */

    'password_timeout' => 10800,

];
