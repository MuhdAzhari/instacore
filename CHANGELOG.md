# Changelog

All notable changes to this project are documented here.

## [v1.7.1] - 2025-07-18
### Added
- Token expiration date selector (e.g. 30 days)
- Active toggle for tokens (enabled/disabled)
- Filter expired or inactive tokens
- Expiration stored in `expires_at` (nullable datetime)

### Fixed
- Resolved datetime parsing bug when setting expiry from dropdown

## [v1.7.0] - 2025-07-18
### Added
- API Token Management under User Panel
- Token creation with name + expiration support
- Secure display of newly created token once
- Deletion confirmation modal
- Sanctum integration + UI via Filament Table

## [v1.6.3.2] - 2025-07-18
### Improved
- Auto-delete old profile photo on update

## [v1.6.3.1] - 2025-07-18
### Changed
- Moved user menu items to clean up layout

## [v1.6.3] - 2025-07-18
### Added
- Full user profile form (name, email, password)
- File upload for profile photo

## [v1.6.2] - 2025-07-18
### Added
- Modular dashboard widgets:
  - Welcome (custom Blade)
  - Stats (User count)
  - Recent Activity (audit logs)

## [v1.6.1] - 2025-07-18
### Added
- Dynamic dashboard redirection based on role (admin/user)

## [v1.6.0] - 2025-07-18
### Added
- New User Dashboard route and layout

## [v1.5.0] - 2025-07-18
### Added
- Activity log panel for users with audit entries

## [v1.4.3.2] - 2025-07-17
### Changed
- Replaced default Filament dashboard with `/admin` route
- Custom layout with responsive grid

## [v1.4.3.1] - 2025-07-17
### Removed
- IP address column from Recent Logins widget

## [v1.4.3] - 2025-07-17
### Added
- Error Widget: Shows recent error-level logs
- Log failed password reset attempts with `tag => failed_password_reset`

## [v1.4.2] - 2025-07-17
### Added
- System Info widget (Laravel, PHP, DB version, timezone)

## [v1.4.1] - 2025-07-17
### Added
- Recent Logins widget (user, time, IP, user agent)

## [v1.4.0] - 2025-07-17
### Added
- Admin Dashboard with stats (user count, roles, permissions)

## [v1.3.0] - 2025-07-17
### Added
- Admins can now trigger password reset emails directly from the User List in Filament.
- Confirmation prompt appears before sending the reset link.
- Success toast notification confirms that the email has been sent.
- Audit log entry is recorded (`admin_password_reset` event) with metadata:
  - `user_id`, `auditable_id`, `ip_address`, `user_agent`, `url`, `tags`

### Improved
- Action visibility is restricted to users with a valid email.


## [v1.2.1] - 2025-07-16
### Changed
- Styled the "Send Password Reset Link" button with Tailwind's `bg-orange-600` to match the admin login button.
- Added "Back to Login" link under the forgot password form to improve UX.

## [v1.2.0] - 2025-07-16
### Added
- Public `/forgot-password` page for users to request a reset link
- Password reset email using Laravel's built-in notification
- `/reset-password/{token}` page for setting a new password
- Blade templates styled with Tailwind CDN
- Password reset logic using `ResetPasswordController`

### Fixed
- HTML escaping issue in Filament login footer (now allows "Forgot Password?" link)

## [v1.1.0] - 2025-07-16
### Added
- HTML-rich Welcome Email for new users
- Filament Email Log integration for email tracking and preview
- Configuration support for mail testing using `log` driver

## [v1.0.0] - 2025-07-14
### Added
- User management with role/permission assignment
- Role-based access control with Spatie
- Inactive user login prevention
- Audit logging for model events and user actions
- Excel and PDF export of audit logs
- General Settings panel (site name, email, timezone, maintenance mode)

