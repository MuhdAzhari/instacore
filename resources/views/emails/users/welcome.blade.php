<x-mail::message>
# Welcome to {{ $siteName }}

Hi {{ $user->name }},

Thank you for joining **{{ $siteName }}**. We're excited to have you onboard.

<x-mail::button :url="route('filament.admin.auth.login')">
Login to Your Account
</x-mail::button>

If you have any questions, just reply to this email—we’re always happy to help!

Thanks,<br>
The {{ $siteName }} Team
</x-mail::message>
