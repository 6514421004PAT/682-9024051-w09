<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Top Streams 2024</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-center text-green-600 mb-6">Top 5 Spotify Streams (2024)</h1>
        
        <div class="relative h-[400px]">
            <canvas id="spotifyChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // รับค่าตัวแปรจาก PHP/Laravel
        // ใช้ Js::from เพื่อแปลง Array เป็น JavaScript object
        const chartLabels = {{ Js::from($labels) }};
        const chartData = {{ Js::from($data) }};

        // ตั้งค่ากราฟ
        const ctx = document.getElementById('spotifyChart').getContext('2d');
        const spotifyChart = new Chart(ctx, {
            type: 'bar', // ประเภทกราฟ: bar (แท่ง), line (เส้น), pie (วงกลม)
            data: {
                labels: chartLabels, // แกน X
                datasets: [{
                    label: 'จำนวนการสตรีม', // คำอธิบายข้อมูล
                    data: chartData, // แกน Y
                    backgroundColor: [ // สีของแต่ละแท่ง
                        'rgba(30, 215, 96, 0.6)', // สีเขียว Spotify
                        'rgba(24, 196, 83, 0.6)',
                        'rgba(18, 177, 71, 0.6)',
                        'rgba(12, 158, 59, 0.6)',
                        'rgba(6, 139, 47, 0.6)'
                    ],
                    borderColor: 'rgba(30, 215, 96, 1)', // สีขอบ
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // เพื่อให้กำหนดความสูงใน div ได้
                scales: {
                    y: {
                        beginAtZero: true, // ให้แกน Y เริ่มที่ 0
                        ticks: {
                            // ปรับรูปแบบตัวเลขให้มีคอมม่า (เช่น 1,000,000)
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // ซ่อน Legend เพราะมีชุดข้อมูลเดียว
                    }
                }
            }
        });
    </script>
</body>
</html>