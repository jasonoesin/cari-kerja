@extends('template')

@section('title', "Companies")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-12">
        <div class="px-[10rem] w-full flex flex-col gap-4">
            <div class="!ITEM relative p-4 border border-[#777777]/40 rounded w-full text-[1rem] flex flex-col gap-4 bg-white drop-shadow-md cursor-pointer">
                <div class="!TOP flex gap-8 flex relative w-full items-center">
                    <div class="w-[10rem] h-[10rem] flex items-center justify-center">
                        @if(Str::contains($company->image, 'http'))
                            <img class="w-[7rem] h-[7rem] object-cover" src="{{$company->image}}" alt=""/>
                        @else
                            <img class="w-[7rem] h-[7rem] object-cover" src="{{url("storage/$company->image")}}" alt=""/>
                        @endif
                    </div>

                    <div class="flex flex-col w-full gap-1">
                        <div class="font-semibold text-[2rem]">
                            <div class="">{{$company->name}}</div>
                            <div class="font-normal text-[1.2rem] flex flex-col">
                                <div class="">{{$company->industry}}</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 w-[50%]">
                            <div class="text-gray-500">Location</div>
                            <div class="">{{$company->address}}</div>
                        </div>
                        <div class="grid grid-cols-2 w-[50%]">
                            <div class="text-gray-500">Company Size</div>
                            <div class="">{{rand(10, 100)}} employees</div>
                        </div>
                    </div>



{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}


                </div>
                <div class="mt-2 border-b"></div>


                <div class="flex relative w-100 pb-16">

                    @if(auth()->user() && auth()->user()->company && auth()->user()->company->id == $company->id )
                        <a href="{{url('/job/register')}}" class="absolute right-[12.5rem] bg-[#c5c6d0] font-bold px-8 py-4 z-[3]">ADD JOB</a>
                        <div class="absolute right-[12.5rem] bg-[#7f7d9c] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">ADD JOB</div>
                    @endif

                    <a href="{{Request::url() . "/jobs"}}" class="absolute right-4 bg-[#fff240] font-bold px-8 py-4 z-[3]">VIEW JOBS</a>
                    <a class="absolute right-4 bg-[#ec272b] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">VIEW JOBS</a>
                </div>
            </div>

            <div class="!BOTTOM relative p-4 border border-[#777777]/40 rounded w-full text-[1rem] flex flex-col gap-4 bg-white drop-shadow-md cursor-pointer">
                <div class="font-bold text-[1.4rem]">
                    Company Details
                </div>
                <div class="font-bold flex flex-col gap-2">
                    <div class="border-b pb-2">Company Description</div>
                    <div class="font-normal">{{$company->description}}</div>
                </div>
            </div>

        </div>
    </div>
@endsection


