<div>
    <form wire:submit.prevent="save_response()">
        <div class="card-text h-full space-y-4">
            <div class="input-area ">
                <label for="name" class="form-label">Respuesta</label>
                <input wire:model="response" type="text" class="form-control">
                @error('response')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-area" style="text-align: right">
                <button type="submit" class="btn btn-dark">Guardar</button>
            </div>

        </div>
    </form>
</div>
