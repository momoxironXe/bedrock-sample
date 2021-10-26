<div class="alphabet" id="filter-alphabet">
    <div class="wrapper">
        <ul>
            @php
                $cnt=0;
            @endphp
            @foreach (range('A', 'Z') as $alphabet)
                <li><a href="#{{ strtolower($alphabet) }}" data-alpha="{{ strtolower($alphabet) }}">{{ $alphabet }}</a></li>
                @php
                    $cnt++;
                @endphp
            @endforeach
        </ul>
    </div>
</div>
