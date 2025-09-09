<div class="container py-5">

    Show Tweets

    <p> {{ $message }} </p>

    <input type="text" name="message" wire:model="text" class="form-control mb-2">

    <hr>

    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{ $tweet->content}}
    @endforeach

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Show Tweets</h3>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <h1 class="text-success mb-4">Resultado {{ $count }}</h1>

            <p class="mb-3">{{ $message }}</p>

            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label for="message" class="form-label">Mensagem</label>
                    <textarea name="message" id="message" cols="30" rows="4" class="form-control mb-2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="inputMessage" class="form-label">Message</label>
                    <input type="text" id="inputMessage" wire:model.defer="message" class="form-control mb-2">
                </div>
                <div class="mb-3">
                    <label for="inputText" class="form-label">Text</label>
                    <input type="text" id="inputText" wire:model.defer="text" class="form-control mb-2">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div> --}}
</div>
