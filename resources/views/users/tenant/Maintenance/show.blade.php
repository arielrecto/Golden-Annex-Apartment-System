<x-tenant-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="{ toggle: false }">

        @if (Session::has('message'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="w-full flex items-center justify-between">
            <h1>
                Tenant -
                <span class="font-bold text-lg text-gray-800 capitalize">
                    {{ $maintenance->room->user->name }}
                </span>
            </h1>

            @if ($maintenance->status === App\Enums\MaintenanceStatus::PENDING->value || ($maintenance->status !== App\Enums\MaintenanceStatus::DONE->value && $maintenance->status !== App\Enums\MaintenanceStatus::REJECT->value))
                <div class="flex items-center w-auto gap-2">
                    <form action="{{ route('tenant.maintenance.show', ['maintenance' => $maintenance->id]) }}"
                        method="GET">
                        <input type="hidden" name="status" value="{{ App\Enums\MaintenanceStatus::DONE->value }}">
                        <button class="btn btn-accent btn-xs">Done</button>
                    </form>

                    <form action="{{ route('tenant.maintenance.show', ['maintenance' => $maintenance->id]) }}"
                        method="GET">
                        <input type="hidden" name="status" value="{{ App\Enums\MaintenanceStatus::PROCESSING->value }}">
                        <button class="btn btn-primary btn-xs">Processing</button>
                    </form>

                </div>
            @endif

        </div>

        <div class="h-full w-full flex ">
            <div class="w-full h-auto flex space-x-5">

                <img src="{{ $maintenance->image }}" alt="" srcset=""
                    class="h-auto w-1/2 object object-center">
                <div class="flex flex-col gap-2">
                    <div class="text-gray-800 flex gap-2">
                        <h1 class="font-bold">
                            Date : <span>{{ $maintenance->time }}</span>
                        </h1>
                        <h1>
                            Status : <span>{{ $maintenance->status }}</span>
                        </h1>
                    </div>
                    <p class="whitespace-pre-line">
                        {{ $maintenance->description }}
                    </p>
                </div>
            </div>
        </div>
</x-admin-layout>
