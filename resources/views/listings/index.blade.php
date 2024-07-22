<x-layout>

    <main>
        <x-partials.hero />
        <x-partials.search />

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($gigs as $gig)
                <!-- Item 1 -->
                <x-listing-card :gig='$gig' />
            @endforeach
        </div>
        <div class="mt-6 p-4">
            {{ $gigs->links() }}
        </div>
    </main>
</x-layout>
