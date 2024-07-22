<x-partials.head />
<x-partials.nav />

<!-- Hero -->
<x-partials.hero />

<main>
    <!-- Search -->
    <x-partials.search />
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{ $slot }}
    </div>
</main>

<x-partials.footer />
