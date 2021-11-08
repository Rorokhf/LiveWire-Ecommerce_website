<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $pintrest;
    public $instgram;
    public $youtube;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twitter = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->pintrest = $setting->pintrest;
            $this->instgram = $setting->instgram;
            $this->youtube = $setting->youtube;
        }
    }
    public function update($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'pintrest' => 'required',
            'instgram' => 'required',
            'youtube' => 'required'
        ]);
    }
    public function saveSetting()
    {
        $this->validate([
            'email' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'pintrest' => 'required',
            'instgram' => 'required',
            'youtube' => 'required'
        ]);
        $setting = Setting::find(1);
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->twitter = $this->twitter;
        $setting->facebook =  $this->facebook;
        $setting->pintrest =  $this->pintrest;
        $setting->instgram =  $this->instgram;
        $setting->youtube =  $this->youtube;
        $setting->save();
        Session()->flash('message','Setting has been update successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
