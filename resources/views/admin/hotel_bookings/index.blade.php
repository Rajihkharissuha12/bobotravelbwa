@extends('../../dashboard')
@section('sub-content')

    @section('header')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Hotel Bookings') }}
                </h2>
            </div>
        </div>
    </div>
    @endsection
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse($hotel_bookings as $booking)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($booking->hotel->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{$booking->hotel->name}}
                            </h3>
                        <p class="text-slate-500 text-sm">
                            {{$booking->hotel->city->name}}, {{$booking->hotel->country->name}}
                        </p>
                        </div>
                    </div> 
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Name</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            {{$booking->customer->name}}
                        </h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Total Nights</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                             {{number_format($booking->total_days, 0, ',', '.')}}
                        </h3>
                    </div>
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{number_format($booking->total_amount, 0, ',', '.')}}
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.hotel_bookings.show', $booking)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Manage
                        </a>
                    </div>
                </div> 
                @empty
                <p>tidak ada data</p>
                @endforelse
                

            </div>
        </div>
@endsection
