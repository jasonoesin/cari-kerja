@extends('template')
@section('title', $job->title . " at " . $job->company->name)

@section('content')
    <div class="">
        <div class="bg-[#f3f3f3] w-full flex px-16 py-4 gap-4 text-blue-600 font-bold">
            <div class="">Jobs</div>
            <div class="text-gray-400">/</div>
            <div class="">Location</div>
            <div class="text-gray-400">/</div>
            <div class="">{{$job->company->address}}</div>
            <div class="text-gray-400">/</div>
            <div class=""> {{$job->title}}</div>
        </div>
        <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 ">
            <div class="!TOP flex gap-8 flex col border-b w-[60%] pb-8 border-b-2">
                <div class="">
                    @php
                        $url = $job->company->image
                    @endphp
                    <img class="w-[5rem] h-[5rem] object-cover" src="{{url("storage/$url")}}" alt=""/>
                </div>

                <div class="flex flex-col">
                    <div class="font-bold">{{$job->title}}</div>

                    @php
                        function rupiah($value){
                            $result = "Rp " . number_format($value,2,',','.');
                            return $result;
                        }
                    @endphp

                    <div class="text-[1rem] flex flex-col">
                        <div class="">{{$job->company->name}}</div>
                        <div class="mt-2">IDR {{rupiah($job->start_salary)}} - {{rupiah($job->end_salary)}}</div>
                        <div class="">{{$job->type}}</div>
                        <div class="">{{$job->experience}} years of experience</div>
                    </div>

                    @if(auth()->user())
                        <div class="flex gap-8 mt-8 font-bold text-white text-[1rem]">
                            @if(auth()->user()->type == 'employee')
                                @if(auth()->user()->applies->pluck('job_id')->contains($job->id))
                                    <button id="" class="px-3 py-2 bg-gray-500 w-[10rem]">APPLIED</button>
                                @else
                                    <button id="apply" class="px-6 py-2 bg-blue-500 w-[10rem]">APPLY</button>
                                @endif
                            @endif
                            @if(auth()->user()->bookmarks->pluck('job_id')->contains($job->id))
                                <button class="px-4 py-2 border border-gray-500 text-gray-500 border-2 w-[10rem]">UNBOOKMARK</button>
                            @else
                                <button class="px-6 py-2 border border-blue-500 text-blue-500 border-2 w-[10rem]">BOOKMARK</button>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="!DESC text-[1rem] w-[60%]">
                <div class="font-bold">
                    <div class="">Must Have Skills</div>
                    <div class="flex py-4 gap-2">

                        @foreach(json_decode($job->skills) as $skill)
                            <div class="font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border">{{$skill}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    <div class="font-bold">Job description</div>
                    <div class="">
                        <div class="">Job Description :</div>

                        <div class="">
                            {{$job->description}}
                        </div>

                    </div>
                </div>

            </div>


            <a href="{{url("/company/" . $job->company->id)}}" class="!ABOUT-COMPANY p-4 border rounded w-[60%] text-[1rem] flex flex-col gap-4 hover:drop-shadow-xl bg-white">

                <div class="font-bold">About The Company</div>

                <div class="!TOP flex gap-8 flex col">
                    <div class="">
                        @php
                            $url = $job->company->image
                        @endphp
                        <img class="w-[5rem] h-[5rem] object-cover" src="{{url("storage/$url")}}" alt=""/>
                    </div>

                    <div class="flex flex-col">
                        <div class="font-bold">{{$job->company->name}}</div>

                        <div class="text-[1rem] flex flex-col">
                            <div class="text-gray-600">{{$job->company->industry}} {{$job->company->size}} employees</div>
                        </div>
                    </div>
                </div>


                <div class="">
                    {{$job->company->description}}
                </div>
                <div class="font-bold">
                    Office Location
                </div>
                <div class="">
                    {{$job->company->address}}
                </div>
            </a>
        </div>
        <div id="modal" class="!MODAL w-full h-[100vh] bg-black/50 fixed inset-0 z-10 flex justify-center flex-col hidden">
            <div class="w-full flex justify-center">
                <div class="relative WHITE-CARD w-[30rem] bg-white rounded h-fit pb-8 opacity-100 py-4 px-8">
                    <svg id="close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-4 right-4 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <div class="mt-8  now flex flex-col gap-4">
                        <div class="text-[1.2rem] text-center">
                            You are about to apply to <b>{{$job->company->name}}</b> as <b>{{$job->title}}</b>

                        </div>

                        <div class="flex gap-4 items-center font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                            </svg>
                            <div class="">
                                Resume*
                            </div>
                        </div>

                        <form enctype="multipart/form-data" action="" method="POST"  class="w-full flex flex-col gap-4">
                            @csrf
                            <button class="bg-[#f2fbfe] px-16 py-6 font-bold w-full text-blue-300 border border-blue-400 border-dashed flex items-center justify-center gap-2" id="btn-file" type="button">
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z' />
                                </svg>
                                Upload My Resume</button>
                            <div id="remove-div" class="cursor-pointer flex gap-2 items-center text-red-500 hidden">
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0' />
                                </svg>
                                <div class="font-bold">
                                    Remove File
                                </div>
                            </div>
                            <input required name="resume" id="input-file" type="file" class="form-control hidden" accept="application/pdf">

                            <script>
                                $("#btn-file").click(function () {
                                    $("#input-file").trigger('click');
                                });

                                $("#input-file").change(function () {
                                    var file = $(this)[0].files[0].name;
                                    var svg = `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z' />
                                </svg>`
                                    $("#btn-file").html(svg + file);
                                    $("#remove-div").css("display", "flex").fadeIn(200);
                                });

                                $("#remove-div").click(()=> {
                                    $("#input-file").val('');
                                    $("#btn-file").html('Upload My Resume');
                                    $("#remove-div").css("display", "hidden").fadeOut();
                                })
                            </script>

                            <button type="submit" class="bg-[#017eb7] px-16 py-6 font-bold w-full text-white text-[1rem] flex items-center justify-center gap-2" id="btn-file" >
                                APPLY NOW
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("#apply").click(()=> {
                $("#modal").css("display", "flex").fadeIn(200)
            })

            $("#close").click(()=> {
                $("#modal").fadeOut(200)
            })
        })
    </script>



@endsection


