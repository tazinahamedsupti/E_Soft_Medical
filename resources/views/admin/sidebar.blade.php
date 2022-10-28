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

    <!-- <button class="dropdown-btn">Account Section
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
    </div> -->

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

    <button class="dropdown-btn">Administration
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <!-- <a href="#" class="">Add User Group</a> -->
        <a href="/add_user" class="">Add User</a>
        <!-- <a href="#" class="">Database Repair</a>
        <a href="#" class="">View User</a>
        <a href="#" class="">Add Referral Doctor</a>
        <a href="#" class="">Referral Doctor payment</a>
        <a href="#" class="">Purpose Entry</a>
        <a href="#" class="">Expense Entry</a> -->
        <a href="test_category_entry" class="">Test Category Entry</a>
        <a href="test_entry" class="">test Entry</a>
    </div>

    <!-- <button class="dropdown-btn">Management
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="#" class="">New</a>
        <a href="#" class="">Processed</a>
        <a href="#" class="">Shipped</a>
        <a href="#" class="">Returned</a>
    </div> -->

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