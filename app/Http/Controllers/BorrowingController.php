<?php

namespace App\Http\Controllers;

use App\Actions\BorrowBook;
use App\Http\Requests\BorrowBookRequest;

class BorrowingController extends Controller
{
    public function borrow(BorrowBookRequest $request)
    {
        try {
            // DISPATCH_SYNC ACTION
            // Menggunakan dispatch_sync agar action dijalankan **langsung dalam thread request yang sama**. 
            // Ini penting karena semua proses transaction berlaku instan
            // dan rollback otomatis jika gagal. selain itu juga maintenanceable dan scalable principe, 
            // agar ketika ada bug atau error di thread request yang sama, tidak mempengaruhi thread request selanjutnya
            dispatch_sync(new BorrowBook($request));

            return $this->responseJson(
                key: 'SUCCESS_RESPONSE',
            );
        } catch (\Exception $e) {
            return $this->responseJson(
                key: $e->getMessage()
            );
        }
    }
}
