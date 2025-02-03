{{-- TODO fix them not shwoing at the very very bottom always --}}
<div class="flex items-center space-x-2">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/term_id=' . $definition->term->id)) }}"
        target="_blank" class="text-blue-800 hover:text-blue-800 transition">
        <i class="fab fa-facebook"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url('/term_id=' . $definition->term->id)) }}"
        target="_blank" class="text-black hover:text-blue-700 transition">
        <i class="fa-brands fa-x-twitter"></i>
    </a>

    <a href="https://wa.me/?text={{ urlencode(url('/term_id=' . $definition->term->id)) }}" target="_blank"
        class="text-green-800 hover:text-green-700 transition">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <a href="https://www.reddit.com/submit?url={{ urlencode(url('/term_id=' . $definition->term->id)) }}&title={{ urlencode($definition->term->term) }}"
        target="_blank" class="text-orange-600 hover:text-orange-800 transition">
        <i class="fab fa-reddit"></i>
    </a>
</div>
