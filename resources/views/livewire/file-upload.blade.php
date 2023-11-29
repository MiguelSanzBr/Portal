<form wire:submit.prevent="submit">
    <input type="file" wire:model="file">
    @error('file') <span class="error">{{ $message }}</span> @enderror
    <button type="submit">Upload File</button>
</form>
