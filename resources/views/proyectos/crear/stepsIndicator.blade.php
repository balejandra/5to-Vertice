<ul class="row px-3 mb-3" id="progressbar">
    <li class="col text-center {{ $step === 1 ? 'active' : ($step > 1 ? 'previus' : '') }}">Datos</li>
    <li class="col text-center {{ $step === 2 ? 'active' : ($step > 2 ? 'previus' : '') }}">Contenido</li>
    <li class="col text-center {{ $step === 3 ? 'active' : ($step > 3 ? 'previus' : '') }}">Personal</li>
    <li class="col text-center {{ $step === 4 ? 'active' : ($step > 4 ? 'previus' : '') }}">Taxonomia</li>
    <li class="col text-center {{ $step === 5 ? 'active' : ($step > 5 ? 'previus' : '') }}">Financiero</li>
    <li class="col text-center {{ $step === 6 ? 'active' : ($step > 6 ? 'previus' : '') }}">Soluciones y Desafios</li>
</ul>
