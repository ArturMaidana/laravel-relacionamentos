<div>
    <h1>Atualizar de Foto de Perfil</h1>
    <form action="#" method="post" wire:submit.prevent='storagePhoto'>
        <input type="file" wire:model="photo">
        @error('photo') {{$message}} @enderror
        <button type="submit">Upload de Foto</button>
    </form>
</div>
