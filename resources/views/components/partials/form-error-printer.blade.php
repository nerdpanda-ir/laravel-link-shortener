@if($errors->any())
    <x-alert class="p-4 bg-dark text-danger" style="font-size: 16px;font-weight: bold">
        <x-slot name="message">
            <ul class="m-0">
                @foreach($errors->all() as $errorItem)
                    <li>
                        {{$errorItem}}
                    </li>
                @endforeach
            </ul>
        </x-slot>
    </x-alert>
@endif

