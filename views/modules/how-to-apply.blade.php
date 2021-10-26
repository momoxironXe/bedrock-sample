<div class="select-role__header">
    <div class="eagle-overlay">
        @include('modules.eagle')
    </div>
    <div class="wrapper">
        @if ($overall_title)
            <h2 class="page-heading maroon">{!! $overall_title !!}</h2>
        @endif
        <span class="label-heading type-of">Type of Student</span>
        @if ($audience_info)
            <div class="selection__dropdown">
                <div class="combo-wrap">
                    <input type="text" class="combobox" id="select-role-apply" name="select-role-apply"
                        inputmode="none" />

                    <i aria-hidden="true" class="fa trigger fa-chevron-down dropdown-arrow" data-trigger="single"></i>
                    <div class="listbox select-role copy bold light">
                        @foreach ($audience_info as $info)
                            @if ($info->audience_namepay)
                                <div class="option {{ sanitize_title($info->audience_namepay) }}">
                                    {!! @$info->audience_namepay !!}</div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="selection__buttons">
                @php
                    $count = 0;
                @endphp
                @foreach ($audience_info as $info)
                    <button
                        class="option {{ sanitize_title($info->audience_namepay) }} menu-listing  {{ $count == 0 ? 'active' : '' }}"><span>{!! @$overall_identifier !!}</span>{!! @$info->audience_namepay !!}</button>
                    @if (@$info->audience_descriptor)
                        <p class="copy">{!! $info->audience_descriptor !!}</p>
                    @endif
                    @php
                        $count++;
                    @endphp
                @endforeach

            </div>
        @endif

    </div>
</div>
@if ($audience_info)
    <div class="select-role__content">
        @foreach ($audience_info as $info)
            <div class="select-role__content__indiv" id="{{ sanitize_title($info->audience_namepay) }}">
                <div class="wrapper">
                    <div class="materials subsection">
                        @if (@$info->intro_title)
                            <h3 class="label-heading">{!! $info->intro_title !!}</h3>
                        @endif
                        @if (@$info->intro_text)
                            {!! $info->intro_text !!}
                        @endif
                    </div>

                    <div class="steps subsection">
                        @if (@$info->steps_text)
                            <h3 class="label-heading"> {!! $info->steps_text !!}</h3>
                        @endif
                        @if (@$info->steps_numbered_steps)
                            <ol class="copy bold">
                                @foreach ($info->steps_numbered_steps as $numbered_step)
                                    <li>{!! $numbered_step->text !!}</li>
                                @endforeach
                            </ol>
                        @endif
                        @if (@$info->buttons)
                            <div class="buttons">
                                @foreach ($info->buttons as $button)
                                    @if ($button->link)
                                        @php
                                        $link=$button->link;
                                            $link_url = $link->url;
                                            $link_title = $link->title;
                                            $link_target = $link->target ? $link->target : '_self';
                                        @endphp
                                        <a href="{{ $link_url }}"
                                            class="btn {{ @$button->is_solid ? 'gold' : 'ghost on-white' }}"
                                            target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
                                    @endif

                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="deadlines subsection">
                        @if (@$info->deadlines_title)
                            <h3 class="label-heading">{!! $info->deadlines_title !!}</h3>
                        @endif
                        @if (@$info->all_deadlines)
                            <ul>
                                @foreach ($info->all_deadlines as $deadline)
                                    <li class="early">
                                        <div class="title-date copy bold">
                                            @if (@$deadline->icon)
                                                <span class="icon">
                                                    @include('modules/'.$deadline->icon)</span>
                                            @endif
                                            @if (@$deadline->title)
                                                <span class="copy bold">{!! $deadline->title !!}</span>
                                            @endif
                                            @if (@$deadline->date)
                                                <span class="copy">{!! $deadline->date !!}</span>
                                            @endif

                                        </div>
                                        @if (@$deadline->date)
                                            <div class="blurb ">
                                                <span class="copy">{!! $deadline->text !!}</span>
                                            </div>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endif
