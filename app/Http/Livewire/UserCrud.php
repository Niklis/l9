<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use App\Http\Livewire\Modal;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserCrud extends Modal
{
    use WithFileUploads;

    public $userId; // for edit() method
    public $user = [];
    public $upload;
    public $previewPath;
    public $avatarsDir = 'avatars/';
    // public $confirmDelete = false;

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . optional($this->user)['id'] . ',id',
            'upload' => 'nullable|image|mimes:jpg,jpeg,png,gif', //|max:1024
            'user.profile.avatar' => 'sometimes',
            'user.profile.tel' => 'regex:/^([0-9\s\-\+\(\)]*)$/',
        ];
    }

    public function mount()
    {
        $this->actionView = 'user.create';

        $this->user = (new User())->toArray();
        $this->user['profile'] = (new Profile(['avatar' => 'no_avatar.png', 'tel' => '']))->toArray();

        $this->previewPath = 'no_avatar.png';
        $this->upload = '';
        // $this->confirmDelete = false;

        parent::mount();
    }

    protected function resetFieldsAndErrors()
    {
        $this->resetAction();

        $this->previewPath = 'no_avatar.png';
        $this->upload = '';
        $this->user = [];
        // $this->confirmDelete = false;

        $this->resetErrorBag();
        $this->resetValidation();

        $this->sessionLog && Session::push('msg', 'UserCrud resetFieldsAndErrors');
    }

    public function create()
    {
        $this->resetAction();
        $this->actionView = 'user.create';
        $this->action = 'create';

        // dd('CREATE---', $this->user);

        $this->sessionLog && Session::push('msg', 'UserCrud create');
        $this->open();
    }

    public function edit($id = null)
    {
        $this->resetAction();
        $this->actionView = 'user.edit';
        $this->action = 'edit';
        $this->userId = $id;

        try {
            $this->user = (User::findOrFail($this->userId)->load('profile'))->toArray();

            if (!$this->user['profile']) {
                $this->user['profile'] = (new Profile(['avatar' => 'no_avatar.png', 'tel' => '']))->toArray();
            }

            if (!$this->user['profile']['avatar']) {
                $this->previewPath = 'no_avatar.png';
            } else {
                $this->previewPath = $this->user['profile']['avatar'];
            }

            // dd('EDIT---', $this->user['profile']['avatar']);

        } catch (\Exception $ex) {
            $this->sessionLog && Session::push('msg', 'UserCrud edit findOrFail ERROR: ' . $ex);
            $this->dispatchBrowserEvent('error', Session::get('msg'));
            return;
        }
        $this->sessionLog && Session::push('msg', 'UserCrud edit ' . $id);
        $this->open();
    }

    public function store()
    {
        $validatedData = $this->validate();
        // dd('STORE---', $validatedData);
        try {
            $newUser = User::create([
                ...$validatedData['user'],
                'password' => Hash::make('zontik'),
            ]);

            $newUser->profile()->create([
                'avatar' => $this->previewPath,
                'tel' => $validatedData['user']['profile']['tel'],
            ]);

            $this->sessionLog && Session::push('msg', 'UserCrud store success:   ' . $newUser, $newUser->profile);
            $this->dispatchBrowserEvent('itemStored', Session::get('msg'));
            $this->close();
        } catch (\Exception $ex) {
            $this->sessionLog && Session::push('msg', 'UserCrud store created ERROR: ' . $ex);
            $this->dispatchBrowserEvent('error', Session::get('msg'));
        }
    }

    public function update($id = null)
    {
        $validatedData = $this->validate();

        try {
            $updatedUser = User::with('profile')->findOrFail($id);

            $updatedUser->update([
                ...$validatedData['user'],
                'password' => Hash::make('zontik'),
            ]);

            //if profile doesn't exist, create it
            if (!$updatedUser->profile) {
                $updatedUser->profile()->create([ //create
                    'avatar' => $this->previewPath,
                    'tel' => $validatedData['user']['profile']['tel'],
                ]);
            } else {
                $updatedUser->profile()->update([ //update
                    'avatar' => $this->previewPath,
                    'tel' => $validatedData['user']['profile']['tel'],
                ]);
            }


            // dd('UPDATE---', $updatedUser->profile);

            $this->sessionLog && Session::push('msg', 'UserCrud updated success: ' . $this->userId);
            $this->dispatchBrowserEvent('itemUpdated', Session::get('msg'));
            $this->close();
        } catch (\Exception $ex) {
            $this->sessionLog && Session::push('msg', 'UserCrud updated ERROR: ' . $ex);
            $this->dispatchBrowserEvent('error', Session::get('msg'));
        }
    }

    public function delete($id = null)
    {
        $this->resetAction();
        $this->action = 'delete';
        $user = User::findOrFail($id)->load('profile');
        
        if (
            $user->profile != null
            && $user->profile->avatar != 'no_avatar.png'
            && Storage::disk('public')->exists($this->avatarsDir . $user->profile->avatar)
        ) {
            Storage::disk('public')->delete($this->avatarsDir . $user->profile->avatar);
        }

        $user->profile()->delete();
        $user->delete();

        $this->dispatchBrowserEvent('itemDeleted', $id);
    }

    public function updating($field)
    {
        //delete old avatar image
        if ($field == 'upload' && $this->previewPath != 'no_avatar.png') {
            Storage::disk('public')->delete($this->avatarsDir . $this->previewPath);
        }
        // dump('UPDATING---', $this);
    }

    public function updated($field)
    {
        if ($field == 'upload') {
            $this->previewPath = basename(
                Storage::putFileAs(
                    'public/avatars',///разобраться с директориями
                    $this->upload,
                    Carbon::now()->timestamp . '.' . $this->upload->extension()
                )
            );
        }
        $this->validateOnly($field);
        // dd('UPDATED---', $this);
    }

    public function close()
    {
        $this->resetFieldsAndErrors();
        parent::close();
    }

    public function render()
    {
        // dump('RENDER---', $this);
        return view('livewire.' . $this->actionView);
    }
}
