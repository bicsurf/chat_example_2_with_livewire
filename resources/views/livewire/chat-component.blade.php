<div class="accordion">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Chat
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show">
            <div class="bg-secondary">
                <div class="w-75 p-3">
                    @foreach ($conversation as $conversationItem)
                        <p class="text-light">
                            <span class="text-warning">{{ $conversationItem['username'] }}:</span>
                            {{ $conversationItem['message'] }}
                        </p>
                    @endforeach
                </div>
                <form wire:submit="submitMessage">
                    <div class="accordion-body d-flex bg-secondary">
                        <input wire:model="message" class="form-control">
                        <button type="submit" class="btn btn-light ms-3">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
