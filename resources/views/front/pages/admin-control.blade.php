<!DOCTYPE html>
<html>
<head>
    <title>لوحة التحكم السرية</title>
</head>
<body style="text-align: center; padding: 50px;">
    <h2>لوحة التحكم السرية الخاصة بالمنصة</h2>

    <form method="POST" action="{{ route('admin.set.paid') }}" style="display:inline-block; margin: 10px;">
        @csrf
        <button style="background: green; color: white; padding: 10px 20px; border: none;">✅ تم الدفع</button>
    </form>

    <form method="POST" action="{{ route('admin.set.unpaid') }}" style="display:inline-block; margin: 10px;">
        @csrf
        <button style="background: red; color: white; padding: 10px 20px; border: none;">❌ لم يتم الدفع</button>
    </form>
</body>
</html>
