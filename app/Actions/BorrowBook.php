<?php

namespace App\Actions;

use App\Enums\BorrowingState;
use App\Exceptions\ValidationException;
use App\Http\Requests\BorrowBookRequest;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BorrowBook
{
    private BorrowBookRequest $request;

    public function __construct(BorrowBookRequest $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        // MEMILIH DB::transaction karena seluruh proses peminjaman harus **atomic**.
        // Jika salah satu validasi gagal, seluruh perubahan harus rollback
        // untuk menjaga integritas stok buku dan kuota member.
        DB::transaction(function () {
            // throw_if digunakan untuk memisahkan business validation dari system error
            // Ini menjaga agar exception memiliki kode error yang spesifik dan tetap reusable
            $user = User::find($this->request->user_id);
            throw_if(! $user, ValidationException::class, 'USER_NOT_FOUND');

            $book = Book::find($this->request->book_id);
            throw_if(! $book, ValidationException::class, 'BOOK_NOT_FOUND');

            throw_if($book->stock <= 0, ValidationException::class, 'STOCK_NOT_AVAILABLE');

            throw_if($user->quota <= 0, ValidationException::class, 'QUOTA_EXCEEDED');

            Borrowing::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => now(),
                'state' => BorrowingState::BORROWED,
            ]);

            $book->decrement('stock');
            $user->decrement('quota');
        });
    }
}
