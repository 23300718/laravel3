<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заявления</title>
</head>
<body>
    <h2>Новое заявление</h2>
    
    <form method="POST" action="{{ route('reports.store') }}">
        @csrf 
        
        <div>
            <label>Регистрационный номер авто</label><br>
            <input type="text" name="number" required>
        </div>

        <br>

        <div>
            <label>Описание нарушения</label><br>
            <textarea name="description" rows="4" required></textarea>
        </div>

        <br>
        <button type="submit">Создать заявление</button>
    </form>

    <br>
</body>
</html>
