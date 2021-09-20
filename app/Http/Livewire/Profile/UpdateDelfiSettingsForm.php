<?php

namespace App\Http\Livewire\Profile;

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateDelfiSettingsForm extends Component
{
    public $channel;

    public $records_count;

    protected $rules = [
        'channel' => 'required|max:20',
        'records_count' => 'required|integer|gt:0'
    ];

    public function submit() {


        $validatedData = $this->validate();

        $user = Auth::user();

        if(!$user) {
            return;
        }

        $user->settings($validatedData);
    }

    public function render()
    {
        $user = Auth::user();

        $channels = Channel::orderBy('name', 'desc')->get();

        if($user) {
            $this->channel = $user->setting('channel');
            $this->records_count = $user->setting('records_count');
        }
        $this->emit('saved');
        return view('livewire.profile.update-delfi-settings-form')
            ->with('channels', $channels);
    }
}
