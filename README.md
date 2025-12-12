# InstaCore

A **modular Laravel + Filament core system** designed for rapid development and reuse across multiple projects.  
Built to support **software houses, SaaS products, and internal enterprise tools** with a clean, extensible foundation.

---

## ✨ Key Features

- **Laravel 11** with **Filament v3**
- **Authentication & Role Management** (Spatie Permission)
- **User Profile Management** and **Admin CRUD**
- **Configurable Dashboard Widgets**
- **Media Management** (Filament plugin support)
- **System Settings Module**
- **Audit Trail / Activity Logging**
- **Modular Architecture**
  - Core features under `/Core`
  - Project-specific features under `/Modules`
- **Multi-language Ready**
  - English (EN)
  - Bahasa Malaysia (MS)

---

## 🚀 Getting Started

### 1. Install Dependencies

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Database Setup

```bash
php artisan migrate
```

### 3. Create Filament Admin User

```bash
php artisan make:filament-user
```

---

## 📬 Contact

For questions, collaboration, or commercial enquiries:

- **Name:** Muhd Azhari Ayie  
- **Email:** muhd.azhari.ayie@gmail.com  
- **GitHub:** https://github.com/MuhdAzhari  

---

## 📌 License

This project is licensed under the **MIT License**.

You are free to use, modify, and distribute this software in both private and commercial projects, provided that the original copyright and license notice are included.

© 2025 Muhd Azhari Ayie
