@props(['label', 'name'])
<div class="sm:col-span-4">
    {{ $name }}
    <br />
    {{ $label }}
    <br/>
    {{ $slot }}
</div>
