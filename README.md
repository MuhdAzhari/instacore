# InstaCore

InstaCore is a Laravel + Filament starter system that provides a clean foundation with user management, permissions, audit logging, email tools, and configurable dashboards.

---

## 🧩 Features

### 🏗️ Core Features (v1.0.0)
- User management with role and permission support (Spatie)
- Inactive user login prevention with custom validator
- Audit logging for login/logout and model CRUD events
- General Settings Panel (Spatie + Filament UI)
- Custom Excel & PDF export of audit logs

### 📦 Basic Features (v1.1.0 – v1.3.0)
- HTML-rich Welcome Email Notification with branding and action button
- Email Log Viewer (rickdbcn/filament-email plugin)
- Password Reset Flow (user public form + admin button with audit)
- Admin-triggered password reset with confirmation toast + log

### 📊 Dashboard & Activity (v1.4.0 – v1.6.3)
- Custom Admin Dashboard with modular widgets:
  - System Info
  - Recent Logins
  - User Overview Stats
  - Recent Errors
- User Dashboard:
  - Role-based dashboard routing
  - Welcome message, stats, and recent activity
- User Activity Log with Filament view
- Profile Management Page with photo cleanup

### 🔐 API Token Management (v1.7.0+)
- Secure token creation and listing via Laravel Sanctum
- Expiration support with time presets (30 days, custom)
- Status toggle (active/inactive)
- Audit logging integration

---

## 🚀 Installation

1. Clone the repo
2. Run `composer install`
3. Configure `.env` with DB and mail settings
4. Run `php artisan migrate --seed`
5. Access `/admin` and login with seeded admin credentials

---

## 🧪 Testing

- Use `/admin/email-log` to view email history
- Use Audit Log page to verify user and admin actions

---

## 📌 Version History

| Version   | Summary                                                        |
|-----------|----------------------------------------------------------------|
| v1.7.1    | Token expiration logic and status toggle for API tokens       |
| v1.7.0    | API Token Management with Laravel Sanctum                      |
| v1.6.3.2  | Complete Profile Management + photo cleanup                    |
| v1.6.3.1  | UI improvement: Rearranged menu                                |
| v1.6.3    | Add profile management page                                    |
| v1.6.2    | Modular User Dashboard with widgets (Welcome, Stats, Activity) |
| v1.6.1    | Role-based dashboard routing setup                             |
| v1.6.0    | User Dashboard page enabled                                    |
| v1.5.0    | User Activity Log in Filament                                  |
| v1.4.3.2  | Replace Filament dashboard with `/admin` + layout widgets      |
| v1.4.3.1  | Remove IP column from login widget                             |
| v1.4.3    | Error widget + log password reset failures                     |
| v1.4.2    | Add System Info widget                                         |
| v1.4.1    | Add Recent Logins widget                                       |
| v1.4.0    | Add Admin Dashboard with User Overview                         |
| v1.3.0    | Admin-triggered password reset + audit                         |
| v1.2.1    | Forgot password form improvements (style + link)               |
| v1.2.0    | Full user password reset via email                             |
| v1.1.0    | Welcome email + Email Log plugin                               |
| v1.0.0    | Core system: User, Roles, Audit Log, Settings                  |

---

## 📜 License

MIT
