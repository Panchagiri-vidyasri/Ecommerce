# 🛒 PHP E-Commerce Website
## 📁 Project Structure

```

Ecommerce/
├── admin/               # Admin panel pages (login, dashboard, manage products)
├── css/                 # Stylesheets
├── images/              # Product and UI images
├── includes/            # Common components (db connection)
├── pages/               # Cart, login, logout pages
├── index.php            # Homepage
├── link.php             # DB config
├── test\_db.php          # Test DB connection

````

---

## 🚀 Features

- 🛍️ Product catalog on homepage
- 🛒 Cart system
- 🔐 User authentication
- 🧑‍💼 Admin login and dashboard
- ➕ Product management (add/view/delete)
- 💡 Simple layout using HTML/CSS
- 💾 MySQL database integration

---

## 🛠️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/ecommerce.git
````

### 2. Set Up Local Server

* Use **XAMPP**, **WAMP**, or **MAMP**
* Place the `ecommerce` folder in `htdocs/` (XAMPP)

### 3. Create a Database

* Go to `phpMyAdmin`
* Create a new database: `ecommerce`
* Import the SQL file if provided or manually create tables

### 4. Configure DB Connection

Edit `includes/db.php` or `link.php`:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "ecommerce";
```

### 5. Run the Application

Open your browser and go to:

```
http://localhost/ecommerce/index.php
```

---

## 📌 URLs

* 🏠 Home: `http://localhost/ecommerce/index.php`
* 🧑‍💼 Admin Login: `http://localhost/ecommerce/admin/login.php`
* 🛒 Cart: `http://localhost/ecommerce/pages/cart.php`
* ➕ Add Product: `http://localhost/ecommerce/admin/add_product.php`

---

## 📚 Technologies Used

* **PHP** (Backend)
* **MySQL** (Database)
* **HTML/CSS** (Frontend)
* **No frameworks** (Pure PHP)  
---

## 🙌 Acknowledgments

* UI inspired by basic eCommerce layouts
* Educational project built from scratch using PHP and MySQL


---

