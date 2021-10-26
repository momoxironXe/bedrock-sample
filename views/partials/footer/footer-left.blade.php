<div class="wrapper">
    <div class="footer__logo">
        @include('modules.logo')
    </div>
    @if ($footer_about != '')
        <div class="footer__about">
            <p class="copy">{{ $footer_about }}</p>
        </div>
    @endif
    <div class="footer__contact">
        @if ($footer_address != '')
            <div class="address copy">
                @php
                    $footer_address =$footer_address ;
                @endphp
                <span> {{ $footer_address }}</span>
            </div>
        @endif

        <div class="contact-info copy">
            @if ($footer_contact_number != '')
                <span class="number"><a
                        href="tel:{{ $footer_contact_number }}">{{ $footer_contact_number }}</a></span>
            @endif
            {{-- @dd($footer_emails); --}}
            @if ($footer_emails != '')
                <div class="email">
                    @foreach ($footer_emails as $footer_email)
                        <span><a
                                href="mailto:{{ $footer_email['email_id'] }}">{{ $footer_email['email_id'] }}</a></span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @if (count($footer_button_section))
        <div class="footer__info">
            @foreach ($footer_button_section as $footer_button)
                <div class="footer__info__{{ @$footer_button['section_class'] }}">
                    @isset($footer_button['title'])
                        <p class="label-heading maroon">{{ $footer_button['title'] }}</p>
                    @endisset
                    @isset($footer_button['add_buttons'])
                        @foreach ($footer_button['add_buttons'] as $button)
                            @isset($button['add_button'])
                                @php
                                    $link = $button['add_button'];
                                    $is_solid = $button['is_solid'];
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                @endphp
                                <a class="btn {{ $is_solid ? 'gold' : 'ghost on-white' }}" href="{{ esc_url($link_url) }}"
                                    target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                            @endisset
                        @endforeach
                    @endisset
                </div>
            @endforeach
        </div>
    @endif
</div>
