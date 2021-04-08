<x-app-layout>
    <x-slot name="content">
        <div class="dashboard">
            <div class="widget">
                <i class="fas fa-user-friends"></i>
                <div class="data">
                    <div class="label">Guest Users</div>
                    <div class="value">{{$data['clients']}}</div>
                </div>
            </div>
            <div class="widget">
                <i class="fas fa-users"></i>
                <div class="data">
                    <div class="label">Employees</div>
                    <div class="value">{{$data['employees']}}</div>
                </div>
            </div>
            <div class="widget">
                <i class="fas fa-door-open"></i>
                <div class="data">
                    <div class="label">Rooms</div>
                    <div class="value">54</div>
                </div>
            </div>
            <div class="widget">
                <i class="fas fa-euro-sign"></i>
                <div class="data">
                    <div class="label">Today's Earnings</div>
                    <div class="value">2K</div>
                </div>
            </div>


            <div class="chart">
                <div class="chart-label">Daily Rooms Occupancy</div>
                <div id="chart-rooms"></div>
            </div>
            <div class="chart">
                <div class="chart-label">Monthly Earnings (€)</div>
                <div id="chart-earnings"></div>
            </div>
        </div>
        @section('js')
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript" src="{{ asset('assets/js/chart-rooms.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/chart-earnings.js') }}"></script>
        @endsection
    </x-slot>
</x-app-layout>
