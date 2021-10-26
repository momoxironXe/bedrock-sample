<div class="programs__grid">
    <div class="programs__grid__header">
        <div class="wrapper">
            <div class="name"><span class="copy bold">Name</span></div>
            <div class="type"><span class="copy bold">Type of Program</span></div>
        </div>
    </div>
    @php
        $count = 0;
    @endphp
    @if ($all_programs)
        @foreach ($all_programs as $index => $program_args)
            <span class="anchor" id="{{ strtolower($index) }}"></span>
            @if ($program_args)
                @foreach ($program_args as $key => $program)
                    <div class="programs__grid__indiv {{ $count == 0 ? 'open' : '' }} undergrad minor"
                        data-program_id="{{ $key }}" data-page_id="{{ $page_id }}">
                       @php
                           $single_program = TemplateFindYourMajor::getLoopSingleProgram($key, $page_id);
                        //    var_dump($single_program);
                       @endphp
                        <div class="wrapper">
                            <button class="program-toggle">
                                <h3 class="label-heading">{{ $single_program['title'] }}</h3>
                                <span class="type copy bold">{{ @$single_program['type'] }}</span>
                            </button>
                                          
                            <div class="program-info">
                                <div class="type-dept">
                                    <span class="type copy bold">{{ @$single_program['type'] }}</span>
                                    <span class="department copy bold">{{ @$single_program['department'] }}</span>
                                </div>
                                <p class="copy desc">
                                    @if ($count==0)   
                                    {{ substr(@$single_program['description'],0,200) }}
                                    @endif                                           
                                </p>
                                @if ($count==0)     
                                @if ($single_program['possible_mejors'])
                                    <div class="possible copy bold">
                                        <h4>Possible Majors</h4>
                                        <ul>
                                            @foreach ($single_program['possible_mejors'] as $item)
                                                <li><button>{{ $item }}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @endif
                            </div>
                            @if ($count==0)     
                            <div class="buttons">
                                <a href="{{$single_program['apply_link']['url']}}" class="btn gold"><span>Apply Now</span></a>
                                <a href="{{$single_program['department_link']}}" class="btn ghost on-white"><span>Learn about department</span></a>
                                <a href="{{$single_program['learn_about']}}" class="btn ghost on-white"><span>Request more information</span></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @php
                        $count++;
                    @endphp
                @endforeach
            @endif
            @php
                
            @endphp
        @endforeach
    @endif

</div>