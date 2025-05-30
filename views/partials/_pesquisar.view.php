<div class="flex space-x-4 items-center w-full">
    <form action="/notas" class="w-full">
        <label class="input">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input 
            class="w-full" 
            name="pesquisar" 
            type="search" 
            placeholder="Pesquise suas notas no LockBox" 
            value="<?= request()->get('pesquisar', '') ?>"
            />
        </label>
        <a href="/notas/criar" class="btn btn-neutral">+ Item</a>
    </form>
</div>