<x-layout>
    @foreach ($gigs as $gig)
        <!-- Item 1 -->
       <x-listing-card :gig='$gig' />
    @endforeach
</x-layout>
