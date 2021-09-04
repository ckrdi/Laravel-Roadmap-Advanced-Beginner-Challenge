<div class="p-4 text-white">
    <h2 class="font-semibold text-xl leading-tight mb-3">
        Dashboard
    </h2>
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('users.index') }}">Users</a>
            @can('manage user')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage user')
            <a href="{{ route('users.create') }}" x-show="open">Register new user</a>
        @endcan
    </div>
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <button>Clients</button>
            @can('manage client')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage client')
            <div x-show="open">Create new client</div>
        @endcan
    </div>
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <button>Projects</button>
            @can('manage project')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage project')
            <div x-show="open">Create new project</div>
        @endcan
    </div>
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <button>Tasks</button>
            @can('manage task')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage task')
            <div x-show="open">Create new task</div>
        @endcan
    </div>
</div>
