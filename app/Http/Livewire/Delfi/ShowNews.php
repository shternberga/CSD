<?php

namespace App\Http\Livewire\Delfi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\DelfiRSS\DelfiService;
use App\Services\helpers\XmlHelper;
use Illuminate\Support\Facades\Auth;

class ShowNews extends Component
{
    use WithPagination;
    public function render()
    {
        $user = Auth::user();
        $channel = null;
        $records_count = 10;

        if ($user) {
            $channel = $user->setting('channel');
            $records_count = $user->setting('records_count');
        }

        $news = DelfiService::getNews($channel);

        $news = XmlHelper::recordsToCollection($news);

        return view('livewire.delfi.show-news', [

            'posts' => $news->paginate($records_count),

        ]);
    }
}
