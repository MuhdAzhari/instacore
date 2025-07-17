# Changelog

All notable changes to this project will be documented here.

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

