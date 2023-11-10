<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Chat Container -->
                <div class="flex h-screen">
                    <!-- User List -->
                    <div class="w-1/4 border-r overflow-y-auto">
                        <!-- User List Content Goes Here -->
                        <!-- Example: -->
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-4">Users</h2>
                            <!-- List of Users -->
                            <ul>
                                <li class="mb-2">User 1</li>
                                <li class="mb-2">User 2</li>
                                <!-- Add more users as needed -->
                            </ul>
                        </div>
                    </div>

                    <!-- Chat Area -->
                    <div class="flex-1 p-4">
                        <!-- Chat Header -->
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold">Chat with User</h2>
                        </div>

                        <!-- Chat Messages -->
                        <div class="overflow-y-auto max-h-96">
                            <!-- Messages Go Here -->
                            <!-- Example: -->
                            <div class="mb-2">
                                <strong>User 1:</strong> Hello!
                            </div>
                            <div class="mb-2">
                                <strong>User 2:</strong> Hi there!
                            </div>
                            <!-- Add more messages as needed -->
                        </div>

                        <!-- Chat Input -->
                        <div class="flex items-center space-x-2">
                            <input type="text" placeholder="Type your message..." class="flex-1 p-2 border rounded">
                            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Alpine.js for interactive features -->
    <script>
    <script>
        // JavaScriptのスクリプトセクション
 
        // Viteで読み込むJavaScriptファイルの読み込みが失敗したときのエラーハンドリング関数
        function notifyReadJavaScriptError() {
            // 'app'というIDを持つ要素の内容を更新して、エラーメッセージを表示します。
            document.getElementById('app').innerHTML = 'JavaScriptファイルの読み込みに失敗しました。';
        }
    </script>
    {{-- Viteを使用して、プロジェクトルートから見て'resources/js/app.js'というパスのJavaScriptファイルを読み込みます。 --}}
    @vite('resources/js/app.js')
    </script>
</x-app-layout>
