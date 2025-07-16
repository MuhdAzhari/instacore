# InstaCore

InstaCore is a Laravel + Filament starter system that provides a clean foundation with user management, permissions, audit logging, settings panel, and email notifications.

---

## 🧩 Features

### Core Features (v1.0.0)
- User management with role and permission support
- Inactive user login prevention
- Audit logging with user login/logout and CRUD actions
- Custom login screen with validation
- General Settings Panel using Filament + Spatie
- Custom Excel & PDF export for audit logs

### Basic Features (v1.1.0)
- Welcome Email Notification with branding and login button
- E-mail Log tracking using [rickdbcn/filament-email](https://filamentphp.com/plugins/rickdbcn-email)

---

## 📦 Installation

1. Clone the repo
2. Run `composer install`
3. Set up `.env` and database
4. Run `php artisan migrate --seed`
5. Login at `/admin`

---

## 🧪 Testing

Use mail log and audit log to track system behaviors during development.

---

## 📜 License

MIT
