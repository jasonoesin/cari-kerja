@extends('template')

@section('title', 'Job Detail')

@section('content')

    <div class="bg-[#f3f3f3] w-full flex px-16 py-4 gap-4 text-blue-600 font-bold">
        <div class="">Jobs</div>
        <div class="text-gray-400">/</div>
        <div class="">Location</div>
        <div class="text-gray-400">/</div>
        <div class="">Jakarta</div>
        <div class="text-gray-400">/</div>
        <div class="">Design UI/UX</div>
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

                <div class="text-[1rem] flex flex-col">
                    <div class="">{{$job->company->name}}</div>
                    <div class="mt-2">IDR {{$job->start_salary}} - {{$job->end_salary}}</div>
                    <div class="">{{$job->type}}</div>
                    <div class="">{{$job->experience}} years of experience</div>
                </div>
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
@endsection


