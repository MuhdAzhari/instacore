# InstaCore

🔥 A modular Laravel + Filament-based core system built for speed and reuse across projects. Perfect for software houses, SaaS builders, and internal tools.

## 💡 Features
- ✅ Laravel 11 + Filament v3
- 🔐 Auth & Role management (Spatie)
- 🧑 User Profile & Admin CRUD
- 📊 Dashboard widgets
- 📂 Media manager (plugin)
- 🛠️ System settings
- 📝 Audit trail
- 📦 Modular folder structure (`/Core` vs `/Modules`)
- 🌐 Multi-language ready (EN, MS)

## 🏗️ How to Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan make:filament-user
