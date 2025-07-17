<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-2">Recent Logins</h2>

        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">User</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logins as $login)
                    <tr class="border-b">
                        <td class="py-1">{{ $login->user?->name ?? '-' }}</td>
                        <td class="py-1">{{ $login->user?->email ?? '-' }}</td>
                        <td class="py-1 text-gray-500">{{ $login->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 text-center text-gray-500">No recent logins found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-filament::section>
</x-filament-widgets::widget>
