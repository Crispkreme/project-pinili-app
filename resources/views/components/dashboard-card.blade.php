<div class="row">
    @foreach($cardItems as $cardItem)
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">{{ $cardItem['title'] }}</p>
                            <h4 class="mb-2">{{ $cardItem['total'] }}</h4>
                            <p class="text-muted mb-0">
                                <span class="text-success fw-bold font-size-12 me-2">
                                    {!! $cardItem['icon'] !!}
                                    {{ $cardItem['percentage'] }}
                                </span>
                                from previous period
                            </p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                {!! $cardItem['avatar'] !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
