@extends('template')

@section('title', auth()->user()->name)

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
                            <button id="button_desc" class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="">
                                ADD/UPDATE A DESCRIPTION ABOUT ME
                            </span></button>
                        </div>
                    </div>
                </div>

                <div class="w-[75%]">
                    <div class="text-[1.5rem] font-bold pb-2 border-b border-b-2 border-black/30">WORK EXPERIENCES</div>

                    <div class="px-2 py-8 text-center flex flex-col gap-4">
                        <div class="">77.9% of employers surveyed consider work experience to be a crucial data point in job applications. So be sure to fill up this section to raise your chances of securing an interview!</div>
                        <div class="w-full flex justify-center">
                            <button id="button_work" class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
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
                            <button id="button_education" class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
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
                            <button id="button_skill" class="font-bold text-blue-600 flex justify-center gap-2 px-4 py-2 hover:bg-gray-200 rounded">
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

        <div id="modal_desc" class="!MODAL w-full h-[100vh] bg-black/50 fixed inset-0 z-10 flex justify-center flex-col hidden">
            <div class="w-full flex justify-center">
                <div class="relative WHITE-CARD w-[30rem] bg-white rounded h-fit pb-8 opacity-100 py-4 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close w-6 h-6 absolute top-4 right-4 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <div class="mt-8  now flex flex-col gap-4">
                        <div class="text-[1.2rem] text-center">
                            About Me
                        </div>

                        <div class="flex gap-4 items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                            </svg>
                            <div class="">
                                Description (100 words maximum)*
                            </div>
                        </div>

                        <form action="" method="POST"  class="w-full flex flex-col gap-4">
                            @csrf

                            <textarea name="description"
                                      class="font-normal min-h-[5rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                                      placeholder="Brief description about you"
                                      type="text"></textarea>

                            <button type="submit" class="bg-[#017eb7] px-16 py-6 font-bold w-full text-white text-[1rem] flex items-center justify-center gap-2" id="btn-file" >
                                UPDATE NOW
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_work" class="!MODAL w-full h-[100vh] bg-black/50 fixed inset-0 z-10 flex justify-center flex-col hidden">
            <div class="w-full flex justify-center">
                <div class="relative WHITE-CARD w-[30rem] bg-white rounded h-fit pb-8 opacity-100 py-4 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close w-6 h-6 absolute top-4 right-4 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <div class="mt-8  now flex flex-col gap-4">
                        <div class="text-[1.2rem] text-center">
                            About Me
                        </div>

                        <div class="flex gap-4 items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                            </svg>
                            <div class="">
                                Description (100 words maximum)*
                            </div>
                        </div>

                        <form action="" method="POST"  class="w-full flex flex-col gap-4">
                            @csrf

                            <textarea name="description"
                                      class="font-normal min-h-[5rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                                      placeholder="Brief description about you"
                                      type="text"></textarea>

                            <button type="submit" class="bg-[#017eb7] px-16 py-6 font-bold w-full text-white text-[1rem] flex items-center justify-center gap-2" id="btn-file" >
                                UPDATE NOW
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_education" class="!MODAL w-full h-[100vh] bg-black/50 fixed inset-0 z-10 flex justify-center flex-col hidden">
            <div class="w-full flex justify-center">
                <div class="relative WHITE-CARD w-[30rem] bg-white rounded h-fit pb-8 opacity-100 py-4 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close w-6 h-6 absolute top-4 right-4 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <div class="mt-8  now flex flex-col gap-4">
                        <div class="text-[1.2rem] text-center">
                            About Me
                        </div>

                        <div class="flex gap-4 items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                            </svg>
                            <div class="">
                                Description (100 words maximum)*
                            </div>
                        </div>

                        <form action="" method="POST"  class="w-full flex flex-col gap-4">
                            @csrf

                            <textarea name="description"
                                      class="font-normal min-h-[5rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                                      placeholder="Brief description about you"
                                      type="text"></textarea>

                            <button type="submit" class="bg-[#017eb7] px-16 py-6 font-bold w-full text-white text-[1rem] flex items-center justify-center gap-2" id="btn-file" >
                                UPDATE NOW
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_skill" class="!MODAL w-full h-[100vh] bg-black/50 fixed inset-0 z-10 flex justify-center flex-col hidden">
            <div class="w-full flex justify-center">
                <div class="relative WHITE-CARD w-[30rem] bg-white rounded h-fit pb-8 opacity-100 py-4 px-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close w-6 h-6 absolute top-4 right-4 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <div class="mt-8  now flex flex-col gap-4">
                        <div class="text-[1.2rem] text-center">
                            Skills
                        </div>

                        <div class="flex gap-4 items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                            </svg>
                            <div class="">
                                Description (100 words maximum)*
                            </div>
                        </div>

                        <form action="" method="POST"  class="w-full flex flex-col gap-4">
                            @csrf

                            <textarea name="description"
                                      class="font-normal min-h-[5rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                                      placeholder="Brief description about you"
                                      type="text"></textarea>

                            <button type="submit" class="bg-[#017eb7] px-16 py-6 font-bold w-full text-white text-[1rem] flex items-center justify-center gap-2" id="btn-file" >
                                UPDATE NOW
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("#button_desc").click(()=> {
                $("#modal_desc").css("display", "flex").fadeIn(200)
            })

            $("#button_work").click(()=> {
                $("#modal_work").css("display", "flex").fadeIn(200)
            })

            $("#button_education").click(()=> {
                $("#modal_education").css("display", "flex").fadeIn(200)
            })

            $("#button_skill").click(()=> {
                $("#modal_skill").css("display", "flex").fadeIn(200)
            })

            $(".close").click(()=> {
                $("#modal_desc").fadeOut(200)
                $("#modal_work").fadeOut(200)
                $("#modal_education").fadeOut(200)
                $("#modal_skill").fadeOut(200)
            })
        })
    </script>

@endsection




