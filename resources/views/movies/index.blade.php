<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลภาพยนตร์</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4a90e2;
            --success: #2ecc71;
            --warning: #f1c40f;
            --danger: #e74c3c;
            --dark: #2c3e50;
            --bg: #f4f7f6;
        }

        body { font-family: 'Sarabun', sans-serif; background-color: var(--bg); color: var(--dark); margin: 0; padding: 20px; }
        .container { max-width: 1100px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
        
        
        .header-section { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        h2 { color: var(--dark); border-left: 5px solid var(--primary); padding-left: 15px; margin: 0; }

        .btn { padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: 0.2s; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; }
        .btn-add { background: white; color: var(--dark); border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .btn-add:hover { background: #f8f9fa; transform: translateY(-1px); }
        .plus-icon { color: #8e44ad; font-size: 22px; font-weight: bold; }

        
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: var(--dark); color: white; text-transform: uppercase; font-size: 0.85rem; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        .badge-money { font-weight: bold; color: var(--primary); }
        .action-btns { display: flex; gap: 8px; }
        .btn-edit { background: var(--warning); color: #333; font-size: 0.85rem; }
        .btn-delete { background: var(--danger); color: white; font-size: 0.85rem; }
        .alert { padding: 15px; background: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px; border-left: 5px solid var(--success); }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h2> ระบบจัดการคลังภาพยนตร์</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-add">
            <span class="plus-icon">+</span> เพิ่มข้อมูลภาพยนตร์ใหม่
        </a>
    </div>

    @if(session('success'))
        <div class="alert">✅ {{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อภาพยนตร์</th>
                    <th>ปีที่ฉาย</th>
                    <th>งบประมาณ</th>
                    <th>รายได้</th>
                    <th>ตัวแทนจำหน่าย</th>
                    <th style="text-align: center;">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td><strong>#{{ $movie->id }}</strong></td>
                    <td>{{ $movie->mov_name_th }}</td>
                    <td>{{ $movie->mov_year }}</td>
                    <td class="badge-money">{{ number_format($movie->mov_budget, 2) }}</td>
                    <td class="badge-money" style="color: var(--success)">{{ number_format($movie->mov_income, 2) }}</td>
                    <td><span style="background:#eee; padding:3px 8px; border-radius:10px; font-size:0.9rem;">{{ $movie->distributor->dtb_name ?? '-' }}</span></td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-edit">แก้ไข</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('ยืนยันการลบ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-delete">ลบ</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>