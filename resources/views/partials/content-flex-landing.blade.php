<main class="main flex" id="main">
    @include('modules.banner',
    [
        'bg-img'=>"@asset('/images/flex/banner-majors.jpg')",
        'bg-alt'=>"professor in lab showing students bones",
        'top-btn'=>'Back to Breadcrumb',
        'title'=>'Sample Banner Title',
       ' bottom-btn'=>"bottom button"
    ]
    );
    {{-- <section id="banner">
        {{> ../modules/_banner
        bg-img="/images/flex/banner-majors.jpg"
        bg-alt="professor in lab showing students bones"
        top-btn='Back to Breadcrumb'
        title='Sample Banner Title'
        bottom-btn="bottom button"
        }}
    </section>
    <section id="icon-links">
        {{> ../modules/_icon-links
        bg-img="/images/flex/icon-links.jpg"
        bg-alt="students sitting in cafeteria"
        }}
    </section>
    <section id="content-with-img">
        {{> ../modules/_content-portrait-img
        bg-img="/images/flex/cntnt-p-img.jpg"
        bg-alt="graduate waving out at crowd"
        title="Default version"
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot
        courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.
        Dandelion cucumber earthnut pea peanut soko zucchini."
        buttons=true
        btn-1-link="#"
        btn-1-text="Learn how to apply"
        btn-1-link="#"
        btn-2-text="Tour the campus"
        }}
        {{> ../modules/_content-portrait-img
        light-bg=true
        bg-img="/images/life-at-mcm/religious-spiritual.jpg"
        bg-alt="students watching people on stage with musical instruments"
        title="There is a light version as well"
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean
        collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini."
        buttons=false
        }}
        {{> ../modules/_content-p-img-bg
        bg-img="/images/flex/cntnt-p-img-bg.jpg"
        bg-alt="students sitting and clapping and cheering"
        title="This one has the photo behind"
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean
        collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini."
        buttons=true
        btn-1="Learn More"
        }}
        {{> ../modules/_content-bg-img
        title="Full photo background"
        par-1="Each application is evaluated based on the academic merits (both
        high school grade point average and entrance exam scores), extracurricular
        activities, and personal statement (if applicable*). This holistic approach allows
        McMurry to evaluate students on an individual basis and look for each student’s
        strengths."
        par-2="Completed applications will be reviewed immediately, and you will
        be notified of your status within 5 business days. Once you have decided to attend
        McMurry, submit your enrollment deposit to reserve your spot in the incoming cohort!"
        asterisk="*Information on personal statement should be shared here"}}
    </section>
    <section id="photo-gallery">

        {{> ../modules/_photo-gallery
        title="Photo Gallery"
        id="gallery-1"
        }}

    </section>
    <section id="ft-video">

        {{> ../modules/_ft-video
        modal-id="ft-video-1"
        bg-img="/images/flex/video-thumbnail.jpg"
        bg-alt="cheerleaders facing crowd in bleachers"
        title="Featured Video"
        text="Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot
        courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.
        Dandelion cucumber earthnut pea peanut soko zucchini."
        yt-link="https://www.youtube.com/embed/2vm9IfkLMjs"
        }}

    </section>
    <section id="testimonials">

        {{> ../modules/_testimonials
        title="Solid background"
        id="testimonials-1"}}

        {{> ../modules/_testimonials
        title="Image background"
        bg-img="/images/life-at-mcm/testimonials-bg.jpg"
        bg-alt="crowd of students"
        id="testimonials-2"}}

    </section>
    <section id="grid">

        {{> ../modules/_grid}}

    </section>
    <section id="headshots">

        {{> ../modules/_headshots
        title="Headshots Module"
        text="Optional text goes here"}}

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

        {{> ../modules/_quote-img}}
    </section>

    <section id="tile-links">

        {{> ../modules/_tile-links
        bg-img="/images/flex/tile-bg.jpg"
        header-title="Tile Links"

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
    <section id="cta">

        {{> ../modules/_cta-eagle
        title="Apply Today!"
        text="Start your free, online application to McMurry."
        btn="Start your application"
        }}

    </section>

    <section id="form">{{> ../modules/_form}} </section> --}}
</main>