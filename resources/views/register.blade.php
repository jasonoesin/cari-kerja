@extends('template')

@section('title', "Register")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center">
            <form method="post" class="min-w-[40rem] flex flex-col gap-8">
                @csrf
                <div class="text-center font-bold text-[2rem]">Let's Create Your Profile</div>

                @if($errors->all())
                    <div class="text-[1rem] text-red-500 flex flex-col gap-2 bg-red-200 rounded px-4 py-2">
                        @foreach($errors->all() as $error)
                            <div class="">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="grid grid-cols-2 text-[1rem] gap-8">
                    <label>
                        <input name="first_name"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="First Name"
                               type="text">
                    </label>
                    <label>
                        <input name="last_name"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Last Name"
                               type="text">
                    </label>
                    <label>
                        <input name="email"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Email"
                               type="email">
                    </label>
                    <label>
                        <input name="location"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Location"
                               type="text">
                    </label>
                    <label>
                        <input name="password"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Password"
                               type="password">
                    </label>

                    <label>
                        <input name="confirm_password"
                               class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Password Confirmation"
                               type="password">
                    </label>
                </div>

                <div class="w-full flex justify-center text-[1rem] ">
                    <label class="w-[50%]">
                        <select id="type" name="type" class="drop-shadow-md px-4 py-2 border border-black/30 rounded-sm w-full">
                            <option class="" value="{{null}}" disabled selected>Select account type</option>
                            <option value="employee">Employee</option>
                            <option value="company">Company</option>
                        </select>
                    </label>
                </div>

                <div class="pb-16">
                    <div class="flex relative pb-16">
                        <button
                            type="submit"
                            class="w-[20rem] absolute bottom-0 left-[25%] bg-[#fff240] font-bold px-8 py-4 z-[3]">Sign Up</button>
                        <button type="submit" class="w-[20rem] absolute bottom-0 left-[25%] bg-[#ec272b] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


