<main class="main tuition-finaid-scholarships" id="main">
    <section id="intro">

        @include('modules.banner',
        ['bg_img' =>@$banner_image->url,
        'bg_alt' =>@$banner_image->title,
        'btn_link' => @$back_to_landing_cta->url,
        'btn_text' => @$back_to_landing_cta->title,
        'title' =>get_the_title(),
        'dark_overlay' => @$banner_is_dark_overlay
        ] )
    </section>
    @isset($enable_callout)
        <section id="mcmurry-blurb">
            @include('modules.content-portrait-img',[
            'light_bg'=>'light-bg',
            'bg_img'=>@$callout_photo->url,
            'bg_alt'=>@$callout_photo->title,
            'title'=>$callout_title,
            'text'=>$callout_text,
            'buttons'=>false
            ]
            )
        </section>
    @endisset
    @isset($enable_quote)
        <section id="quote">
            @include('modules.quote',[
            'bg_img'=>@$quote_background_image->url,
            'bg_alt'=>@$quote_background_image->title,
            'quote'=>@$quote_text,
            'author_img'=>@$quote_photo->url,
            'author_alt'=>@$quote_photo->title,
            'author_name'=>@$quote_name,
            'author_title'=>@$quote_info,
            'author_other'=>@$quote_other_info
            ])
        </section>
    @endisset

    @isset($enable_graph)
        <section id="salaries">
            @include('modules.content-bg-img',[
            'bg_img'=>@$bar_graph_bg_image->url,
            'bg_alt'=>@$bar_graph_bg_image->title,
            'title'=>$graph_title,
            'text'=>$graph_information,
            'bar_graph'=>$bar_graph,
            'asterisk'=>''
            ])
        </section>
    @endisset
    @isset($enable_community)
        <section id="commitment to community">
            @include('modules.content-p-img-bg',
            ['bg_img'=>@$commitment_background_photo,
            'title'=>$commitment_title,
            'text'=>@$commitment_text,
            'cta_btn'=>@$commitment_cta,
            ])
        </section>
    @endisset


    @isset($enable_pay_for_college)
        @php
            $all_tiles = [];
        @endphp
        @foreach ($pay_for_college_tiles as $key => $college_tiles)
            @php
                $all_tiles[] = [
                    'title' => @$college_tiles->title,
                    'text' => @$college_tiles->text,
                    'cta' => (array) @$pay_for_college_tiles,
                ];
            @endphp
        @endforeach
        <section id="pay-for-college">
            @include('modules.tile-links',[
            'title' => @$pay_for_college_title,
            'eagle' => false,
            'bg_img' => @$pay_for_college_background_image->url,
            'bg_alt' => @$pay_for_college_background_image->alt,
            'all_tiles' => $all_tiles,
            ])
        </section>
    @endisset
    @isset($enable_apply_cta)
        <section id="apply-fin-aid">
            @include('modules.cta-eagle',[
            'title'=>@$apply_cta_title,
            'text'=>@$apply_cta_text,
            'btn'=>@$apply_cta_link
            ])
        </section>
    @endisset
    @isset($enable_counselors_sections)
    <section id="finaid-counselors">
        @include('modules.headshots',[
        'title'=>@$counselors_title,
        'staff_members'=>@$select_counselors,
        'center'=>true
        ])
    </section>
        <section id="apply-fin-aid">
            @include('modules.cta-eagle',[
            'title'=>@$apply_cta_title,
            'text'=>@$apply_cta_text,
            'btn'=>@$apply_cta_link
            ])
        </section>
    @endisset
    @isset($enable_form_section)
        <section id="form">
            @include('modules.form',[
            'title' => @$form_title,
            'text' => @$form_description,
            'form_id' => $select_form,
            'bg_img' => @$form_background_image,
            ])
        </section>
    @endisset

</main>
{{-- <main class="main tuition-finaid-scholarships" id="main">
    <section id="intro">
        {{> ../modules/_banner
        bg-img="/images/tuition/tuition-banner.jpg"
        bg-alt="three students sitting around table doing work"
        top-btn='Back to Admissions Overview'
        title='Tuition, Financial Aid, & Scholarships'
        bottom-btn="Log In to Financial Aid Portal"

        }}
    </section>
    <section id="mcmurry-blurb">
        {{> ../modules/_content-portrait-img
        light-bg=true
        bg-img="/images/flex/cntnt-p-img.jpg"
        bg-alt="graduate waving out at crowd"
        title="McMurry is one of the most affordable private schools, not only in the state but in the nation."
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean
        collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini."
        buttons=false

        }}
    </section>
    <section id="quote">
        {{> ../modules/_quote
        bg-img="/images/flex/quote-bg.jpg"
        bg-alt="picture of campus with people in foreground"
        quote="“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse”"
        author-img="/images/flex/headshots/headshots-3.jpg"
        author-alt="smiling man in front of building"
        author-name="First LastName"
        author-title="Title"
        author-other="other information"
        }}
    </section>
    <section id="value-of-tuition">
        <div class="select-role__header">
            <div class="eagle-overlay">
                {{>../modules/_eagle}}
            </div>
            <div class="wrapper">
                <h2 class="page-heading maroon">The Value of Tuition</h2>
                <span class="label-heading type-of">Type of Student</span>
                <div class="selection__dropdown">
                    <div class="combo-wrap">
                        <input type="text" class="combobox" id="select-role-tuition" name="select-role-tuition" />

                        <i aria-hidden="true" class="fa trigger fa-chevron-down dropdown-arrow"
                           data-trigger="single"></i>
                        <div class="listbox select-role copy bold light">
                            <div class="option undergrad">Undergraduate Student</div>
                            <div class="option military">Military Student</div>
                            <div class="option online">Online Student</div>
                            <div class="option grad">Graduate Student</div>
                            <div class="option intnl">International Student</div>
                            <div class="option dual">Dual Credit Student</div>

                        </div>
                    </div>

                </div>

                <div class="selection__buttons">
                    <button class="option undergrad menu-listing active"><span>I am a</span>Undergraduate
                        Student</button>
                    <button class="option military menu-listing"><span>I am a</span>Military Student</button>
                    <button class="option online menu-listing"><span>I am a</span>Online Student</button>
                    <button class="option grad menu-listing"><span>I am a</span>Graduate Student</button>
                    <button class="option intnl menu-listing"><span>I am a</span>International Student</button>
                    <button class="option dual menu-listing"><span>I am a</span>Dual Credit Student</button>

                </div>
            </div>
        </div>
        <div class="select-role__content">
            <div class="select-role__content__indiv" id="undergrad">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial Undergrad Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-role__content__indiv" id="military">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial Military Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-role__content__indiv" id="online">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial Online Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-role__content__indiv" id="grad">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial Graduate Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-role__content__indiv" id="intnl">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial International Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-role__content__indiv" id="dual">
                <div class="wrapper">
                    <div class="subsection">
                        <div class="pie-chart init">
                            <img class="chart" src="/images/tuition/init-tuition-pie.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Initial Dual Credit Cost: $38,140</h3>
                            <p class="copy">Note costs will be updated in fall. These numbers will be used to launch
                                site.</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Tuition:</span> $29,100</li>
                                <li><span class="bold">Freshman Orientation Fee (Fall Only):</span> $210</li>
                                <li><span class="bold">Student Activity Fee:</span> $90</li>
                                <li><span class="bold">Housing & Meals:</span> $8,740</li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/fin-aid.png" alt="pie chart example">

                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Financial Aid: $24,627 annually</h3>
                            <p class="copy">Based on IPEDS 2018-2019 (Full-time Beginning Undergraduate Students Grant
                                or Scholarship Aid and Federal Student Loans). Additional text about including merit,
                                scholarship, financial aid and student loans.</p>

                        </div>
                    </div>
                    <div class="subsection">
                        <div class="pie-chart">
                            <img class="chart" src="/images/tuition/avg-cost.png" alt="pie chart example">
                        </div>
                        <div class="content">
                            <h3 class="label-heading">Average Cost to Attend: $13,513 annually</h3>
                            <p class="copy">Additional text about after financial aid and student loans applied</p>
                            <ul class="copy no-bullets">
                                <li><span class="bold">Scholarships:</span> $XXX / semester </li>
                                <li><span class="bold">Financial Aid:</span> $XXX / year </li>
                                <li><span class="bold">Student Loans:</span> $XXX </li>
                            </ul>
                            <p class="copy">*for off-campus students, total is $29,400 (subtracting housing & meals)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="salaries">
        {{> ../modules/_content-bg-img
        title="Expected Graduating Salaries"
        par-1="Bar graph coming soon...."
        }}
    </section>
    <section id="commitment to community">
        {{> ../modules/_content-p-img-bg
        bg-img="/images/flex/cntnt-p-img-bg.jpg"
        bg-alt="students sitting and clapping and cheering"
        title="Commitment to Community"
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean
        collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini."
        buttons=true
        btn-1="Learn More"
        }}
    </section>
    <section id="pay-for-college">
        {{> ../modules/_tile-links
        bg-img="/images/flex/tile-bg.jpg"
        header-title="How You Can Pay for College"

        tile-1-title="Tuition & Aid Calculator"
        tile-1-text="Aliquam sit amet est eu dolor sollicitudin bibendum. Vivamus sit amet ullamcorper ex. Phasellus
        velit odio, varius faucibus viverra id, congue auctor felis."
        btn-1="Learn More"

        tile-2-title="Scholarships & Grants"
        tile-2-text="Aliquam sit amet est eu dolor sollicitudin bibendum. Vivamus sit amet ullamcorper ex. Phasellus
        velit odio, varius faucibus viverra id, congue auctor felis."
        btn-2="Learn More"

        tile-3-title="Student Loans"
        tile-3-text="Aliquam sit amet est eu dolor sollicitudin bibendum. Vivamus sit amet ullamcorper ex."
        btn-3="Learn More"

        tile-4-title="Financial Aid & Government Support"
        tile-4-text="Aliquam sit amet est eu dolor sollicitudin bibendum. Vivamus sit amet ullamcorper ex. Phasellus
        velit odio, varius faucibus viverra id, congue auctor felis."
        btn-4="Learn More"
        }}
    </section>
    <section id="finaid-counselors">
        {{> ../modules/_headshots
        title="Meet Our Financial Aid Counselors"
        center=true}}
    </section>
    <section id="apply-fin-aid">
        {{> ../modules/_cta-eagle
        title="Apply for Financial Aid"
        text="Log in and begin your path to paying for your college education."
        btn="Start your application"
        }}
    </section>
    <section id="form">
        {{> ../modules/_form}}
    </section>

</main>

{{> ../footer/_footer}}

{{> ../footer/_foot
chartjs=true}} --}}
