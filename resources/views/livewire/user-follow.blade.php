<div>
    @empty($following)
        <button style="background: hsl(252, 75%, 60%); color:#ffff; padding-inline: 2.3rem; line-height: 2rem; border-radius: 10px;" wire:click.prevent="follow">Seguir</button>
    @else
        <button style="background: #130f40; color:#ffff; padding-inline: 1.5rem; line-height: 2rem; border-radius: 10px;" wire:click.prevent="follow">Seguindo</button>
    @endempty
</div>
