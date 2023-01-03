@extends('template')

@section('title', "Create a Company")

@section('content')
    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 mt-12">

        <div class="!CONTAINER flex justify-center items-center">
            <form class="min-w-[40rem] flex flex-col gap-8">
                <div class="text-center font-bold">Create a Company</div>

                <div class="text-[1rem] flex flex-col gap-8">
                    <label class="flex flex-col gap-4">
                        Company Name*
                        <input
                            name="name"
                            class="px-4 py-2 border border-black/30 rounded-sm w-full"
                            placeholder="Add your company name"
                            type="text">
                    </label>

                    <label class="flex flex-col gap-4">
                        Company Logo*

                        <span class="flex items-center">
                            <input name="logo"
                                   class="py-2 rounded-sm"
                                   placeholder="Add your company name"
                                   type="file">
                            <span class="">Acceptable Format : jpg, jpeg, png</span>
                        </span>



                    </label>

                    <label class="flex flex-col gap-4">
                        Company Website*
                        <input name="website"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="www.mycompany.com"
                               type="text">
                    </label>

                    <label class="flex flex-col gap-4">
                        Company Size*
                        <input name="name"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Select a company size"
                               type="text">
                    </label>

                    <label class="flex flex-col gap-4">
                        Company Industry*
                        <input name="name"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Which industry your company belong to ?"
                               type="text">
                    </label>

                    <label class="flex flex-col gap-4">
                        Company Description*
                        <textarea name="name"
                               class="min-h-[5rem] px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Brief description about your company"
                               type="text"></textarea>
                    </label>

                    <label class="flex flex-col gap-4">
                        Company Location*
                        <input name="location"
                               class="px-4 py-2 border border-black/30 rounded-sm w-full"
                               placeholder="Where is your company located ?"
                               type="text">
                    </label>

                </div>

                <div class="mt-4 pb-16">
                    <div class="flex relative pb-16">
                        <button
                            type="submit"
                            class="w-[20rem] absolute bottom-0 left-[25%] bg-[#fff240] font-bold px-8 py-4 z-[3]">Create My Company</button>
                        <button type="submit" class="w-[20rem] absolute bottom-0 left-[25%] bg-[#ec272b] font-bold px-8 py-4 translate-y-1.5 translate-x-1.5 z-[2]">Create My Company</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


