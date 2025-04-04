
<!-- Claneder Start -->
<div class="container-xxl py-5">
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Class Shedule</h6>
            <h1 class="mb-5">NextLevel Calender</h1>
        </div>
<div id="center"  style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <h3 id="monthAndYear"></h3>
    <div class="button-container-calendar" data-wow-delay="0.5s">
        <button id="previous" onclick="previous()">
            ‹ 
        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="next" onclick="next()">
            ›
        </button>
    </div>
    <table class="table-calendar" id="calendar" data-lang="en">
        <thead id="thead-month"></thead>
        <!-- Table body for displaying the calendar -->
        <tbody id="calendar-body"></tbody>
    </table>
    <div class="footer-container-calendar">
        <label for="month">Jump To: </label>
        <!-- Dropdowns to select a specific month and year -->
        <select id="month" onchange="jump()">
            <option value=0>Jan</option>
            <option value=1>Feb</option>
            <option value=2>Mar</option>
            <option value=3>Apr</option>
            <option value=4>May</option>
            <option value=5>Jun</option>
            <option value=6>Jul</option>
            <option value=7>Aug</option>
            <option value=8>Sep</option>
            <option value=9>Oct</option>
            <option value=10>Nov</option>
            <option value=11>Dec</option>
        </select>
        <!-- Dropdown to select a specific year -->
        <select id="year" onchange="jump()"></select>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
<!-- Claneder End -->