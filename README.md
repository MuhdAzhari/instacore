# InstaCore

InstaCore is a Laravel + Filament starter system that provides a clean foundation with user management, permissions, audit logging, settings panel, and email notifications.

---

## 🧩 Features

### Core Features (v1.0.0)
- User management with role and permission support
- Inactive user login prevention
- Audit logging: user login/logout and model CRUD events
- Custom login screen with validation + status checks
- General Settings Panel using Filament + Spatie Laravel Settings
- Custom Excel & PDF export for audit logs

### Basic Features (v1.1.0 – 1.3.0)
- Welcome Email Notification (HTML, branding, login button)
- E-mail Log viewer using [rickdbcn/filament-email](https://filamentphp.com/plugins/rickdbcn-email)
- **User Password Reset (Public Flow)**: Forgot/reset password via email
- **Admin Password Reset Button**: Triggered from Filament with audit log + toast

---

## 📦 Installation

1. Clone the repo
2. Run `composer install`
3. Set up `.env` and database
4. Run `php artisan migrate --seed`
5. Login at `/admin`

---

## 🧪 Testing

- Use **mail log** to verify email behavior
- Use **audit log** to track admin/user activity

---

## 📌 Version History

| Version   | Summary                                              |
|-----------|------------------------------------------------------|
| v1.3.0    | Admin password reset button with email + audit logs  |
| v1.2.1    | Styled forgot password button + login link           |
| v1.2.0    | Public user password reset flow (email + token form) |
| v1.1.0    | General Settings + Welcome Email + Email Log         |
| v1.0.0    | Core: User, Role, Permission, Login, Audit           |

---

## 📜 License

MIT
