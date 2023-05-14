<!DOCTYPE html>
<html lang="en">

    <head>

        @include('home.head')

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>

    <body>



        @include('home.header')

        <section id="page-header" class="blog-header">
          <h2>#readmore</h2>
          <p>Read all case studies about our products!</p>
        </section>

        <section id="blog">
            @foreach ($blog as $blogs)

            <div class="blog-box">
                <div class="blog-video">
                    <iframe width="560" height="315" src="{{$blogs->blog_image}}"
                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                    encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                  </iframe>
                  </div>
                <div class="blog-details">
                    <h4>{{$blogs->blog_title}}</h4>
                    <p>{{$blogs->blog_description}}
                    </p>
                    <a href="#">{{$blogs->blog_view_btn}}</a>
                </div>
                <h1>{{$blogs->blog_number}}</h1>
            </div>
            @endforeach


        </section>



        <span style="margin: 20px">
            {!!$blog->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>

        <section id="newsletter" class="section-p1 section-m1">
          <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>spcial offers.</span></p>
          </div>
          <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
          </div>
        </section>


        @include('home.footer')



        @include('home.script')

        <script src="home/script.js"></script>
    </body>

</html>
