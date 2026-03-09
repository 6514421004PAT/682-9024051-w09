<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Top Streams 2024</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold text-center text-green-600 mb-6">Top 5 Spotify Streams (2024)</h1>
        
        <div class="relative h-[400px]">
            <canvas id="spotifyChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartLabels = {{ Js::from($labels) }};
        const chartData = {{ Js::from($data) }};

        const ctx = document.getElementById('spotifyChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Streams',
                    data: chartData,
                    backgroundColor: 'rgba(30, 215, 96, 0.7)',
                    borderColor: 'rgba(30, 215, 96, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: { callback: (value) => value.toLocaleString() }
                    }
                }
            }
        });
    </script>
</body>
</html>