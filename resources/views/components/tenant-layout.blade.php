<x-app-layout>
    <div class="w-full min-h-screen flex space-gap-2" x-data="dashboard">
        <x-tenant.sidebar></x-tenant.sidebar>
        <div class="flex flex-col gap-2 w-full p-4">
            <x-tenant.navbar></x-tenant.navbar>
            <div class="h-full w-auto bg-white rounded-lg p-4">
                {{ $slot }}
            </div>
        </div>
    </div>

</x-app-layout>
