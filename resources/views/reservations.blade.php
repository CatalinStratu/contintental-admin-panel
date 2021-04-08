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
            <div class="table-row">
                <div class="value center user"><i class="fas fa-door-open"></i></div>
                <div class="value  name">Room 0.0</div>
                <div class="value">Single</div>
                <div class="value">€20</div>
                <div class="value">empty</div>
                <div class="value center edit"><button class="editRoomBtn"><i class="fas fa-pen"></i></button></div>
            </div>
            <hr>
        </div>
    </x-slot>
</x-app-layout>
