<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลภาพยนตร์ใหม่</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
        h2 { border-left: 5px solid #4a90e2; padding-left: 15px; margin-bottom: 30px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .full-width { grid-column: span 2; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #444; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; font-size: 1rem; }
        .btn-group { margin-top: 30px; display: flex; gap: 10px; }
        .btn-save { background: #2ecc71; color: white; border: none; padding: 12px 30px; border-radius: 8px; cursor: pointer; font-size: 1rem; flex: 2; }
        .btn-back { background: #95a5a6; color: white; text-decoration: none; padding: 12px 20px; border-radius: 8px; text-align: center; flex: 1; }
        .btn-save:hover { background: #27ae60; }
    </style>
</head>
<body>

<div class="container">
    <h2> เพิ่มข้อมูลภาพยนตร์ใหม่</h2>
    
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="full-width">
                <label>ชื่อภาพยนตร์ </label>
                <input type="text" name="mov_name_th"  required>
            </div>
            
            <div>
                <label>ปีที่ฉาย </label>
                <input type="number" name="mov_year"  required>
            </div>
            
            <div>
                <label>ตัวแทนจำหน่าย</label>
                <select name="mov_dtc_id" required>
                    <option value="" disabled selected>เลือกตัวแทนจำหน่าย</option>
                    @foreach($distributors as $dtb)
                        <option value="{{ $dtb->id }}">{{ $dtb->dtb_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label>งบประมาณ </label>
                <input type="number" step="0.01" name="mov_budget" placeholder="0.00" required>
            </div>
            
            <div>
                <label>รายได้ </label>
                <input type="number" step="0.01" name="mov_income" placeholder="0.00" required>
            </div>
        </div>

        <div class="btn-group">
            <a href="{{ route('movies.index') }}" class="btn-back">ยกเลิก</a>
            <button type="submit" class="btn-save">บันทึกข้อมูลภาพยนตร์</button>
        </div>
    </form>
</div>

</body>
</html>