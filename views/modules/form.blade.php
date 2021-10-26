<div class="form__module">
    <div class="form__module-info light">
        <div class="wrapper">
            @if ($title)
                <h2 class="page-heading">{{ $title }}</h2>
            @endif
            @if ($text)
                <span class="copy">{!! $text !!}</span>
            @endif
        </div>
    </div>
    @isset($form_id)
        <div class="form__module-form light" style="background-image: url({!! @$bg_img !!})">
            <div class="wrapper">
                <div class="gform__accordion">
                    <div class="gform__page">
                        <div class="gform_wrapper">
                            @php
                                echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]');
                            @endphp
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    @endisset
</div>

