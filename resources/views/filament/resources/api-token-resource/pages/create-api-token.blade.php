<x-filament::page>
    @if (session('api_token_plaintext'))
        <x-filament::notification
            icon="heroicon-o-key"
            color="warning"
            class="mb-6"
        >
            <div class="font-bold text-sm">
                Token Created — Copy it Now!
            </div>
            <div class="mt-2 text-sm text-gray-700">
                This is your new API token. You will not be able to view it again:
            </div>

            <div class="mt-3 flex flex-col gap-2">
                <pre id="api-token" class="bg-white rounded p-3 border border-yellow-400 text-sm text-gray-900 overflow-x-auto">{{ session('api_token_plaintext') }}</pre>

                <button
                    onclick="copyToken()"
                    type="button"
                    class="inline-flex w-fit items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded"
                >
                    Copy to Clipboard
                </button>
            </div>
        </x-filament::notification>

        <script>
            function copyToken() {
                const tokenText = document.getElementById('api-token').innerText;
                navigator.clipboard.writeText(tokenText).then(() => {
                    window.filament?.notifications?.notify({
                        title: "Copied!",
                        body: "The token has been copied to your clipboard.",
                        color: "success",
                    });
                });
            }
        </script>
    @endif

    {{ $this->form }}
</x-filament::page>
