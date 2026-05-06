<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Новое заявление
        </h2>
    </x-slot>

    <div class="py-6 px-4">
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
    </div>
</x-app-layout>
