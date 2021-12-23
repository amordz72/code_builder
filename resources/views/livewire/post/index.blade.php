<div class="container">
    {{-- <h1 class="text-center">{{$title}}</h1> --}}
    <div class="col-sm-12">
        <form wire:submit.prevent="save">
            <input type="text" wire:model="post.title">

            <textarea wire:model="post.content"></textarea>

            <button type="submit">Save</button>
        </form>
    </div>

</div>
