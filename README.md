# README.md - CSE485 Project - Music Management System (Laravel)

## Team Members
- Bùi Đức Tùng
- Đào Duy Minh
- Nguyễn Ngọc Bảo Tuấn

## Architecture: Laravel MVC Framework

This project has been migrated from vanilla PHP MVC to **Laravel Framework**, providing better structure, security, and maintainability.

### Technology Stack
- **Framework**: Laravel 13.x
- **Language**: PHP 8.5
- **Database**: MySQL (database: `btth01_cse485`)
- **Frontend**: Bootstrap 5.3, Font Awesome 6.3
- **Template Engine**: Blade

### 1. Models (`app/Models`)
Eloquent ORM models with relationships.
- **BaiViet.php**: Bài viết (articles) - belongsTo TacGia, TheLoai
- **TacGia.php**: Tác giả (authors) - hasMany BaiViet
- **TheLoai.php**: Thể loại (categories) - hasMany BaiViet

### 2. Views (`resources/views`)
Blade template views with layout inheritance.
- **layouts/app.blade.php**: Public layout
- **layouts/admin.blade.php**: Admin layout
- **home.blade.php**: Homepage with carousel
- **detail.blade.php**: Article detail
- **auth/login.blade.php**: Login page
- **admin/**: Dashboard, Categories, Authors, Articles CRUD views

### 3. Controllers (`app/Http/Controllers`)
- **HomeController**: Public homepage
- **ArticleController**: Article detail view
- **AuthController**: Login/Logout
- **Admin/DashboardController**: Admin dashboard
- **Admin/CategoryController**: Category CRUD
- **Admin/AuthorController**: Author CRUD
- **Admin/ArticleController**: Article CRUD

### 4. Routes (`routes/web.php`)
- Public: `/`, `/detail/{song}`, `/login`
- Admin (protected): `/admin/*`

## Project Structure

```
CSE485_2023/
├── app/
│   ├── Http/Controllers/      # Controllers
│   │   ├── Admin/             # Admin CRUD controllers
│   │   ├── HomeController.php
│   │   ├── ArticleController.php
│   │   └── AuthController.php
│   └── Models/                # Eloquent Models
│       ├── BaiViet.php
│       ├── TacGia.php
│       └── TheLoai.php
├── config/                    # Laravel configuration
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── public/                    # Public assets (images, CSS)
├── resources/views/           # Blade templates
│   ├── layouts/               # Layout templates
│   ├── admin/                 # Admin views
│   └── auth/                  # Auth views
├── routes/web.php             # Route definitions
├── .env                       # Environment configuration
└── README.md
```

## Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL

### Installation
```bash
# Install dependencies
composer install

# Configure database in .env
DB_CONNECTION=mysql
DB_DATABASE=btth01_cse485
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Seed default users
php artisan db:seed

# Start development server
php artisan serve
```

### Default Accounts
| Username | Password  | Role  |
|----------|-----------|-------|
| admin    | admin123  | Admin |
| user     | user123   | User  |

Access admin panel at: `http://localhost:8000/admin`
