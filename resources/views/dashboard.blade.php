<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <script>
            Echo.private('private-message').listen('PrivateChannelEvent', (data)=>{
                // document.getElementById('trade-id').innerHTML = data.trade;
                console.log(data);
            })
            Echo.join('test-presence')
            .here((user)=>{
                console.log(user);
            })
            .joining((user)=>{
                console.log('joining new user '+ user.name)
            })
            .leaving((user)=>{
                console.log('leaving user '+user.name);
            })
            .listen('PresenceMsgEvent', (data)=>{
                // document.getElementById('trade-id').innerHTML = data.trade;
                console.log(data);
            })

    </script>
</x-app-layout>
