<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['name' => 'Harry Potter and the Sorcerer\'s Stone', 'quantity' => 10, 'stock' => 10],
            ['name' => 'Lord of the Rings: The Fellowship of the Ring', 'quantity' => 5, 'stock' => 5],
            ['name' => 'Clean Code', 'quantity' => 7, 'stock' => 0],
            ['name' => 'The Pragmatic Programmer', 'quantity' => 8, 'stock' => 8],
            ['name' => 'Design Patterns', 'quantity' => 6, 'stock' => 6],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
