<div class="headshots__indiv">
    @if ($bg_img)
        <img src="{{ $bg_img }}" alt="{{ $bg_alt }}" />
    @endif
    <div class="headshots__indiv__info">
        @if ($prefix)
            <span class="copy">{{ $prefix }}</span>
        @endif
        @if ($contact_details)
            <div class="icons">
                @foreach ($contact_details as $contact_detail)
                    @if ($contact_detail['contact_type'] == 'fax ')
                        @if ($contact_detail['email_id'])
                            <a href="tel:{{ $contact_detail['fax_no'] }}" target="_blank">
                                <span class="fax">
                                    @include('modules/fax-icon')
                                </span>
                            </a>
                        @endif
                    @elseif ($contact_detail['contact_type']=='email ')
                        @if ($contact_detail['email_id'])
                            <a href="mailto:{{ $contact_detail['email_id'] }}" target="_blank">
                                <span class="email">
                                    @include('modules/mail-icon')
                                </span>
                            </a>
                        @endif
                    @else
                        @if ($contact_detail['phone_no'])
                            <a href="tel:{{ $contact_detail['phone_no'] }}" target="_blank">
                                <span class="email">
                                    @include('modules/phone-icon')
                                </span>
                            </a>
                        @endif
                    @endif

                @endforeach
            </div>
        @endif

    </div>
    @if ($full_name)
        <span class="label-heading">{{ $full_name }}</span>
    @endif
    @if ($department)
        <p class="department copy">{{ $department }}</p>

    @endif
</div>
