@extends('template')

@section('title', "Applications")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8">
        @if(!$applies->all())
            <div class="flex flex-col gap-4 justify-center items-center text-center mt-16">
                <img class="w-[10rem] h-[10rem]" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/images/jobs/empty-view.png">
                <div class="font-bold">
                    Sorry, there were no matching applications found.
                </div>
                <div class="text-[1.1rem]">
                    Proceed to fill your profile descriptions and apply on different jobs available in CariKerja !
                </div>
            </div>
        @endif

        <div class="!GRID w-full text-[1rem] flex justify-center mt-2">
            @forelse($applies as $apply)
                <div class="product bg-gray-100 max-w-[50rem] w-[50rem] relative drop-shadow-lg">
                    <div class="bg-blue-200 px-4 py-2">Apply Date on {{$apply->created_at->format('d.m.Y')}}</div>
                    <div class="!TOP flex gap-8 flex relative w-full items-center px-4">
                        <div class="w-[10rem] h-[10rem] flex items-center justify-center">
                            @if(Str::contains($apply->job->company->image, 'http'))
                                <img class="w-[7rem] h-[7rem] object-cover" src="{{$apply->job->company->image}}" alt=""/>
                            @else
                                @php
                                $img = $apply->job->company->image
                                @endphp
                                <img class="w-[7rem] h-[7rem] object-cover" src="{{url("$img")}}" alt=""/>
                            @endif
                        </div>

                        <div class="flex flex-col w-full gap-1">
                            <div class="font-semibold text-[2rem]">
                                <div class="">{{$apply->job->company->name}}</div>
                                <div class="font-normal text-[1.2rem] flex flex-col">
                                    <div class="">{{$apply->job->company->industry}}</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-[25%_75%]">
                                <div class="text-gray-500">Location</div>
                                <div class="">{{$apply->job->company->address}}</div>
                            </div>

                            <div class="grid grid-cols-[25%_75%]">
                                <div class="text-gray-500">Job Title</div>
                                <div class="">{{$apply->job->title}}</div>
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
                        @if($apply->phase == 1)
                            <form method="post" action="{{route('apply.update', [$id = $apply->id])}}">
                                @csrf
                                <button type="submit" class="hover:bg-blue-700 px-4 py-2 rounded font-bold text-gray-100 bg-blue-500">Accept terms and confirm interview</button>
                            </form>
                        @endif
                    </div>

                    @if($apply->phase == 4)
                        <div class="flex py-2 px-4 gap-4 mb-2">
                            <div class="text-gray-500">Status : </div>
                            <div class="{{$apply->accepted ? "text-green-400" : "text-red-400"}}">{{$apply->accepted ? "Accepted" : "Declined"}}</div>
                        </div>
                    @endif
                </div>
            @empty


            @endforelse
        </div>
    </div>
@endsection


