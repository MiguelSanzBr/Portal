<?php

namespace App\Livewire;

use Livewire\Component;

class FileUpload extends Component
{
	use WithFileUploads;

        public $file;

    public function render()
    {
        return view('livewire.file-upload');
    }
	public function submit()
    {
        $validatedData = $this->validate([
            'file' => 'required|image|max:1024', // 1MB Max
        ]);

        $this->file->store('uploads');
    }
}

