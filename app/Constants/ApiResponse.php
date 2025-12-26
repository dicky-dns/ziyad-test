<?php

namespace App\Constants;

class ApiResponse
{
    public const RESPONSES = [
        'SUCCESS_RESPONSE' => [
            'status' => 200,
            'code' => 'ZYD-SUC-200',
            'message' => 'Berhasil Menambah Data',
        ],
        'BOOK_NOT_FOUND' => [
            'status' => 400,
            'code' => 'ZYD-ERR-001',
            'message' => 'Buku Tidak Ditemukan',
        ],
        'USER_NOT_FOUND' => [
            'status' => 400,
            'code' => 'ZYD-ERR-002',
            'message' => 'User Tidak Ditemukan',
        ],
        'QUOTA_EXCEEDED' => [
            'status' => 400,
            'code' => 'ZYD-ERR-003',
            'message' => 'Kuota Pinjam Sudah Penuh',
        ],
        'STOCK_NOT_AVAILABLE' => [
            'status' => 400,
            'code' => 'ZYD-ERR-004',
            'message' => 'Stock Buku Sudah Habis',
        ],
    ];

    public static function get(string $key): array
    {
        return self::RESPONSES[$key] ?? [
            'status' => 500,
            'code' => 'ZYD-ERR-999',
            'message' => 'Unknown error',
        ];
    }
}
