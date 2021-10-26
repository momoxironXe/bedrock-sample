<div class="tile-links {{ $eagle ? 'eagle' : '' }}">

    <div class="tile-links__header">

        @if ($eagle)
            <div class="eagle-overlay">
                @include('modules/eagle')
            </div>
        @endif

        <div class="wrapper">
            <h2 class="page-heading {{ $eagle ? 'maroon' : 'light' }} ">{{ $title }}</h2>
        </div>
    </div>

    <div class="tile-links__grid">
        @isset($bg_img)
            <img class="bg-img" src="{{ $bg_img }}" alt="{{ $bg_alt }}">
        @endisset
        @if ($all_tiles)
            @php
                $count = 1;
            @endphp
            @foreach ($all_tiles as $key => $tile)
                @php
                    $tile['outer_cls'] = 'dark';
                    $tile['title_cls'] = '';
                @endphp
                @if ($count > 1 && ($count % 4 == 2||$count % 4 == 3))
                    @php
                        $tile['outer_cls'] = 'white';
                        $tile['title_cls'] = 'maroon';
                    @endphp
                @endif
                @include('modules/loop-tile',$tile)
                @php
                    $count++;
                @endphp
            @endforeach
        @endif
    </div>
</div>
