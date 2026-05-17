<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-red-600 text-white hover:bg-red-500 focus:ring-red-400 uppercase tracking-widest text-xs']) }}>
    {{ $slot }}
</button>
