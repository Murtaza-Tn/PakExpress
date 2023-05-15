<!DOCTYPE html>
<html lang="en">

    <head>

        @include('home.head')
    </head>

    <body>

        @include('sweetalert::alert')

        @include('home.header')

        <section id="page-header" class="about-header">
          <h2>#KnowUs</h2>
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </section>

        <section id="about-head" class="section-p1">
            <img src="home/img/about/a6.jpg" alt="">
            <div>
                <h2>Who We Are?</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Assumenda quos reprehenderit veritatis alias obcaecati sit
                    adipisci officiis, mollitia, ipsa dolores perferendis vero quaerat
                    blanditiis optio deserunt maiores sint autem saepe placeat sunt.
                    Porro ducimus architecto laudantium explicabo odit voluptates minus
                    repellendus.
                </p>

                <abbr title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Porro temporibus error quod alias dignissimos adipisci? Dolorem ratione minima distinctio pariatur.
                </abbr>

                <br><br>

                <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Fugiat amet unde a, totam ipsum rem.
                </marquee>
            </div>
        </section>


        <section id="about-app" class="section-p1">

            <h1>Download Our <a href="#">App</a></h1>
            <div class="video">
                <video autoplay muted loop src="home/img/about/1.mp4"></video>
            </div>
        </section>

        <section id="feature" class="section-p1">
            <div class="fe-box">
              <img src="home/img/features/f1.png" alt="">
              <h6>Free Shipping</h6>
            </div>
            <div class="fe-box">
              <img src="home/img/features/f2.png" alt="">
              <h6>Online Order</h6>
            </div>
            <div class="fe-box">
              <img src="home/img/features/f3.png" alt="">
              <h6>Save Money</h6>
            </div>
            <div class="fe-box">
              <img src="home/img/features/f4.png" alt="">
              <h6>Promotions</h6>
            </div>
            <div class="fe-box">
              <img src="home/img/features/f5.png" alt="">
              <h6>Happy Sell</h6>
            </div>
            <div class="fe-box">
              <img src="home/img/features/f6.png" alt="">
              <h6>F24/7 Support</h6>
            </div>
          </section>



          @include('home.newslater')



        @include('home.footer')

        <script src="script.js"></script>
    </body>

</html>
