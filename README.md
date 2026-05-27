# Product Management & Transaction System

A robust web application built with **CodeIgniter 4** for managing products, user authentication, and transaction tracking. This system provides a complete product lifecycle management solution with secure user authentication and role-based access control.

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [API Routes](#api-routes)
- [Database Schema](#database-schema)
- [Contributing](#contributing)
- [License](#license)

---

## 🎯 Overview

This application is a comprehensive product and transaction management system designed for small to medium-sized businesses. It provides features for user management, product inventory control, and transaction tracking with a clean, intuitive user interface powered by the NiceAdmin template.

---

## ✨ Features

### Authentication & Authorization

- User login/logout functionality
- Session-based authentication
- Password hashing with bcrypt
- Role-based access control (RBAC)
- Protected routes with authentication filters

### Product Management

- Create, Read, Update, Delete (CRUD) operations
- Product image upload and storage
- Product pricing and inventory tracking
- Real-time product listing

### Transaction Management

- Transaction recording and tracking
- Transaction history viewing
- User transaction overview

### User Interface

- Responsive dashboard with NiceAdmin template
- Clean and modern UI components
- Chart and visualization support
- User-friendly forms and layouts

---

## 🛠 Tech Stack

| Layer                 | Technology                   |
| --------------------- | ---------------------------- |
| **Backend Framework** | CodeIgniter 4                |
| **Language**          | PHP 8.2+                     |
| **Database**          | MySQL/MariaDB                |
| **Frontend Template** | NiceAdmin Bootstrap Template |
| **Package Manager**   | Composer                     |
| **Testing**           | PHPUnit                      |

---

## 🖥 System Requirements

### Minimum Requirements

- **PHP**: 8.2 or higher
- **MySQL/MariaDB**: 5.7 or higher
- **Composer**: Latest version
- **Web Server**: Apache, Nginx, or equivalent

### Required PHP Extensions

- `intl` - Internationalization support
- `mbstring` - Multibyte string functions
- `json` - JSON encoding/decoding (enabled by default)
- `mysqlnd` - MySQL Native Driver (if using MySQL)
- `curl` - CURL library (if using HTTP requests)

---

## 📦 Installation

### Step 1: Clone the Repository

```bash
git clone <repository-url>
cd pwlci4
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Configure Environment

```bash
cp env .env
```

Edit `.env` and configure:

```env
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'
database.default.hostname = localhost
database.default.database = pwlci4_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### Step 4: Generate Application Key

```bash
php spark key:generate
```

### Step 5: Run Migrations

```bash
php spark migrate
```

### Step 6: Start Development Server

```bash
php spark serve
```

Access the application at: `http://localhost:8080`

---

## ⚙️ Configuration

### Database Setup

Create a new MySQL database:

```sql
CREATE DATABASE pwlci4_db;
```

The migrations will automatically create the required tables:

- `users` - User accounts and authentication
- `products` - Product inventory
- `transactions` - Transaction records

### Environment Variables

Key configuration in `.env`:

- `CI_ENVIRONMENT` - Set to `production` for live environments
- `app.baseURL` - Application base URL
- `database.*` - Database connection details
- `app.cryptKey` - Encryption key for sensitive data

---

## 📁 Project Structure

```
pwlci4/
├── app/
│   ├── Config/              # Configuration files
│   ├── Controllers/         # Application controllers
│   │   ├── AuthController.php
│   │   ├── ProductController.php
│   │   ├── TransactionController.php
│   │   └── BaseController.php
│   ├── Filters/             # Authentication filters
│   ├── Models/              # Database models
│   │   ├── UserModel.php
│   │   └── ProductModel.php
│   ├── Views/               # Template files
│   │   ├── layout.php
│   │   ├── v_login.php
│   │   ├── v_transaction.php
│   │   ├── v_home.php
│   │   └── product/
│   ├── Database/
│   │   ├── Migrations/      # Database migrations
│   │   └── Seeds/           # Database seeders
│   ├── Libraries/           # Custom libraries
│   ├── Helpers/             # Helper functions
│   └── Language/            # Localization files
├── public/                  # Publicly accessible files
│   ├── index.php           # Application entry point
│   ├── img/                # Image storage
│   └── NiceAdmin/          # Admin template assets
├── vendor/                 # Composer dependencies
├── writable/               # Writable directories
│   ├── cache/              # Cache storage
│   ├── logs/               # Application logs
│   ├── session/            # Session data
│   └── uploads/            # File uploads
├── tests/                  # Test files
├── composer.json           # Project dependencies
├── phpunit.xml.dist        # PHPUnit configuration
├── spark                   # CodeIgniter CLI tool
└── .env                    # Environment variables
```

---

## 🚀 Usage

### User Login

1. Navigate to `/login`
2. Enter valid credentials (username min 6 chars, numeric password min 7 chars)
3. Successful login redirects to dashboard

### Managing Products

#### View All Products

```
GET /product
```

#### Add New Product

```
POST /product
Parameters:
- nama (string): Product name
- harga (decimal): Product price
- jumlah (integer): Stock quantity
- foto (file): Product image
```

#### Update Product

```
POST /product/update/{id}
Parameters: Same as create
```

#### Delete Product

```
GET /product/delete/{id}
```

### Viewing Transactions

```
GET /transaction
```

### Logout

```
GET /logout
```

---

## 🛣 API Routes

| Method     | Route                  | Controller            | Description       | Auth |
| ---------- | ---------------------- | --------------------- | ----------------- | ---- |
| `GET`      | `/`                    | Home                  | Dashboard         | No   |
| `GET/POST` | `/login`               | AuthController        | User login        | No   |
| `GET`      | `/logout`              | AuthController        | User logout       | Yes  |
| `GET`      | `/product`             | ProductController     | List products     | Yes  |
| `POST`     | `/product`             | ProductController     | Create product    | Yes  |
| `POST`     | `/product/update/{id}` | ProductController     | Update product    | Yes  |
| `GET`      | `/product/delete/{id}` | ProductController     | Delete product    | Yes  |
| `GET`      | `/transaction`         | TransactionController | View transactions | Yes  |

---

## 🗄 Database Schema

### Users Table

```sql
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Products Table

```sql
CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama VARCHAR(255) NOT NULL,
  harga DECIMAL(10,2) NOT NULL,
  jumlah INT NOT NULL,
  foto VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Transactions Table

```sql
CREATE TABLE transactions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  jumlah INT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);
```

---

## 🧪 Testing

Run unit tests with PHPUnit:

```bash
php vendor/bin/phpunit
```

Run specific test file:

```bash
php vendor/bin/phpunit tests/unit/YourTest.php
```

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Create a feature branch (`git checkout -b feature/AmazingFeature`)
2. Commit changes (`git commit -m 'Add AmazingFeature'`)
3. Push to branch (`git push origin feature/AmazingFeature`)
4. Open a Pull Request

---

## 📝 Coding Standards

- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Write comments for complex logic
- Test all new features
- Update documentation accordingly

---

## 🐛 Troubleshooting

### Issue: Database connection failed

- Verify MySQL/MariaDB is running
- Check `.env` database credentials
- Ensure database exists

### Issue: 404 Page not found

- Verify `.htaccess` is present in `public/` directory
- Check web server rewrite rules are enabled
- Confirm routes in `app/Config/Routes.php`

### Issue: Session not persisting

- Check `writable/session/` directory permissions
- Verify session configuration in `.env`
- Clear session files if corrupted

### Issue: File upload errors

- Check `writable/uploads/` directory permissions
- Verify file size limits in PHP configuration
- Ensure MIME types are allowed

---

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

---

## 📧 Support

For support, email your administrator or create an issue in the repository.

---

## 🔗 Useful Links

- [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [NiceAdmin Template](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/)

---

**Last Updated**: May 2026
**Version**: 1.0.0
