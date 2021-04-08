<form method="POST" action="{{ route('user.profile.update') }}" id="modal_content">
    @csrf
    @method('PUT')
<!-- Name -->
    <h1 class="settings_header">Account Settings</h1>
    <div class="element">
        <label for="name">Full Name</label>
        @error('name', 'updateProfileInformation')
        <div class="warning">{{ $message }}</div>
        @enderror
        <input type="text" value="{{old("name",Auth::user()->name)}}" name="name" spellcheck="false" placeholder="" id="name" required>
    </div>

    <div class="element">
        <label for="email">Telephone</label>
        <input type="text" value="{{old("telephone",Auth::user()->telephone)}}" name="telephone" spellcheck="false" placeholder="" id="email"
               required>
    </div>
    <div class="settings_footer">
        <button class="cancelBtn" form="">Cancel</button>
        <button type="submit" form="modal_content" value="Submit">Update</button>
    </div>
</form>
