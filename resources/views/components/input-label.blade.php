@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
