<section  id="interface">
    <div class="navigation">
        <div class="n1">
            <div>
                <i id="menu-btn" class="fas fa-bars"></i>
            </div>
            <div class="search">
                <i class="fas">&#xf002;</i>
                <input type="text" placeholder="search">
            </div>
        </div>

        <div class="profile">
            <i class="far fa-bell"></i>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
        </div>
    </div>

    <h3 class="i-name">Dashboard</h3>

    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
            <div>
                <h3>{{$total_product}}</h3>
                <span>Total Product's</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-shopping-cart"></i>
            <div>
                <h3>{{$total_featured_product}}</h3>
                <span>Total Featured Product's</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas">&#xf2b5;</i>
            <div>
                <h3>{{$total_order}}</h3>
                <span>Total Order's</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-dollar-sign"></i>
            <div>
                <h3>{{$total_user}}</h3>
                <span>Total User's</span>
            </div>
        </div>

    </div>

    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
            <div>
                <h3>${{$total_revenue}}</h3>
                <span>Total Revenue</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-shopping-cart"></i>
            <div>
                <h3>{{$total_deliverd}}</h3>
                <span>Order Delivered</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas">&#xf2b5;</i>
            <div>
                <h3>{{$total_processing}}</h3>
                <span>Order Processing</span>
            </div>
        </div>
    </div>


</section>
