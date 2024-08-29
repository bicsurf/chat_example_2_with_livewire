<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Message;
use App\Events\MessageEvent;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $message;
    public $conversation = [];

    public function mount()
    {
        $messages = Message::with('user')->get();
        $x = [];

        foreach ($messages as $message) {
            $x[] = [
                'username' => $message->user->name,
                'message' => $message->message,
            ];
        }

        $this->conversation = $x;
    }

    public function submitMessage()
    {
        MessageEvent::dispatch(Auth::user()->id, $this->message);
        $this->message = "";
    }

    #[On('echo:chat-channel,MessageEvent')]
    public function listenForMessage($data)
    {
        $this->conversation[] = [
            'username' => $data['username'],
            'message' => $data['message']
        ];
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
