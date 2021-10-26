<div class="headshots">
    <div class="wrapper">
        <div class="headshots__intro">
            @if ($title)
                <h2 class="page-heading maroon {{ $center ? ' center' : '' }}">
                    {{ $title }}
                </h2>
            @endif

            @isset($text)
                <p class="copy">{!! $text !!}</p>
            @endisset

        </div>
        @if ($staff_members)
            <div class="headshots__grid">
                @foreach ($staff_members as $staff_member)
                    @if ($staff_member)
                        @php
                            $staff_args = FrontPage::getStaffmemberDetails($staff_member);
                        @endphp
                        @include('modules/loop/headshot',$staff_args)
                    @endif
                @endforeach

            </div>
        @endif

    </div>
</div>
