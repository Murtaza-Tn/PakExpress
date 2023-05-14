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


        {{-- Banner --}}


        @include('home.banner')

        {{-- End Banner --}}



        {{-- body images --}}
        @include('home.body2')

        {{-- End body images --}}


                {{-- Button --}}
                <section>
                    <div id="h-p">
                      <p>Click Here to see our other <strong><em>Products!</em></strong></p>
                    </div>
                    <div id="h-shop">
                      <a href="{{url('shop')}}">Shope</a>
                    </div>
                  </section>



        {{-- Crazy Deal --}}

        @include('home.crazydeal')

        {{-- End Crazy Deal --}}


        {{-- Seasonal Sale --}}
        @include('home.seasonalsale')
        {{-- End Seasonal Sale --}}



        @include('home.newslater')




        {{-- Footer --}}
        @include('home.footer')
        {{-- End Footer --}}


        @include('home.script')
        <script src="home/script.js"></script>
    </body>

</html>
