<x-app-layout>
    <x-slot name="content">
        <div class="rooms">
            <div class="header">
                <div class="label">ROOMS DETAILS</div>
                <hr>
                <div class="table-header">
                    <div class="parameter center">ROOM</div>
                    <div class="parameter">NAME</div>
                    <div class="parameter">TYPE</div>
                    <div class="parameter">PRICE/NIGHT</div>
                    <div class="parameter">STATUS</div>
                    <div class="parameter center add"><button class="addRoomBtn"><i
                                class="fas fa-plus-circle"></i></button></div>
                </div>
            </div>
            <hr>
            @foreach($rooms as $room)
                <div class="table-row">
                    <div class="value center user">@if( $room->status == 'Empty') <i class="fas fa-door-open"></i> @else <i class="fas fa-door-closed"></i> @endif</div>
                    <div class="value  name">{{ $room->name }}</div>
                    <div class="value">{{ $room->room_type->name }}</div>
                    <div class="value">{{ $room->room_type->price }}$</div>
                    <div class="value">{{ $room->status }}</div>
                    <div class="value center edit"><a href="{{ route('update.room', $room->id) }}" class="editRoomBtn"><i class="fas fa-pen"></i></a></div>
                </div>
            @endforeach
            <hr>
        </div>

    @section('form')
        <!-- ADD ROOM FORM -->

            <div class="add_room_form">
                <form method="POST" action="{{ route('add.room') }}" id="modal_content3">
                    @csrf
                    @method('POST')
                    <x-jet-validation-errors />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="add_room_header">ADD ROOM</h1>
                    <div class="element">
                        <label for="namer">Name</label>
                        <input type="text" name="name" value="" spellcheck="false" placeholder="" id="namer" required>
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
                    <div class="add_room_footer">
                        <button class="cancelBtn3" form="">Cancel</button>
                        <button type="update" form="modal_content3" value="Submit">Add</button>
                    </div>
                </form>
            </div>

        @endsection
        @section('js')
            <script src="{{ asset('assets/js/rooms.js') }}"></script>
        @endsection



    </x-slot>
</x-app-layout>
