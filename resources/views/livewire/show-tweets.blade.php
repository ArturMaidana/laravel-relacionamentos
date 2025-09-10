<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto py-8 px-4 max-w-2xl">

        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Twitter Clone</h1>

            <!-- Tweet Form -->
            <form wire:submit.prevent="create" class="space-y-4">
                <div>
                    <textarea
                        name="content"
                        id="content"
                        wire:model="content"
                        placeholder="O que está acontecendo?"
                        rows="3"
                        class="w-full p-3 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                    ></textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">{{ strlen($content ?? '') }}/280</span>
                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-600 text-green font-semibold py-2 px-6 rounded-full transition-colors duration-200 disabled:opacity-50"
                    >
                        Tweetar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tweets Feed -->
        <div class="space-y-4">
            @foreach ($tweets as $tweet)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex space-x-3">
                        <!-- User Avatar -->
                        <div class="flex-shrink-0">
                            @if ($tweet->user->photo)
                                <img src="{{ url("storage/{$tweet->user->photo}") }}"
                                     alt="{{$tweet->user->name}}"
                                     class="w-12 h-12 rounded-full object-cover">
                            @else
                                <img src="{{ url('img/no-image.jpg')}}"
                                     alt="{{$tweet->user->name}}"
                                     class="w-12 h-12 rounded-full object-cover">
                            @endif
                        </div>

                        <!-- Tweet Content -->
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <h3 class="font-semibold text-gray-900">{{$tweet->user->name}}</h3>
                                <span class="text-gray-500 text-sm">{{ $tweet->created_at->diffForHumans() }}</span>
                            </div>

                            <p class="text-gray-800 mb-3 leading-relaxed">{{ $tweet->content}}</p>

                            <!-- Like Button -->
                            <div class="flex items-center space-x-4">
                                @if ($tweet->likes->count())
                                    <button
                                        wire:click.prevent="unlike({{ $tweet->id}})"
                                        class="flex items-center space-x-1 text-green-600 hover:text-green-700 transition-colors"
                                    >
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                        </svg>
                                        <span class="text-sm font-medium">{{ $tweet->likes->count() }}</span>
                                    </button>
                                @else
                                    <button
                                        wire:click.prevent="like({{ $tweet->id}})"
                                        class="flex items-center space-x-1 text-gray-400 hover:text-green-600 transition-colors"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                        <span class="text-sm">Curtir</span>
                                    </button>

                                @endif
                                <button class="ml-4" wire:click.prevent="delete({{ $tweet->id}})">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($tweets->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                    {{ $tweets->links()}}
                </div>
            </div>
        @endif

    </div>
</div>
