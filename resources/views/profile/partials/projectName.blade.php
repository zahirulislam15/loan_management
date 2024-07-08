<section>
    <header>
        <h2 class="text-lg font-medium text-gray-100 dark:text-gray-100">
            {{ __('Project Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-100 dark:text-gray-400">
            {{ __("Update your Project Name") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('project.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="project_name" :value="__('Project Name')" />
            <x-text-input id="project_name" name="project_name" type="text" class="mt-1 block w-full" :value="old('name', $user->project_name)" required autofocus autocomplete="project_name" />
            <x-input-error class="mt-2" :messages="$errors->get('project_name')" />
        </div>
        <input type="hidden" value="{{$user->id}}">
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-200 dark:text-gray-200">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>