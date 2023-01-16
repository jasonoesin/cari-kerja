@extends('template')

@section('title', "Companies")

@section('content')
    <style>
        .pagination
        {
            margin-top: 1rem;
            display: flex;
        }

        .pagination > * {
            border: 1px solid lightgray;
            background-color: white;
            padding: 0.25rem 0.75rem;
            color: lightskyblue;
        }

        .active{
            background-color: #68BBE3;
            color: white;
        }
    </style>

    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-4">

        <form action="{{url('/companies/search/')}}" class="search">
            <label class="flex bg-[#ebf5fa] rounded px-3 py-2 text-[1rem] w-[30rem] gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

                <input value="{{ app('request')->input('value') }}" name="value" placeholder="Search for Companies" class="bg-[#ebf5fa] focus:outline-none" type="text">
            </label>
        </form>

        @if(!$companies->all())
            <div class="flex flex-col gap-4 justify-center items-center text-center mt-16">
                <img class="w-[10rem] h-[10rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/images/jobs/empty-view.png">
                <div class="font-bold">
                    Sorry, there were no matching companies found.
                </div>

                <div class="w-[30rem] text-[1.1rem]">
                    Check your spelling or try different keywords. You can also explore your job recommendations.
                </div>
            </div>
        @endif

        <div class="!GRID grid grid-cols-3 gap-4">


            @foreach($companies->reverse() as $item)
                <a href="{{url("/company/$item->id")}}" class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">
                <div class="!TOP flex gap-8 flex col relative">
                    <div class="">
                        @if(Str::contains($item->image, 'http'))
                            <img class="w-[5rem] h-[5rem] object-cover" src="{{$item->image}}" alt=""/>
                        @else
                            <img class="w-[5rem] h-[5rem] object-cover" src="{{url("storage/$item->image")}}" alt=""/>
                        @endif
                    </div>

                    <div class="flex flex-col">
                        <div class="font-semibold">{{$item->name}}</div>
                        <div class="text-[1rem] flex flex-col">
                            <div class="text-gray-500">{{$item->address}}</div>
                        </div>
                    </div>

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
                <div class="!BOTTOM flex flex-col gap-1">
                    <div class="!SALARY flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5H15v-18a.75.75 0 000-1.5H3zM6.75 19.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 010 1.5h-.75A.75.75 0 016 6.75zM6.75 9a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM6 12.75a.75.75 0 01.75-.75h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 6a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zm-.75 3.75A.75.75 0 0110.5 9h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 12a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM16.5 6.75v15h5.25a.75.75 0 000-1.5H21v-12a.75.75 0 000-1.5h-4.5zm1.5 4.5a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 2.25a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75h-.008zM18 17.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z" clip-rule="evenodd" />
                        </svg>


                        <div class="">
                            {{$item->industry}}
                        </div>
                    </div>

                    <div class="!LOCATION flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                        </svg>

                        <div class="">
                            {{count($item->jobs)}} active jobs
                        </div>
                    </div>

                    <div class="!UPDATED mt-4 flex items-center gap-2 text-[0.8rem] text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>


                        <div class="">
                            Updated yesterday
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="flex items-center justify-center mt-16">
            {{$companies->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection


