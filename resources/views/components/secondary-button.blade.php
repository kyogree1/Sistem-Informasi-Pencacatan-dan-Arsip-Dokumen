<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary uppercase tracking-widest text-xs']) }}>
    {{ $slot }}
</button>
