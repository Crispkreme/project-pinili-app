<div class="row">
    @foreach($socialItems as $socialItem)
        <div class="col-3">
            <a class="dropdown-icon-item" href="{{ $socialItem['url'] }}">
                <img src="{{ asset($socialItem['icon']) }}" alt="{{ $socialItem['title'] }}">
                <span>{{ $socialItem['title'] }}</span>
            </a>
        </div>
    @endforeach
</div>
