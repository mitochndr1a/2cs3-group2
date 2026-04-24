<?php
 
namespace Database\Seeders;
 
use App\Models\ApiKey;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Categories (15 fixed) ────────────────────────────
        $categories = [
            ['name' => 'Fiction',         'description' => 'Imaginative storytelling and narratives'],
            ['name' => 'Non-Fiction',      'description' => 'Factual and real-world topics'],
            ['name' => 'Science',          'description' => 'Natural sciences, physics, biology, chemistry'],
            ['name' => 'Technology',       'description' => 'Computing, software, and engineering'],
            ['name' => 'History',          'description' => 'Historical accounts and analysis'],
            ['name' => 'Philosophy',       'description' => 'Philosophical thought and ethics'],
            ['name' => 'Self-Help',        'description' => 'Personal development and motivation'],
            ['name' => 'Biography',        'description' => 'Life stories of real people'],
            ['name' => 'Mystery',          'description' => 'Crime fiction and thrillers'],
            ['name' => 'Romance',          'description' => 'Love stories and relationships'],
            ['name' => 'Horror',           'description' => 'Fear-inducing stories and gothic fiction'],
            ['name' => 'Science Fiction',  'description' => 'Futuristic and speculative fiction'],
            ['name' => 'Fantasy',          'description' => 'Magic, mythical creatures, and epic worlds'],
            ['name' => 'Classic',          'description' => 'Timeless works of literature'],
            ['name' => 'Poetry',           'description' => 'Verse and lyrical writing'],
        ];
 
        foreach ($categories as $cat) {
            Category::create($cat);
        }
 
        // ── Real authors (kept from original system) ─────────
        $realAuthors = [
            ['first_name' => 'George',  'last_name' => 'Orwell',           'bio' => 'English novelist and essayist.',                           'email' => 'gorwell@example.com'],
            ['first_name' => 'J.K.',    'last_name' => 'Rowling',          'bio' => 'British author of the Harry Potter series.',               'email' => 'jkrowling@example.com'],
            ['first_name' => 'Stephen', 'last_name' => 'Hawking',          'bio' => 'Theoretical physicist and cosmologist.',                   'email' => 'shawking@example.com'],
            ['first_name' => 'Jane',    'last_name' => 'Austen',           'bio' => 'English novelist of the Regency era.',                    'email' => 'jausten@example.com'],
            ['first_name' => 'Suzanne', 'last_name' => 'Collins',          'bio' => 'American author of The Hunger Games trilogy.',             'email' => 'scollins@example.com'],
            ['first_name' => 'Antoine', 'last_name' => 'de Saint-Exupery', 'bio' => 'French writer and aviator, author of The Little Prince.', 'email' => 'asaintexupery@example.com'],
            ['first_name' => 'Victor',  'last_name' => 'Hugo',             'bio' => 'French poet, novelist, and dramatist.',                   'email' => 'vhugo@example.com'],
        ];
 
        foreach ($realAuthors as $author) {
            Author::create($author);
        }
 
        // ── Real books (kept from original system) ───────────
        $realBooks = [
            ['title' => '1984',                                   'isbn' => '978-0451524935', 'author_id' => 1, 'category_id' => 1,  'published_year' => 1949, 'description' => 'Dystopian social science fiction novel.',          'copies' => 5],
            ['title' => 'Animal Farm',                            'isbn' => '978-0451526342', 'author_id' => 1, 'category_id' => 1,  'published_year' => 1945, 'description' => 'Allegorical novella reflecting on Soviet Russia.',  'copies' => 3],
            ['title' => 'Harry Potter and the Sorcerer Stone',    'isbn' => '978-0439708180', 'author_id' => 2, 'category_id' => 1,  'published_year' => 1997, 'description' => 'First book in the Harry Potter series.',           'copies' => 8],
            ['title' => 'Harry Potter and the Chamber of Secrets','isbn' => '978-0439064873', 'author_id' => 2, 'category_id' => 1,  'published_year' => 1998, 'description' => 'Second book in the Harry Potter series.',          'copies' => 6],
            ['title' => 'A Brief History of Time',                'isbn' => '978-0553380163', 'author_id' => 3, 'category_id' => 3,  'published_year' => 1988, 'description' => 'Introduction to cosmology for general readers.',   'copies' => 4],
            ['title' => 'The Universe in a Nutshell',             'isbn' => '978-0553802023', 'author_id' => 3, 'category_id' => 3,  'published_year' => 2001, 'description' => 'Sequel to A Brief History of Time.',               'copies' => 2],
            ['title' => 'Pride and Prejudice',                    'isbn' => '978-0141439518', 'author_id' => 4, 'category_id' => 14, 'published_year' => 1813, 'description' => 'Romantic novel of manners.',                       'copies' => 5],
            ['title' => 'Sense and Sensibility',                  'isbn' => '978-0141439662', 'author_id' => 4, 'category_id' => 14, 'published_year' => 1811, 'description' => 'Novel about the Dashwood sisters.',                'copies' => 4],
            ['title' => 'The Hunger Games',                       'isbn' => '978-0439023481', 'author_id' => 5, 'category_id' => 1,  'published_year' => 2008, 'description' => 'First book in The Hunger Games trilogy.',          'copies' => 7],
            ['title' => 'Catching Fire',                          'isbn' => '978-0439023498', 'author_id' => 5, 'category_id' => 1,  'published_year' => 2009, 'description' => 'Second book in The Hunger Games trilogy.',         'copies' => 5],
            ['title' => 'Mockingjay',                             'isbn' => '978-0439023511', 'author_id' => 5, 'category_id' => 1,  'published_year' => 2010, 'description' => 'Third book in The Hunger Games trilogy.',          'copies' => 4],
            ['title' => 'The Little Prince',                      'isbn' => '978-0156012195', 'author_id' => 6, 'category_id' => 1,  'published_year' => 1943, 'description' => 'A poetic tale about a young prince who travels.',  'copies' => 6],
            ['title' => 'Les Miserables',                         'isbn' => '978-0451419439', 'author_id' => 7, 'category_id' => 14, 'published_year' => 1862, 'description' => 'Epic tale of justice, love, and redemption.',      'copies' => 5],
            ['title' => 'The Hunchback of Notre-Dame',            'isbn' => '978-0140443530', 'author_id' => 7, 'category_id' => 14, 'published_year' => 1831, 'description' => 'Story of Quasimodo and Esmeralda in Paris.',       'copies' => 3],
        ];
 
        foreach ($realBooks as $book) {
            Book::create($book);
        }
 
        // ── Fake authors to reach 200 total ──────────────────
        Author::factory(193)->create();
 
        // ── Fake books to reach 1,000+ total ─────────────────
        Book::factory(986)->create();
 
        ApiKey::create([
            'name'      => 'Default Group Key',
            'key'       => env('DEFAULT_API_KEY', 'lib_fallback_key'),
            'is_active' => true,
        ]);
    
        $this->command->info('✅ Seeded: 15 categories, 200 authors, 1000 books, 1 API key.');
        $this->command->info('🔑 Default API Key: lib_library_management_group_key_2024');
    }
}
