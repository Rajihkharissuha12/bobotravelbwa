<x-app-layout>
    <!-- Subnav: Menampilkan navigasi tambahan -->
    <x-slot name="subnav">
        <div class="flex space-x-4">
            @can('manage hotels')
            <x-nav-link :href="route('admin.hotels.index')" :active="request()->routeIs('admin.hotels.index') || request()->routeIs('admin.hotels.show') || request()->routeIs('admin.hotels.edit') || request()->routeIs('admin.hotels.create')">
                {{ __('Hotels') }}
            </x-nav-link>
            @endcan
            @can('manage hotel bookings')
            <x-nav-link :href="route('admin.hotel_bookings.index')" :active="request()->routeIs('admin.hotel_bookings.index') || request()->routeIs('admin.hotel_bookings.show')">
                {{ __('Hotel Bookings') }}
            </x-nav-link>
            @endcan
        </div>
    </x-slot>

    <!-- Header: Menampilkan header dinamis jika ada -->
    <header>
        @yield('header')
    </header>

    <div>
        @yield('sub-content')
    </div>

    <!-- Menyertakan skrip tambahan (jika ada) -->
    @stack('after-scripts')
</x-app-layout>
