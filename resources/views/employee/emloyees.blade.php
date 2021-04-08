<x-app-layout>
    <x-slot name="content">
        <div class="employees">
            <div class="header">
                <div class="label">EMPLOYEES DETAILS</div>
                <hr>
                <div class="table-header">
                    <div class="parameter center">USER</div>
                    <div class="parameter">NAME</div>
                    <div class="parameter">POSITION</div>
                    <div class="parameter">PHONE</div>
                    <div class="parameter">EMAIL</div>
                    <div class="parameter center add"><button class="addEmployeeBtn"><i
                                class="fas fa-plus-circle"></i></button></div>
                </div>
            </div>
            <hr>
            @foreach($employees as $employee)
                <div class="table-row">
                    <div class="value center user"><i class="fas fa-user-circle"></i></div>
                    <div class="value  name">{{ $employee->name }}</div>
                    <div class="value">@if($employee->type == 1) Admin @else Employee @endif</div>
                    <div class="value">{{ $employee->telephone }}</div>
                    <div class="value">{{ $employee->email }}</div>
                    <div class="value center edit"><a href="{{ route('update.staff.get', $employee->id) }}" class="editEmployeeBtn"><i class="fas fa-pen"></i></a></div>
                </div>
            @endforeach
            <hr>
        </div>
        @section('form')

        <!-- ADD EMPLOYEE FORM -->
            <div class="add_employee_form">
                <form method="POST" action="{{ route('add.staff') }}" id="modal_content2">
                    @csrf
                    @method('POST')
                    <h1 class="add_employee_header">ADD EMPLOYEE</h1>
                    <div class="element">
                        <label for="names">Name</label>
                        <input type="text" value="{{old("name")}}" name="name" spellcheck="false" placeholder="" id="names">
                    </div>
                    <div class="element">
                        <label for="position">Position</label>
                        <select name="type" id="position">
                            <option value="1">Admin</option>
                            <option value="0">Employee</option>
                        </select>
                    </div>
                    <div class="element">
                        <label for="phone">Phone</label>
                        <input type="text" name="telephone" value="" spellcheck="false" placeholder="" id="phone">
                    </div>
                    <div class="element">
                        <label for="emails">Email</label>
                        <input type="email" name="email" value="" spellcheck="false" placeholder="" id="emails">
                    </div>
                    <div class="add_employee_footer">
                        <button class="cancelBtn2" form="">Cancel</button>
                        <button type="update" form="modal_content2" value="Submit">Add</button>
                    </div>
                </form>
            </div>
        @endsection
        @section('js')
            <script src="{{ asset('assets/js/employees.js') }}"></script>
        @endsection
    </x-slot>
</x-app-layout>
