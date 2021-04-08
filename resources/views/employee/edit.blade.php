<x-app-layout>
    <x-slot name="content">
        <!-- EDIT EMPLOYEE FORM -->

        <form action="{{route('staffupdate', $user->id )}}" method="POST" id="edit_employee_form">
            @csrf
            @method('POST')
            <h1 class="edit_employee_header">EDIT EMPLOYEE ACCOUNT</h1>
            <x-jet-validation-errors />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <hr>
            <div class="element">
                <label for="names">Name</label>
                <input type="text" value="{{old("name",$user->name)}}" name="name" spellcheck="false" placeholder="" id="names" required>
            </div>

            <div class="element">
                <label for="position">Position</label>
                <select name="type" id="position">
                    <option value="1" {{ old("type",$user->type) == '1' ? 'selected':'' }}>Admin</option>
                    <option value="0" {{ old("type",$user->type) == '0' ? 'selected':'' }}>Employee</option>
                </select>
            </div>
            <div class="element">
                <label for="phone">Phone</label>
                <input type="text" name="telephone"  value="{{old("telephone",$user->telephone)}}" spellcheck="false" placeholder="" id="phone"
                       required>
            </div>
            <div class="element">
                <label for="emails">Email</label>
                <input type="email" name="email" value="{{old("email",$user->email)}}" spellcheck="false" placeholder="" id="emails" required>
            </div>
            <div class="element">
                <label for="position">New Password</label>
                <select name="new_password" id="position">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <hr>
            <div class="edit_employee_footer">
                <!-- <button class="cancelBtn2" form="">Cancel</button> -->
                <button type="update" form="edit_employee_form" value="Submit">Update</button>
            </div>
        </form>
        @section('js')
            <script src="{{ asset('assets/js/employees.js') }}"></script>
        @endsection
    </x-slot>
</x-app-layout>
