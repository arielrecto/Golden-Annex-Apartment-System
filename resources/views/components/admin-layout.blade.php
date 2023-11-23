<x-app-layout>
    <div class="w-full min-h-screen flex space-gap-2" x-data="dashboard">
        <x-admin.sidebar></x-admin.sidebar>
        <div class="flex flex-col gap-2 w-full p-4">
            <x-admin.navbar></x-admin.navbar>
            <div class="h-full w-auto bg-white rounded-lg p-4">
                {{ $slot }}
            </div>
        </div>
    </div>

</x-app-layout>
