@extends('template')

@section('title', "Create a Job")

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>

    <div class="px-16 py-4 text-[2rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center">
            <form enctype="multipart/form-data" action="" method="post" class="min-w-[40rem] flex flex-col gap-8">
                @csrf

                <div class="text-center font-bold">Add a new Job</div>

                @if($errors->all())
                    <div class="text-[1rem] text-red-500 flex flex-col gap-2 bg-red-200 rounded px-4 py-2">
                        @foreach($errors->all() as $error)
                            <div class="">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="text-[1rem] flex flex-col gap-8">
                    <label class="flex flex-col gap-4 font-semibold">
                        Job Title*
                        <input
                            name="title"
                            class="font-normal px-4 py-2 border border-black/30 rounded-sm w-full"
                            placeholder="eg: Data Science Lead, Marketing Manager"
                            type="text">
                    </label>

                    <label class="flex flex-col gap-4 font-semibold">
                        Job Type*
                        <input name="type"
                               class="font-normal px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="eg: Fulltime, Part-Time, Freelancer"
                               type="text">
                    </label>

                    <label class="flex flex-col gap-4 font-semibold">
                        Job Salary Range (in Rupiah)*
                        <input name="start_salary"
                               class="font-normal px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="eg : Start Salary : Rp 4.500.000"
                               type="number">

                        <input name="end_salary"
                               class="font-normal px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="eg : End Salary : Rp 8.500.000"
                               type="number">
                    </label>

                    <label class="flex flex-col gap-4 font-semibold">
                        Job Minimum Experience in year(s)*
                        <input name="experience"
                               class="font-normal px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="eg : 1 year, 2 year, etc"
                               type="number">
                    </label>

                    <label class="flex flex-col gap-4 font-semibold">
                        Skills Needed (Click on skill to remove)*
                        <span class="flex gap-16">
                            <input id="skill_value"
                                   class="font-normal px-4 py-2 border border-black/30 rounded-sm w-[50%]"
                                   placeholder="eg : Public Speaking, C++, Laravel"
                                   type="text">
                        <button id="add_button" class="rounded bg-black/50 w-[50%] text-white/80">Add</button>
                        </span>

                        <div id="skills_" class="flex flex-row gap-2 w-full flex-wrap max-w-[40rem]">
                        </div>
                    </label>

                    <label class="flex flex-col gap-4 font-semibold">
                        Job Description*
                        <textarea name="description"
                               class="font-normal min-h-[10rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Brief description about the job's current position"
                               type="text"></textarea>
                    </label>

                </div>

                <div class="mt-4 pb-16 text-[1.2rem]">
                    <div class="flex relative pb-16">
                        <button
                            type="submit"
                            class="w-[20rem] absolute bottom-0 left-[25%] bg-[#fff240] font-bold px-8 py-4 z-[3]">Add Job</button>
                        <button type="submit" class="w-[20rem] absolute bottom-0 left-[25%] bg-[#ec272b] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">Add Job</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function (){
            index = 0

            $('#add_button').click((e)=> {
                e.preventDefault()
                var main = $('<div class="w-fit"> </div>')

                var div = $('<input hidden>')
                main.text($('#skill_value').val())
                main.attr('class', "cursor-pointer font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border hover:bg-[#aaaaaa] w-fit")
                div.val($('#skill_value').val())
                div.attr('name', "skills[]")
                index++

                main.append(div)

                $('#skills_').append(main)

                main.click(function(){
                    $(this).hide()
                })
            })
        });
    </script>
@endsection




