<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Новое заявление
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
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

            <div>
                <x-input-label for="path_img" :value="__('Номер автомобиля')" />
                <x-text-input id="path_img" class="block mt-1 " type="file" name="path_img" required />
                <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
            </div>

            <br>
            <button type="submit">Создать заявление</button>
        </form>

        <br>
    </div>
</x-app-layout>
