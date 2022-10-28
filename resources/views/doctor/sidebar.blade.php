<div class="sidenav">
    <button class="dropdown-btn">Doctor Pannel
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#" class="">Expaenee Entry</a>
        <a href="#" class="">Expense Summery</a>
        <a href="#" class="">Cash Book</a>
    </div>

    

    <button class="dropdown-btn">Account
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#" class="">Profile</a>
        <a class="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="background: transparent; border: transparent; color:aliceblue;">Sign out</button>
            </form>
        </a>
    </div>
</div>