<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div>
            <div class="font-semibold text-xl">{{ $user->name }}</div>
            <div class="font-semibold text-lg">{{ $user->email }}</div>
            <div>Role: {{ $user->roles[0]->name }}</div>
        </div>
        <div class="flex items-center justify-between mt-2">
            @can('manage user')
                <div class="flex items-center">
                    <x-button>
                        Edit
                    </x-button>
                    <x-button class="ml-2">
                        Delete
                    </x-button>
                </div>
            @endcan
            <x-link href="{{ route('users.index') }}" class="ml-2">
                Go back
            </x-link>
        </div>
    </div>
</x-app-layout>
