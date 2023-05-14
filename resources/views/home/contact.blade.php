<!DOCTYPE html>
<html lang="en">

    <head>

        @include('home.head')
    </head>

    <body>
        @include('sweetalert::alert')


        @include('home.header')

        <section id="page-header" class="about-header">
          <h2>#let's_talk</h2>
          <p>LEAVE A MESSAGE, WE LOVE TO HEAR FROM You!</p>
        </section>

        <section id="contact-details" class="section-p1">
            <div class="details">
                <span>GET IN TOUCH</span>
                <h2>Visit our agency location or contact us today</h2>
                <h3>Head Office</h3>
                <div>
                    <li>
                        <i class="fal fa-map"></i>
                        <p>abc street Islamabad Pakistan</p>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <p>pakexpress.in@gmail.com</p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>+92 231 9063 715 / +92 307 3962 634</p>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <p>Monday to Saturday: 08:00am to 12:00pm</p>
                    </li>
                </div>
            </div>

            <!-- Map -->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d212525.
                64746921707!2d72.8703003534817!3d33.66459138151945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!3m3!1m2!1s0x38dfbfd07891722f%3A0x6059515c3bdb02b6!2sIslamabad%2C%20Islamabad%20Capital%20
                Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1683466464695!5m2!1sen!2s" width="600" height="450"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <section id="form-details">
            <form action="{{url('update_msg')}}" method="POST">
                @csrf
                <span>LEAVE A MESSAGE</span>
                <h2>We To Love To Hear From You</h2>
                <input type="text" name="name" placeholder="Your Name">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                <button type="submit" class="normal">Submit</button>
            </form>

            <div class="people">
                <div>

                    <img src="home/img/people/3.png" alt="">
                    <p><span>Murtaza Ali</span>Founder <br> Phone: +92 321 9063 715 <br>Email: murtaza@gmail.com</p>
                </div>
                <div>
                    <img src="home/img/people/1.png" alt="">
                    <p><span>Imran Ali</span>Co-Founder & CEO<br> Phone: +92 307 3962 634<br>Email: imran@gmail.com</p>
                </div>
                <div>
                    <img src="home/img/people/2.png" alt="">
                    <p><span>Abdullah</span>Co-Founder<br> Phone: +92 303 3122 145 <br>Email: abdullah@gmail.com</p>
                </div>
            </div>
        </section>

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
        <script src="script.js"></script>
    </body>

</html>
