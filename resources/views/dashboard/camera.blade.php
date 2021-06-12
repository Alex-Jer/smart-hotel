<x-dashboard.master title="Camera History" :regions="$regions">
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach (array_reverse($images) as $image)
            @if (($loop->index + 1) % 3 == 0)
                <div class="container mx-auto">
            @endif
            <div class="content-center">
                <span>{{ str_replace('_', ':', Str::limit($image->getFilename(), 19, '')) }}</span>
                <img src="{{ '/storage/parking/' . $image->getFilename() }}" alt="">
            </div>
            @if (($loop->index + 1) % 3 == 0)
    </div>
    @endif
    @endforeach
    </div>
</x-dashboard.master>
