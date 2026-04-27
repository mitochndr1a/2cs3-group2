# Library Management API

Built with Laravel and PostgreSQL.

---

## Setup

1. Install dependencies
```bash
composer install
```

2. Copy and configure environment
```bash
cp .env.example .env
php artisan key:generate
```

3. Update `.env` with your database credentials
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library_db
DB_USERNAME=postgres
DB_PASSWORD=your_password
DEFAULT_API_KEY=lib_library_management_group_key_2024
```

4. Run migrations and seed
```bash
php artisan migrate
php artisan db:seed
```

5. Start the server
```bash
php artisan serve
```

---

## Authentication

All endpoints require an API key passed as a header:
```
X-API-KEY: your_api_key
```

To generate a key:
```
POST /api/auth/generate
Body: { "name": "Postman" }
```

Default key after seeding:
```
lib_library_management_group_key_2024
```

---

## Endpoints

### Books
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/books` | List all books |
| GET | `/api/books/{id}` | Get a book |
| POST | `/api/books` | Create a book |
| PUT | `/api/books/{id}` | Update a book |
| DELETE | `/api/books/{id}` | Delete a book |

### Authors
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/authors` | List all authors |
| GET | `/api/authors/{id}` | Get an author |
| GET | `/api/authors/{id}/books` | Get author with their books |
| POST | `/api/authors` | Create an author |
| PUT | `/api/authors/{id}` | Update an author |
| DELETE | `/api/authors/{id}` | Delete an author |

### Categories
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/categories` | List all categories |
| GET | `/api/categories/{id}` | Get a category |
| GET | `/api/categories/{id}/books` | Get category with its books |
| POST | `/api/categories` | Create a category |
| PUT | `/api/categories/{id}` | Update a category |
| DELETE | `/api/categories/{id}` | Delete a category |

### Analytics
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/analytics` | All analytics |
| GET | `/api/analytics/total-books` | Total number of books |
| GET | `/api/analytics/books-per-category` | Books per category |
| GET | `/api/analytics/top-author` | Author with most books |
| GET | `/api/analytics/authors-ranking` | Authors ranked by book count |

### API Keys
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/auth/generate` | Generate a new key |
| GET | `/api/auth/keys` | List all keys |
| DELETE | `/api/auth/keys/{id}` | Revoke a key |