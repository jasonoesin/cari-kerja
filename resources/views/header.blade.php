<header>
    <div class="fixed bg-white w-full text-black border-b px-16 py-4 flex justify-between z-[10]">
        <div class="LEFT flex gap-4">
            <a href="{{url('/jobs')}}" class="cursor-pointer">JOBS</a>
            <a href="{{url('/companies')}}" class="cursor-pointer">COMPANIES</a>
        </div>
        <div class="RIGHT flex gap-4 pr-8">
            @if(auth()->check())
                <div class="flex flex-col relative">
                    <div id="nav_name" class="cursor-pointer box flex items-center gap-4 border-b border-b-transparent  hover:border-b-gray-400">
                        <div class="">{{auth()->user()->name}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div id="dropdown" class="absolute top-6 border border-black/5 right-0 flex flex-col drop-shadow-xl bg-white w-[12.5rem] rounded hidden">
                        <a href="" class="">
                            <div class="grid grid-cols-[25%_75%] rounded-t hover:bg-gray-200 items-center px-4 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <a href="{{url('/profile')}}" class="text-[0.8rem]">
                                    My Profile
                                </a>
                            </div>
                        </a>
                        @if(auth()->user()->type == 'company')
                            @php
                                $id = null;
                                if (auth()->user()->company)
                                    $id = auth()->user()->company->id;
                                $url = $id ?
                                    url("/company/$id") : url('/company/register');
                            @endphp
                            <a href="{{$url}}" class="">
                                <div class="grid grid-cols-[25%_75%] rounded-t hover:bg-gray-200 items-center px-4 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                    </svg>

                                    <div class="text-[0.8rem]">
                                        My Company
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="" class="">
                                <div class="grid grid-cols-[25%_75%] hover:bg-gray-200 items-center px-4 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                    <div class="text-[0.8rem]">
                                        My Applications
                                    </div>
                                </div>
                            </a>
                        @endif

                        <a href="{{url('/logout')}}" class="">
                            <div class="grid grid-cols-[25%_75%] rounded-b hover:bg-gray-200 items-center px-4 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                <div class="text-[0.8rem]">
                                    Log Out
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <a href="{{url('/register')}}">SIGN UP</a>
                <a href="{{url('/login')}}" class="">LOGIN</a>
            @endif
        </div>
    </div>
</header>


<script>
    $(function (){
        $('#nav_name').click(()=> {
            $('#dropdown').toggle(50)
        })
    })
</script>
