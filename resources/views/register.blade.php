@extends('template')

@section('title', "Register")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center">
            <form class="min-w-[40rem] flex flex-col gap-8">
                <div class="text-center font-bold">Let's Create Your Profile</div>
                <div class="grid grid-cols-2 text-[1rem] gap-8">
                    <label>
                        <input name="first_name"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="First Name"
                               type="text">
                    </label>
                    <label>
                        <input name="last_name"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Last Name"
                               type="text">
                    </label>
                    <label>
                        <input name="email"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Email"
                               type="email">
                    </label>
                    <label>
                        <input name="location"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Location"
                               type="text">
                    </label>
                    <label>
                        <input name="password"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Password"
                               type="password">
                    </label>

                    <label>
                        <input name="confirm_password"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Password Confirmation"
                               type="password">
                    </label>
                </div>

                <div class="">
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


