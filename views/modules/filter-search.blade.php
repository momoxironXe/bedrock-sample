<div class="filter-search">
    <div class="filter-search__inner">
        <div class="wrapper">
            <div class="selections">

                <input type="hidden" name="action" value="filter_program">
                <input type="hidden" name="page_id" value="{{ get_the_ID() }}">
                <input type="hidden" name="nonce" value="{{ wp_create_nonce('ajax-nonce') }}">
                <input type="hidden" name="name_start" class="name_start">
                <div class="select-type">
                    <h2 class="label-heading light">Type of Program</h2>
                    <div class="selections__dropdowns">
                        @php
                            $all_types = TemplateFindYourMajor::getProgramTerms('type-cat');
                            $all_degree = TemplateFindYourMajor::getProgramTerms('degree-cat');
                        @endphp
                        @if (!empty($all_types) && !is_wp_error($all_types))
                            <div class="combo-wrap">
                                <input type="text" class="combobox" id="program" placeholder="Select Program"
                                    name="program" autocomplete="off" />
                                <i aria-hidden="true" class="fa trigger fa-chevron-down dropdown-arrow"
                                    data-trigger="single"></i>
                                <div class="listbox program copy bold light">
                                    @foreach ($all_types as $type)
                                        <div class="option {{ $type->slug }}">{!! $type->name !!}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (!empty($all_degree) && !is_wp_error($all_degree))
                            <div class="combo-wrap">
                                <input type="text" class="combobox" id="education-level"
                                    placeholder="Select Education Level" name="education-level" autocomplete="off" />
                                <i aria-hidden="true" class="fa trigger fa-chevron-down dropdown-arrow"
                                    data-trigger="single"></i>
                                <div class="listbox education copy bold light">
                                    @foreach ($all_degree as $degree)
                                        <div class="option {{ $degree->slug }}">{!! $degree->name !!}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="selections__buttons">
                        @if (!empty($all_types) && !is_wp_error($all_types))
                            <div class="program-type">
                                @foreach ($all_types as $type)
                                    <button
                                        class="btn maroon {{ $type->slug }}"><span>{!! $type->name !!}</span></button>
                                @endforeach
                            </div>
                        @endif
                        @if (!empty($all_degree) && !is_wp_error($all_degree))
                            <div class="education-level">
                                @foreach ($all_degree as $degree)
                                    <button
                                        class="btn maroon {{ $degree->slug }}"><span>{!! $degree->name !!}</span></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="search-clear">
                    <div class="search-wrapper">
                        <h2 class="label-heading light">Enter Keyword</h2>
                        <div class="search-field">
                            <input type="search" class="search" name="search" id="program-search" />
                            <button>
                                <i aria-hidden="true" class="fas fa-search search-icon" data-trigger="single"></i>
                            </button>
                        </div>
                    </div>
                    <div class="clear-all-wrapper">
                        <span class="copy bold light"><button id="clear-all">Clear All</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
