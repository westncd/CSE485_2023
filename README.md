# CSE485 Project - Music Management System

## Team Members
- Bùi Đức Tùng
- Đào Duy Minh
- Nguyễn Ngọc Bảo Tuấn

## Architecture: MVC Pattern

This project is built using the **Model-View-Controller (MVC)** architectural pattern, ensuring a clean separation of concerns, maintainability, and scalability.

### 1. Models (`app/models`)
Responsible for data management and business logic.
- **Key Files**: 
  - `article.php`: Represents article data and operations.
  - `author.php`: Manages author information.
  - `category.php`: Handles music categories.
- These models handle interaction with the database and data processing.

### 2. Views (`app/views`)
Responsible for the user interface and presentation layer.
- **Public Views**: 
  - `detail.php`: Displays article details.
  - `login.php`: User authentication interface.
- **Admin Views**: Located in `app/views/admin/`, handling the back-office interface for resource management.

### 3. Controllers (`app/controllers`)
Acts as the intermediary between Models and Views. Processes user requests and returns the appropriate response.
- **Key Controllers**: 
    - `article_controller.php`: Manages article operations (CRUD).
    - `author_controller.php`: Manages author data.
    - `category_controller.php`: Manages categories.
    - `admin_home_controller.php`: Controls the admin dashboard.

## Project Structure

```
CSE485_2023/
├── app/
│   ├── controllers/   # Controller logic (Business Logic Layer)
│   ├── models/        # Data models (Data Access Layer)
│   └── views/         # UI Templates (Presentation Layer)
│       └── admin/     # Admin-specific views
├── config/            # Configuration files (DB connection, constants)
├── public/            # Public assets (Images, CSS, JS)
└── README.md          # Project documentation
```
