<!DOCTYPE html>
<html lang="en">

    <head>

        @include('home.head')

    </head>

    <body>


        @include('sweetalert::alert')

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


        @include('home.newslater')


        @include('home.footer')



        @include('home.script')

        <script src="home/script.js"></script>
    </body>

</html>
