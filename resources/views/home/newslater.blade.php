<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>Get E-mail updates about our latest shop and <span>spcial offers.</span></p>
    </div>
    <div id="form">
        <form action="{{url('email_newsletter')}}" method="GET">

            <input name="email" type="email" placeholder="Your email address">
            <button type="submit" class="normal">Sign Up</button>
        </form>
    </div>
  </section>
