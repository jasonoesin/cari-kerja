@extends('template')

@section('title', "Login")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center">
            <form action="" method="post" class="min-w-[40rem] flex flex-col gap-8">
                @csrf
                <div class="text-center font-bold text-[2rem]">Sign In</div>

                @if($errors->all())
                    <div class="text-[1rem] text-red-500 flex flex-col gap-2 bg-red-200 rounded px-4 py-2">
                        @foreach($errors->all() as $error)
                            <div class="">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="w-full flex justify-center text-[1rem] flex-col gap-4">

                    <div class="w-full flex justify-center">
                        <label class="w-[50%]">
                            <input name="email"
                                   class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                                   placeholder="Email"
                                   type="email">
                        </label>
                    </div>

                    <div class="w-full flex justify-center">
                        <label class="w-[50%]">
                            <input name="password"
                                   class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                                   placeholder="Password"
                                   type="password">
                        </label>
                    </div>
                </div>

                <div class="pb-16">
                    <div class="flex relative pb-16">
                        <button
                            type="submit"
                            class="w-[20rem] absolute bottom-0 left-[25%] bg-[#fff240] font-bold px-8 py-4 z-[3]">Sign In</button>
                        <button type="submit" class="w-[20rem] absolute bottom-0 left-[25%] bg-[#ec272b] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


