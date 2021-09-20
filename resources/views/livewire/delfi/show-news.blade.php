<div>
    <h3 class="text-center">
        DELFI > RSS > {{strtoupper(Auth::user()->setting('channel'))}}
    </h3>

    @foreach ($posts as $post)
        <div>
            <div class="py-2">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="max-w-xl mx-auto px-3 prose lg:prose-xl border-gray-200">
                            <a href="{{ $post['link'] }}"
                               class="text-xl font-bold mb-2">{!! Str::limit($post['title'], 50) !!} </a>
                            {{--                        <h3>{{ $post['title']  }}</h3>--}}
                            <p>{!! Str::limit($post['description'], 200) !!}</p>
                            <p><i>Posted {{\Carbon\Carbon::parse($post['pubDate'])->diffForHumans() }}</i></p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            {{ $posts->links() }}

        </div>
