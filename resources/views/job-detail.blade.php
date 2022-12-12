@extends('template')

@section('content')

    <div class="bg-[#f3f3f3] w-full flex px-16 py-4 gap-4 text-blue-600 font-bold">
        <div class="">Jobs</div>
        <div class="">Location</div>
        <div class="">Jakarta</div>
        <div class="">Design UI/UX</div>
    </div>

    <div class="px-16 py-4 text-[1.2rem] flex flex-col gap-8 ">
        <div class="!TOP flex gap-8 flex col border-b w-[60%] pb-8 border-b-2">
            <div class="">
                <img class="w-[5rem]" src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/b5d61d1657b3a2b52a0eac9674160707.jpg" alt=""/>
            </div>

            <div class="flex flex-col">
                <div class="font-bold">Design UI/UX</div>

                <div class="text-[1rem] flex flex-col">
                    <div class="">PT ELANG MANAJEMEN INVESTASI</div>
                    <div class="mt-2">IDR 20,000,000 - 30,000,000/Month</div>
                    <div class="">Design</div>
                    <div class="">Full-time</div>
                    <div class="">5 - 10 years of experience</div>
                </div>
            </div>
        </div>

        <div class="!DESC text-[1rem] w-[60%]">
            <div class="font-bold">
                <div class="">Must Have Skills</div>
                <div class="flex py-4 gap-2">
                    <div class="font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border">Managerial Skills</div>
                    <div class="font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border">iOS Design</div>
                    <div class="font-normal px-4 py-1 bg-[#f3f3f3] rounded-3xl border">Android Design</div>
                </div>
            </div>
            <div class="mt-4">
                <div class="font-bold">Job description</div>
                <div class="">
                    <div class="">Job Description :</div>

                    <div class="">
                        Overall responsible for the app/web interface visual design of the securities company's trading platform, controlling company platform design style and optimizing the design specifications;
                        Demonstrate high quality design practices, this includes participation in all aspects of UX, user and competitors research, ideation, strategy, interaction design and visual design;
                        Have a deep understanding of securities/stock brokerage business, be good at conception and creativity, and use a variety of design methods to complete design delivery;
                        Be sensitive to design trends and data, understand the competitor, and actively explore any integration based on trends and other financial products;
                        Lead and mentor a team of designers
                    </div>

                </div>
            </div>

        </div>


        <div class="!ABOUT-COMPANY p-4 border rounded w-[60%] text-[1rem] flex flex-col gap-4">

            <div class="font-bold">About The Company</div>

            <div class="!TOP flex gap-8 flex col">
                <div class="">
                    <img class="w-[5rem]" src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/b5d61d1657b3a2b52a0eac9674160707.jpg" alt=""/>
                </div>

                <div class="flex flex-col">
                    <div class="font-bold">Design UI/UX</div>

                    <div class="text-[1rem] flex flex-col">
                        <div class="">PT ELANG MANAJEMEN INVESTASI</div>
                        <div class="text-gray-600">Financial Services 51 - 200 employees</div>
                    </div>
                </div>
            </div>


            <div class="">
                The company's main business focuses on securities brokerage, securities consulting and asset management, and is committed to become Hong Kong and South East Asia’s most innovative, fast - growing Internet securities company.The company aims to serve global capital through innovative financial technology to invest in the securities markets of Hong Kong and Southeast Asian countries,
            </div>
            <div class="font-bold">
                Office address
            </div>
            <div class="">
                ASG Tower Lt. 11 Unit H Jl. Pantai Indah Kapuk No.1, RT.6/RW.2, Kamal Muara, Kec. Penjaringan,Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14470
            </div>
        </div>
    </div>
@endsection


