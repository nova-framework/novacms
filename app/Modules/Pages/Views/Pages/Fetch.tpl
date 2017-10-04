<div class='row'>

    <div class='col-md-2'>

        @if (isset($leftSidebars))
            @foreach ($leftSidebars as $row)
                <div class='widget {{ $row->class }}'>
                    @if ($row->displayTitle == 'on')
                        <h1><div class='widgetTitle sidebartitle'>
                            {{ $row->title }}
                        </div></h1>
                    @endif
                    <div class='widgetBody sidebarcontent' id="sc{{ $row->id }}">{{ Sidebar::display($row->content) }}</div>
                </div>
            @endforeach
        @endif

    </div>

    <div class='col-md-8'>

        <h1>{{ $page->pageTitle }}</h1>

        {{ $page->content }}

        @if (isset($page->id))
            {{-- echo PageBlocks::get($pageID, 'Social Media Info', 'textarea') --}}
        @endif

    </div>

    <div class='col-md-2'>
        @if (isset($rightSidebars))
            @foreach ($rightSidebars as $row)
                <div class='widget {{ $row->class }}'>
                    @if ($row->displayTitle == 'on')
                        <div class='widgetTitle page-header'><h1>{{{ $row->title }}}</h1></div>
                    @endif
                    <div class='widgetBody'>{{ Sidebar::display($row->content) }}</div>
                </div>
            @endforeach
        @endif
    </div>

</div>
