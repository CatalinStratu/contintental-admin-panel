<x-app-layout>
    <x-slot name="content">
        <div class="rooms">
            <div class="header">
                <div class="label">ROOMS DETAILS</div>
                <hr>
                <div class="table-header">
                    <div class="parameter center">TYPE</div>
                    <div class="parameter">NAME</div>
                    <div class="parameter">SIZE</div>
                    <div class="parameter">PRICE/NIGHT</div>
                    <div class="parameter">GUESTS</div>
                    <div class="parameter center add"><button class="addRoomBtn"><i
                                class="fas fa-plus-circle"></i></button></div>
                </div>
            </div>
            <hr>
            @foreach($RoomTypes as $type)
                <div class="table-row">
                    <div class="value center user"><i class="fas fa-door-open"></i></div>
                    <div class="value  name">{{ $type->name }}</div>
                    <div class="value">{{ $type->size }}</div>
                    <div class="value">{{ $type->price }}$</div>
                    <div class="value">{{ $type->guests }}</div>
                    <div class="value center edit"><a href="{{ route('update.room', $type->id) }}" class="editRoomBtn"><i class="fas fa-pen"></i></a></div>
                </div>
            @endforeach
            <hr>
        </div>

    @section('form')
        <!-- ADD ROOM FORM -->

            <div class="add_room_form">
                <form method="POST" action="{{ route('add.room.type') }}" id="modal_content3">
                    @csrf
                    @method('POST')
                    <x-jet-validation-errors />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="add_room_header">ADD ROOM TYPE</h1>
                    <div class="element">
                        <label for="namer">Name</label>
                        <input type="text" name="name" value="" spellcheck="false" placeholder="" id="namer" required>
                    </div>
                    <div class="element">
                        <label for="price-night">Price/Night ($)</label>
                        <input type="text" pattern="[\d\.]{2,6}" value="" name="price" spellcheck="false" placeholder="100.50" id="price-night" required="">
                    </div>
                    <div class="element">
                        <label for="price-night">Guests</label>
                        <input type="text"  value="" name="guests" spellcheck="false" placeholder="100.50" id="price-night" required="">
                    </div>
                    <div class="element">
                        <label for="size">Size (m^2)</label>
                        <input type="text" pattern="[\d\.]{2,6}" value="" name="size" spellcheck="false" placeholder="100" id="size" required="">
                    </div>
                    <div class="element">
                        <label for="small_description">Small Description</label>
                        <input type="text"  value="" name="small_description" spellcheck="false" placeholder="100" id="small_description" required="">
                    </div>
                    <div class="element">
                        <label for="description">Description </label>
                        <input type="text"  value="" name="description" spellcheck="false" placeholder="100" id="description" required="">
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
