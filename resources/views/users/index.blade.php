<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="p-2 border-t border-b sm:border border-indigo-500 sm:rounded-lg">
            <div class="p-2 pt-0 border-b border-indigo-500">
                List of all users
            </div>
            @foreach($users as $user)
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg md:flex justify-between items-center">
                    <div>
                        <a href="{{ route('users.show', [ 'user' => $user ]) }}"
                           class="font-semibold text-xl"
                        >
                            {{ $user->name }}
                        </a>
                    </div>
                    @can('manage user')
                    <div class="flex items-center mt-2 md:mt-0">
                        <x-button>
                            Edit
                        </x-button>
                        <x-button class="ml-2">
                            Delete
                        </x-button>
                    </div>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
