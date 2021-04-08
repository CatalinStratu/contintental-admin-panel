<x-app-layout>
    <x-slot name="content">
        <!-- EDIT EMPLOYEE FORM -->

        <form action="{{route('update.room.post', $room->id )}}" method="POST" id="edit_room_form">
            @csrf
            @method('POST')
            <h1 class="edit_room_header">EDIT ROOM DETAILS</h1>
            <hr>
            <div class="element">
                <label for="namer">Name</label>
                <input type="text" name="name" value="{{old("name",$room->name)}}" spellcheck="false" placeholder="" id="namer" required>
            </div>
            <div class="element">
                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="1">Single</option>
                    <option value="2">Double</option>
                    <option value="3">Queen</option>
                    <option value="4">Twin</option>
                    <option value="5">Quad</option>
                </select>
            </div>
            <div class="element">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="Empty">Empty</option>
                    <option value="Occupied">Occupied</option>
                    <option value="Cleaning">Cleaning in progress</option>
                    <option value="Reparation">Reparation</option>
                </select>
            </div>
            <hr>
            <div class="edit_room_footer">
                <!-- <button class="cancelBtn2" form="">Cancel</button> -->
                <button type="update" form="edit_room_form" value="Submit">Update</button>
            </div>
        </form>

        @section('js')
            <script src="{{ asset('assets/js/rooms.js') }}"></script>
        @endsection
    </x-slot>
</x-app-layout>
