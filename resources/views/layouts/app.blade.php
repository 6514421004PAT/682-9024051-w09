<!DOCTYPE html>
<html lang="th"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ระบบจัดการชุมชน')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

   <style>
    /* ตั้งค่าฟอนต์หลัก */
    body {
        font-family: 'Prompt', sans-serif;
        line-height: 1.8; /* เพิ่มความสูงบรรทัดให้สระมีที่อยู่ */
        -webkit-font-smoothing: antialiased;
    }

    /* แก้ไขปัญหาช่อง Input บีบสระ */
    input[type="text"], 
    input[type="checkbox"],
    textarea {
        font-family: 'Prompt', sans-serif !important;
        /* สำคัญ: ใช้ padding แทนการกำหนด height เพื่อให้กล่องขยายตามสระ */
        padding-top: 0.75rem !important; 
        padding-bottom: 0.75rem !important;
        line-height: 1.5 !important;
    }

    /* ส่วนของ Label และข้อความทั่วไป */
    label, span, p, h1 {
        line-height: 1.8 !important;
        display: inline-block; /* ช่วยให้สระไม่โดนบรรทัดบนทับ */
    }

    /* ปรับแต่ง Checkbox ให้ดูดีและไม่เบียดสระ */
    .group span {
        margin-top: -2px; /* ขยับตัวหนังสือขึ้นเล็กน้อยให้บาลานซ์กับ checkbox */
    }
</style>
</head>
<body class="bg-gray-100 antialiased">

    @hasSection('header')
    <header class="py-6 bg-white shadow-sm mb-6">
        <div class="container mx-auto px-4">
            @yield('header')
        </div>
    </header>
    @endif

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    <footer class="py-10 text-center text-gray-400 text-sm">
        &copy; 2026 ระบบจัดการข้อมูลชุมชน
    </footer>

</body>
</html>