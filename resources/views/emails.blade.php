<x-app-layout>
    <x-slot name="content">
        <div class="emails">
            <div class="header">
                <div class="label">SEND SPECIAL OFFER NEWSLETTER</div>
                <hr>
            </div>

            <form action="{{route('ToAllEmails')}}" method="POST" class="email-form">
                @csrf
                @method('POST')
                <input class="subject" name="subject" type="text" placeholder="Email subject..." spellcheck="false">
                <textarea id="myTextarea" name="message" class="message" placeholder="Write the newsletter here..." spellcheck="false"></textarea>
                <input class="send" type="submit" name="" value="Send">
            </form>

        </div>
        @section('js')
            <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
            <script src="{{ asset('assets/js/wysiwyg.js') }}"></script>
        @endsection
    </x-slot>
</x-app-layout>
