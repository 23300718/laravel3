@props(['type'])

@php
$classes = match ($type) {
    1, '1' => 'text-indigo-600',
    2, '2' => 'text-green-600',
    3, '3' => 'text-red-600',
    default => 'text-gray-600',
};
@endphp

<div>
    <p>
        Статус заказа:
        <span {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</span>
    </p>
</div>
