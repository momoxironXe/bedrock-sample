<script type="text/template" id="tmpl-program-item">
<button class="program-toggle">
    <h3 class="label-heading">{{{ data.title}}}</h3>
    <span class="type copy bold">{{{data.type}}}</span>
</button>
<div class="program-info">
    <div class="type-dept">
        <span class="type copy bold">{{{data.type}}}</span>
        <span class="department copy bold">{{{data.department_title}}}</span>
    </div>
    <p class="copy desc">
        {{{data.description}}}
    </p>
    <# if(data.possible_mejors&&data.possible_mejors.length>0){ #>
        <div class="possible copy bold">
            <h4>Possible Majors</h4>
            <ul>
                <# _.each(data.possible_mejors, function(item){ #>
                    <li><button>{{{item}}}</button></li>
                    <# }); #>
            </ul>
        </div>
        <# } #>
</div>
<div class="buttons">
    <a href="{{ data.apply_link.url}}" class="btn gold"><span>Apply Now</span></a>
    <a href="{{ data.department_link}}" class="btn ghost on-white"><span>Learn about department</span></a>
    <a href="{{ data.more_info}}" class="btn ghost on-white"><span>Request more information</span></a>
</div>
</script>