@extends('template')

@section('title', "Jobs")

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

    <div class="bg-[#f3f3f3] w-full flex px-16 py-4 gap-4 text-blue-600 font-bold">
        <a href="{{url('/jobs')}}" >Explore</a>
        <a href="{{url('/jobs/bookmark')}}" class="text-[#777777]" >Bookmarked</a>
    </div>

    @php
        function rupiah($value){
            $result = "Rp " . number_format($value,2,',','.');
            return $result;
        }
    @endphp



    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8">
        <form action="{{url('/jobs/search/')}}" class="search">
            <label class="flex bg-[#ebf5fa] rounded px-3 py-2 text-[1rem] w-[30rem] gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

                <input value="{{ app('request')->input('value') }}" name="value" placeholder="Search for Jobs" class="bg-[#ebf5fa] focus:outline-none" type="text">
            </label>
        </form>

        @if(!$jobs->all())
            <div class="flex flex-col gap-4 justify-center items-center text-center mt-16">
                <img class="w-[10rem] h-[10rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/images/jobs/empty-view.png">
                <div class="font-bold">
                    Sorry, there were no matching jobs found.
                </div>

                <div class="w-[30rem]">
                    Check your spelling or try different keywords. You can also explore your job recommendations.
                </div>
            </div>
        @endif
        <div class="!GRID grid grid-cols-3 gap-4">
            @forelse($jobs as $job)
                <a href="{{url("./job/$job->id")}}"  class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">
                    <div class="!TOP flex gap-8 flex col relative">
                        <div class="">
                            <?php
                                $image_url = $job->company->image;
                            ?>
                            <img class="w-[5rem] h-[5rem] object-cover" src="{{url("/storage/$image_url")}}" alt=""/>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-bold">{{$job->title}}</div>
                            <div class="text-[1rem] flex flex-col">
                                <div class="">{{$job->company->name}}</div>
                            </div>
                        </div>

                        @if(auth()->check())
                        <div id="{{"bookmark_$job->id"}}" class="absolute right-0 text-[#777777]">
                            @if(auth()->user()->bookmarks->pluck('job_id')->contains($job->id))
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative z-[50]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                            @else
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative z-[50]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                            @endif
                        </div>
                        @endif

                        <script>
                            $('{{"#bookmark_$job->id"}}').click(function(e) {
                                var current = $(this)
                                e.preventDefault();

                                $.ajax({
                                    type: "POST",
                                    crossDomain: true,
                                    url: "{{url('/bookmark/' . $job->id)}}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    success: function(response) {
                                        if (response) {
                                            if(current.children("svg").attr('fill') === "currentColor")
                                                current.children("svg").attr('fill',"none");
                                            else
                                                current.children("svg").attr('fill',"currentColor");
                                        }
                                    }
                                });
                            })
                        </script>
                    </div>
                    <div class="!BOTTOM flex flex-col gap-1">
                        <div class="!LOCATION flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />
                            </svg>

                            <div class="">
                                {{$job->company->address}}
                            </div>
                        </div>

                        <div class="!SALARY flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />
                            </svg>

                            <div class="">IDR {{rupiah($job->start_salary)}} - {{rupiah($job->end_salary)}}</div>

                        </div>

                        <div class="!LOCATION flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                                <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                            </svg>

                            <div class="">
                                {{$job->experience}} Years
                            </div>
                        </div>

                        <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>


                            <div class="">
                                Updated {{$job->created_at->diffForHumans()}}
                            </div>
                        </div>

                    </div>
                </a>
            @empty
            @endforelse
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/b5d61d1657b3a2b52a0eac9674160707.jpg" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Design UI/UX</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">PT ELANG MANAJEMEN INVESTASI</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Penjaringan, Jakarta--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 20,000,000 - 30,000,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            5 - 10 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-green-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated yesterday--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/7e2f67c11b70058dc79dd44731e3c76a.png" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Creative Graphic Designer</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">PT.MGANIC NATURINDO</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Tangerang, Jakarta--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 5,000,000 - 7,000,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            5 - 10 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-gray-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated 5 days ago--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/d534c03332cfbb062db2460dba7595f7.jpg" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Graphic Design</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">FOREXimf.com</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Bandung--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 3,500,000 - 5,500,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            1 - 3 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-green-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated 42 minutes ago--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/b5d61d1657b3a2b52a0eac9674160707.jpg" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Design UI/UX</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">PT ELANG MANAJEMEN INVESTASI</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Penjaringan, Jakarta--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 20,000,000 - 30,000,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            5 - 10 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-green-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated yesterday--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/7e2f67c11b70058dc79dd44731e3c76a.png" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Creative Graphic Designer</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">PT.MGANIC NATURINDO</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Tangerang, Jakarta--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 5,000,000 - 7,000,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            5 - 10 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-gray-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated 5 days ago--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="!ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">--}}
{{--                <div class="!TOP flex gap-8 flex col relative">--}}
{{--                    <div class="">--}}
{{--                        <img class="w-[5rem] h-[5rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/d534c03332cfbb062db2460dba7595f7.jpg" alt=""/>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col">--}}
{{--                        <div class="font-bold">Graphic Design</div>--}}
{{--                        <div class="text-[1rem] flex flex-col">--}}
{{--                            <div class="">FOREXimf.com</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="absolute right-0 text-[#777777]">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="!BOTTOM flex flex-col gap-1">--}}
{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            Bandung--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!SALARY flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />--}}
{{--                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            IDR 3,500,000 - 5,500,000--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!LOCATION flex items-center gap-2">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />--}}
{{--                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />--}}
{{--                        </svg>--}}

{{--                        <div class="">--}}
{{--                            1 - 3 Years--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="!UPDATED flex items-center gap-2 text-[0.8rem] text-green-500">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />--}}
{{--                        </svg>--}}


{{--                        <div class="">--}}
{{--                            Updated 42 minutes ago--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

        </div>

        <div class="flex items-center justify-center mt-16">
            {{$jobs->links('pagination::bootstrap-4')}}
        </div>

    </div>
@endsection


