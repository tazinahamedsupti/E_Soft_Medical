<div class="sidenav">
    <button class="dropdown-btn">Reception & Billing
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/new_patient" class="">New Patient entry</a>
        <a href="/patient_list" class="">Patient List</a>
        <a href="/payment_collection" class="">Payment / Due Collection</a>
        <!-- <a href="#" class="">Collection History</a>
        <a href="#" class="">Patient List/ Search Patient</a>
        <a href="#" class="">Doctor Referral Payment</a>
        <a href="#" class="">Doctor Wise Test Category Income</a>
        <a href="#" class="">Daily Test Category Wise Report</a>
        <a href="#" class="">View My Transaction</a>
        <a href="#" class="">View All Transaction</a>
        <a href="#" class="">Expaenee Entry</a>
        <a href="#" class="">Expense Summery</a>
        <a href="#" class="">Cash Book</a> -->
    </div>

    <button class="dropdown-btn">Lab Section / Report
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#" class="">Add Test Result</a>
        <a href="/patient_list" class="">Patient List / Search Patient</a>
        <!-- <a href="#" class="">Add test - Report Format</a>
        <a href="#" class="">Test Category Entry</a>
        <a href="#" class="">Test Category Wise Report</a>
        <a href="#" class="">Patient Summery</a>
        <a href="#" class="">Report Done Status</a> -->
    </div>

    <button class="dropdown-btn">Account
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <!-- <a href="#" class="">Profile</a> -->
        <a class="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="background: transparent; border: transparent; color:aliceblue;">Sign out</button>
            </form>
        </a>
    </div>
</div>

