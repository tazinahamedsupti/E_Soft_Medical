<div class="sidenav">
    

    <button class="dropdown-btn">Account Section
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#" class="">View Transaction</a>
        <a href="#" class="">Payment Receive List</a>
        <a href="#" class="">Expense Summery</a>
        <a href="#" class="">Discount Summery</a>
        <a href="#" class="">Doctor Wise Test Category Income</a>
        <a href="#" class="">Daily Test Category Wise Report</a>
        <a href="#" class="">Daily Test report (Doctor Wise)</a>
        <a href="#" class="">Patient List / Search Patient</a>
        <a href="#" class="">Patient Summery</a>
        <a href="#" class="">Search Patient</a>
        <a href="#" class="">Doctor Referral Payment</a>
        <a href="#" class="">Add Income / Expense</a>
        <a href="#" class="">Expense Entry</a>
        <a href="#" class="">Financial Statement</a>
        <a href="#" class="">Collection History</a>
        <a href="#" class="">Daily Referral Paid Summery</a>
        <a href="#" class="">Daily Referral Due Summery</a>
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