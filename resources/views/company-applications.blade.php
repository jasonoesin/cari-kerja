@extends('template')

@section('title', "Applications")

@section('content')
    @php
        function rupiah($value){
            $result = "Rp " . number_format($value,2,',','.');
            return $result;
        }
    @endphp

    <div class="px-16 py-4 text-[1.2rem] mt-4 flex flex-col gap-20">
        @foreach($array as $data)
            <div class="grid grid-cols-[30%_70%] border-b pb-16 border-b-black/30">
                @php
                    $job = $data['job'];
                    $applies = $data['applies'];
                @endphp

                <a href="{{url("./job/$job->id")}}"  class="h-fit !ITEM p-4 border border-[#777777]/40 rounded w-100 text-[1rem] flex flex-col gap-4 bg-white hover:drop-shadow-md cursor-pointer">
                    <div class="!TOP flex gap-8 flex col relative">
                        <div class="flex flex-col">
                            <div class="font-bold">{{$job->title}}</div>
                            <div class="text-[1rem] flex flex-col">
                                <div class="">{{$job->company->name}}</div>
                            </div>
                        </div>

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
                    </div>
                </a>

                @if(!$applies)

                    <div class="min-h-[20rem] w-full text-[1rem] flex justify-center mt-2 flex-col items-center gap-8">
                        <div class="flex flex-col gap-4 justify-center items-center text-center mt-16">
                            <img class="w-[10rem] h-[10rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/images/jobs/empty-view.png">
                            <div class="font-bold">
                                Sorry, there were no matching applications found.
                            </div>
                        </div>
                    </div>
                @endif

                <div class="!GRID w-full text-[1rem] flex justify-center mt-2 flex-col items-center gap-8">
                    @foreach($applies as $apply)
                        <div class="product bg-gray-100 max-w-[50rem] w-[50rem] relative drop-shadow-lg">
                            <div class="bg-blue-200 px-4 py-2">Apply Date on {{$apply->created_at->format('d.m.Y')}}</div>
                            <div class="!TOP flex gap-8 flex relative w-full items-center px-4 py-2">
                                <div class="flex flex-col w-full gap-2">
                                    <div class="font-semibold text-[2rem]">
                                        <div class="">{{$apply->user->name}}</div>
                                        <div class="font-normal text-[1.2rem] flex flex-col">
                                            <div class="">{{$apply->user->email}}</div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-[25%_75%]">
                                        <div class="text-gray-500">Location</div>
                                        <div class="">{{$apply->user->location}}</div>
                                    </div>

                                    @if(json_decode($apply->user->skills))
                                    <div class="grid grid-cols-[25%_75%]">
                                        <div class="text-gray-500">Skills</div>
                                        <div id="" class="flex flex-row gap-2 w-full flex-wrap max-w-[40rem]">

                                                @foreach(json_decode($apply->user->skills) as $skill)
                                                    <div class="cursor-pointer font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border hover:bg-[#aaaaaa] w-fit">
                                                        {{$skill}}
                                                    </div>
                                                @endforeach

                                        </div>
                                    </div>
                                    @endif

                                    @if($apply->user->experiences && $apply->user->experiences->count() != 0)
                                        <div class="grid grid-cols-[25%_75%] my-2">
                                            <div class="text-gray-500">Experiences</div>
                                            <div class="flex flex-col gap-4">
                                                @foreach($apply->user->experiences as $experience)
                                                    @if($loop->index == 0)
                                                        <div class="flex flex-col relative">
                                                            <div class="font-bold">
                                                                {{$experience->title}}
                                                            </div>
                                                            <div class="flex gap-1 text-[0.9rem] text-black/40 font-semibold">
                                                                <div class="">
                                                                    {{$experience->company_name}},
                                                                </div>
                                                                <div class="">
                                                                    {{$experience->type}}
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                {{$experience->description}}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex flex-col border-t pt-2 border-t-black/40 relative">
                                                            <div class="font-bold">
                                                                {{$experience->title}}
                                                            </div>
                                                            <div class="flex gap-1 text-[0.9rem] text-black/40 font-semibold">
                                                                <div class="">
                                                                    {{$experience->company_name}},
                                                                </div>
                                                                <div class="">
                                                                    {{$experience->type}}
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                {{$experience->description}}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif


                                    @if($apply->user->educations && $apply->user->educations->count() != 0)
                                        <div class="grid grid-cols-[25%_75%] my-2">
                                            <div class="text-gray-500">Educations</div>
                                            <div class="flex flex-col gap-4">
                                                @foreach($apply->user->educations as $education)
                                                    @if($loop->index == 0)
                                                        <div class="flex flex-col relative">
                                                            <div class="font-bold">
                                                                {{$education->school}}
                                                            </div>
                                                            <div class="flex gap-1 text-[0.9rem] text-black/40 font-semibold">
                                                                <div class="">
                                                                    {{$education->degree}},
                                                                </div>
                                                                <div class="">
                                                                    {{$education->field_of_study}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex flex-col border-t pt-2 border-t-black/40 relative">
                                                            <div class="font-bold">
                                                                {{$education->school}}
                                                            </div>
                                                            <div class="flex gap-1 text-[0.9rem] text-black/40 font-semibold">
                                                                <div class="">
                                                                    {{$education->degree}},
                                                                </div>
                                                                <div class="">
                                                                    {{$education->field_of_study}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="grid grid-cols-[25%_75%] items-center text-gray-500">
                                        <div class="">Resume</div>
                                        <a href="{{url("storage/$apply->resume")}}" download class="flex items-center gap-2 text-[0.9rem] font-semibold cursor-pointer hover:bg-gray-200 w-fit px-2 py-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                            </svg>
                                            <div class="">Download</div>
                                        </a>


                                    </div>
                                </div>
                            </div>

                            <div class="px-4 font-semibold py-2">
                                Apply Phase
                            </div>

                            <div class="px-4 py-4 w-full flex flex-row grid grid-cols-5 relative">
                                <div class="absolute w-[76%] bg-blue-300 h-0.5 top-6 left-[6rem]">
                                </div>
                                <div class="flex flex-col items-center gap-2 relative">
                                    <div class="h-5 w-5 {{$apply->phase == 0 ? "bg-green-300": "bg-blue-300"}} rounded-[50%]"></div>
                                    <div class="w-[10rem] text-center">
                                        Waiting for Company's Respond
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-2 relative">
                                    <div class="h-5 w-5 {{$apply->phase == 1 ? "bg-green-300": "bg-blue-300"}} rounded-[50%]"></div>
                                    <div class="w-[10rem] text-center">
                                        Interview Details Sent By Email
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-2 relative">
                                    <div class="h-5 w-5 {{$apply->phase == 2 ? "bg-green-300": "bg-blue-300"}} rounded-[50%]"></div>
                                    <div class="w-[10rem] text-center">
                                        Interview Phase
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-2 relative">
                                    <div class="h-5 w-5 {{$apply->phase == 3 ? "bg-green-300": "bg-blue-300"}} rounded-[50%]"></div>
                                    <div class="w-[10rem] text-center">
                                        Waiting for Interview Results
                                    </div>
                                </div>

                                <div class="flex flex-col items-center gap-2 relative">
                                    <div class="h-5 w-5 {{$apply->phase == 4 ? "bg-green-300": "bg-blue-300"}} rounded-[50%]"></div>
                                    <div class="w-[10rem] text-center">
                                        Application Review Done
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-center pb-6 pt-2">
                                @if($apply->phase == 0)
                                <form method="post" action="{{route('apply.update', [$id = $apply->id])}}">
                                    @csrf
                                    <button type="submit" class="hover:bg-blue-700 px-4 py-2 rounded font-bold text-gray-100 bg-blue-500">Interview Details have been sent to employee candidate</button>
                                </form>
                                @elseif($apply->phase == 2)
                                    <form method="post" action="{{route('apply.update', [$id = $apply->id])}}">
                                        @csrf
                                        <button type="submit" class="hover:bg-blue-700 px-4 py-2 rounded font-bold text-gray-100 bg-blue-500">Interview had finished</button>
                                    </form>

                                @elseif($apply->phase == 3)
                                    <div class="flex gap-8">
                                        <form class="" method="post" action="{{route('apply.accept', [$id = $apply->id])}}">
                                            @csrf
                                            <button type="submit" class="hover:bg-green-700 px-4 py-2 rounded font-bold text-gray-100 bg-green-500">Accept Interviewee</button>
                                        </form>
                                        <form class="" method="post" action="{{route('apply.decline', [$id = $apply->id])}}">
                                            @csrf
                                            <button type="submit" class="hover:bg-red-700 px-4 py-2 rounded font-bold text-gray-100 bg-red-500">Decline Interviewee</button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            @if($apply->phase == 4)
                                <div class="flex py-2 px-4 gap-4 mb-2">
                                    <div class="text-gray-500">Status : </div>
                                    <div class="{{$apply->accepted ? "text-green-400" : "text-red-400"}}">{{$apply->accepted ? "Accepted" : "Declined"}}</div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection


