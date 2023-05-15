<!DOCTYPE html>
<html lang="en">

    <head>

        {{-- Head --}}
        @include('home.head')
        {{-- End Head --}}
    </head>

    <body>

        @include('sweetalert::alert')
        {{-- Header --}}


        @include('home.header')


        {{-- End Header --}}

        {{-- Hero  --}}

        @include('home.hero')

        {{-- End Hero  --}}


        {{-- Features --}}
        @include('home.feature')

        {{-- End Features --}}


        {{-- body images --}}
        @include('home.body1')

        {{-- End body images --}}


        {{-- body images --}}
        @include('home.body2')

        {{-- End body images --}}


                {{-- Button --}}
                @include('home.shopnowbutton')



        @include('home.newslater')




        {{-- Footer --}}
        @include('home.footer')
        {{-- End Footer --}}


        @include('home.script')
        <script src="home/script.js"></script>
    </body>

</html>
