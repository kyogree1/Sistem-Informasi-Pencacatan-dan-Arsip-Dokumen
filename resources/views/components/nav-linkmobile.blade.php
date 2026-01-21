@props(['active' => false])

<a {{ $attributes }}
aria-current="{{ $active ? 'Page' : false}}"
class=" {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium">{{ $slot }}
</a>
