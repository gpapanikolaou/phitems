<div class="card-body">
    <h5 class="card-title">Name: {{ $pornstar->name }}</h5>
    @if (Storage::disk('public')->exists('images/pornstars/' . $pornstar->id . '.jpg'))
        <img src="{{ asset('storage/images/pornstars/' . $pornstar->id . '.jpg') }}"
            alt="Image">
    @else
        @php
            $imageController = new \App\Http\Controllers\ImageController();
            $imageController->saveImage($pornstar);
        @endphp
        <img src="{{ asset('storage/images/pornstars/' . $pornstar->id . '.jpg') }}"
            alt="Image"
            @if (isset($pornstar->thumbnails[0]->height)) height="{{ $pornstar->thumbnails[0]->height }}" @endif
            @if (isset($pornstar->thumbnails[0]->width)) width="{{ $pornstar->thumbnails[0]->width }}" @endif>
    @endif
    <div class="mt-auto">
        <label for="link">Link:</label>
        <p id="link">{{ $pornstar->link }}</p>
        <label for="link">License:</label>
        <p id="link">{{ $pornstar->license }}</p>
        <label for="link">wlStatus:</label>
        <p id="link">{{ $pornstar->wlStatus }}</p>

        <div class="attributes" onclick="toggleAttributes(this)">Attributes</div>
        <div class="attributes-list">
            <p>hairColor: {{ $pornstar->attributes->hairColor }}</p>
            <p>ethnicity: {{ $pornstar->attributes->ethnicity }}</p>
            <p>tattoos: {{ $pornstar->attributes->tattoos }}</p>
            <p>piercings: {{ $pornstar->attributes->piercings }}</p>
            <p>breastSize: {{ $pornstar->attributes->breastSize }}</p>
            <p>breastType: {{ $pornstar->attributes->breastType }}</p>
            <p>gender: {{ $pornstar->attributes->gender }}</p>
            <p>orientation: {{ $pornstar->attributes->orientation }}</p>
            <p>age: {{ $pornstar->attributes->age }}</p>
        </div>
        <div class="attributes" onclick="toggleAttributes(this)">Stats</div>
        <div class="attributes-list">
            <p>subscriptions: {{ $pornstar->stats->subscriptions }}</p>
            <p>monthlySearches: {{ $pornstar->stats->monthlySearches }}</p>
            <p>views: {{ $pornstar->stats->views }}</p>
            <p>videosCount: {{ $pornstar->stats->videosCount }}</p>
            <p>premiumVideosCount: {{ $pornstar->stats->premiumVideosCount }}</p>
            <p>whiteLabelVideoCount: {{ $pornstar->stats->whiteLabelVideoCount }}</p>
            <p>rank: {{ $pornstar->stats->rank }}</p>
            <p>rankPremium: {{ $pornstar->stats->rankPremium }}</p>
            <p>rankWl: {{ $pornstar->stats->rankWl }}</p>
        </div>
        <div class="attributes" onclick="toggleAttributes(this)">Aliases</div>
        <div class="attributes-list">
            @foreach ($pornstar->aliases as $alias)
                <p>{{ $alias->alias }}</p>
            @endforeach
        </div>

    </div>
</div>