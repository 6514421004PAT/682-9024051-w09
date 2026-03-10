<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลภาพยนตร์</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn-save { background: #4a90e2; color: white; border: none; padding: 12px 20px; border-radius: 6px; cursor: pointer; width: 100%; font-size: 1rem; }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2> แก้ไขข้อมูลภาพยนตร์</h2>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>ชื่อภาพยนตร์ (ไทย)</label>
            <input type="text" name="mov_name_th" value="{{ $movie->mov_name_th }}" required>
        </div>

        <div class="form-group">
            <label>ปีที่เข้าฉาย</label>
            <input type="number" name="mov_year" value="{{ $movie->mov_year }}" required>
        </div>

        <div class="form-group">
            <label>งบประมาณ (ล้านบาท)</label>
            <input type="number" step="0.01" name="mov_budget" value="{{ $movie->mov_budget }}" required>
        </div>

        <div class="form-group">
            <label>รายได้ (ล้านบาท)</label>
            <input type="number" step="0.01" name="mov_income" value="{{ $movie->mov_income }}" required>
        </div>

        <div class="form-group">
            <label>ตัวแทนจำหน่าย</label>
            <select name="mov_dtc_id" required>
                @foreach($distributors as $dtb)
                    <option value="{{ $dtb->id }}" {{ $dtb->id == $movie->mov_dtc_id ? 'selected' : '' }}>
                        {{ $dtb->dtb_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-save">บันทึกการแก้ไข</button>
        <a href="{{ route('movies.index') }}" class="btn-back">← กลับหน้าหลัก</a>
    </form>
</div>

</body>
</html>