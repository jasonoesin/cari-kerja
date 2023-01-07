@extends('template')

@section('title', "Create a Job")

@section('content')

    <div class="px-16 py-4 text-[1rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center flex flex-col">
            <div class="!TOP w-full pb-12">
                <div class="font-bold text-[1.5rem]">
                    {{auth()->user()->name}}
                </div>

                <div class="flex flex-col gap-4 mt-2">
                    <div class="">
                        <div class="text-gray-500 font-extrabold">
                            EMAIL
                        </div>
                        {{auth()->user()->email}}
                    </div>
                    <div class="">
                        <div class="text-gray-500 font-extrabold">
                            LOCATION
                        </div>
                        {{auth()->user()->location}}
                    </div>
                    <div class="">
                        <div class="text-gray-500 font-extrabold">
                            ACCOUNT TYPE
                        </div>
                        {{strtoupper(auth()->user()->type)}}
                    </div>
                </div>

            </div>

            <div class="!BOTTOM w-full flex flex-col gap-8">
                <div class="header font-bold text-blue-600">
                    <div class="border-b border-b-blue-600 border-b-4 pb-2 flex gap-2 items-center w-fit">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div class="">
                            PROFILE INFORMATION
                        </div>
                    </div>
                </div>

                <div class="w-[75%]">
                    <div class="text-[1.5rem] font-bold pb-2 border-b border-b-2 border-black/30">ABOUT ME</div>

                    <div class="px-2 py-8 text-center flex flex-col gap-4">
                        <div class="">Tell employers what you can bring to the table.</div>
                        <div class="w-full flex justify-center">
                            <button class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="">
                                ADD A DESCRIPTION ABOUT ME
                            </span></button>
                        </div>
                    </div>
                </div>

                <div class="w-[75%]">
                    <div class="text-[1.5rem] font-bold pb-2 border-b border-b-2 border-black/30">WORK EXPERIENCES</div>

                    <div class="px-2 py-8 text-center flex flex-col gap-4">
                        <div class="">77.9% of employers surveyed consider work experience to be a crucial data point in job applications. So be sure to fill up this section to raise your chances of securing an interview!</div>
                        <div class="w-full flex justify-center">
                            <button class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="">
                                ADD WORK EXPERIENCE
                            </span></button>
                        </div>
                    </div>
                </div>

                <div class="w-[75%]">
                    <div class="text-[1.5rem] font-bold pb-2 border-b border-b-2 border-black/30">EDUCATIONS</div>

                    <div class="px-2 py-8 text-center flex flex-col gap-4">
                        <div class="">Companies aren’t into flings. They want to know all about you. Share where you studied to get 23% more interviews.</div>
                        <div class="w-full flex justify-center">
                            <button class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="">
                                ADD EDUCATION
                            </span></button>
                        </div>
                    </div>
                </div>

                <div class="w-[75%]">
                    <div class="text-[1.5rem] font-bold pb-2 border-b border-b-2 border-black/30">SKILLS</div>

                    <div class="px-2 py-8 text-center flex flex-col gap-4">
                        <div class="">Now’s not the time to be humble. Share what you’re good at to attract the top companies.</div>
                        <div class="w-full flex justify-center">
                            <button class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="">
                                ADD SKILLS
                            </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




