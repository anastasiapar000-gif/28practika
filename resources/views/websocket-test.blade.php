<!DOCTYPE html>
<html>
<head>
    <title>WebSocket тест</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
</head>
<body>
    <div style="text-align: center; padding: 50px; font-family: Arial">
        <h1>🔌 WebSocket Test (Reverb)</h1>
        
        <div style="margin: 20px">
            <button onclick="testBroadcast()" style="padding: 10px 20px; font-size: 16px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer">
                Отправить тестовое событие
            </button>
        </div>

        <div id="log" style="max-width: 500px; margin: 20px auto; border: 1px solid #ccc; border-radius: 5px; padding: 10px; min-height: 200px; text-align: left">
            <div style="color: #666">Ожидание событий...</div>
        </div>
    </div>

    <script>
        function testBroadcast() {
            fetch('/test-broadcast', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });
        }

        // Добавляем сообщения в лог
        document.addEventListener('DOMContentLoaded', function() {
            if (window.Echo) {
                window.Echo.channel('public-channel')
                    .listen('.test.event', (e) => {
                        const log = document.getElementById('log');
                        const msg = document.createElement('div');
                        msg.style.margin = '5px 0';
                        msg.style.padding = '5px';
                        msg.style.background = '#e3f2fd';
                        msg.style.borderRadius = '3px';
                        msg.innerHTML = `
                            <strong style="color: #1976d2">📨 Получено:</strong><br>
                            Сообщение: ${e.message}<br>
                            Время: ${e.time}
                        `;
                        log.appendChild(msg);
                        log.scrollTop = log.scrollHeight;
                    });
            }
        });
    </script>
</body>
</html>