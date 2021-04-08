<x-app-layout>
    <x-slot name="content">
        <div class="emails">
            <div class="header">
                <div class="label">If you have found a problem please report it !!!</div>
                <hr>
            </div>

            <form action="{{route('bug.report')}}" method="POST" class="email-form">
                @csrf
                @method('POST')
                <textarea id="myTextarea" name="message" class="message" placeholder="Write the newsletter here..." spellcheck="false"></textarea>
                <input class="send" type="submit" name="" value="Send">
            </form>

        </div>
    </x-slot>
</x-app-layout>
