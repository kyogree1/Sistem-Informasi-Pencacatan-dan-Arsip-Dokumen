<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary uppercase tracking-widest text-xs']) }}>
    {{ $slot }}
</button>
