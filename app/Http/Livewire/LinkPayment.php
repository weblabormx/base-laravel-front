<?php

/*
 * Livewire example component, removed it once you create another livewire component
 */

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wallet;
use App\Models\Payment;

class LinkPayment extends Component
{
    public $wallet;
    public $wallet_to_pay;
    public $total;
    public $step = 1;

    protected $queryString = ['total'];


    public function mount(Wallet $wallet)
    {
        $this->wallet = $wallet;
        if(isset($this->total) && auth()->check()) {
            $this->step = 2;
        }
    }

    public function firstStep()
    {
        $this->validate([
            'total' => 'required|integer',
        ]);
        if(!auth()->check()) {
            $url = '/pay/'.$this->wallet->slug.'?total='.$this->total;
            $url = urlencode($url);
            return redirect("/login?redirect_url={$url}");
        }

        $this->step = 2;
    }

    public function pay()
    {
        $this->validate([
            'wallet_to_pay' => 'required|integer',
        ]);

        $wallet_to_pay = auth()->user()->wallets()->find($this->wallet_to_pay);

        $payment = Payment::create([
            'wallet_id_from' => $wallet_to_pay->getKey(),
            'wallet_id_to' => $this->wallet->getKey(),
            'total' => $this->total,
            'type' => 'transfer',
            'description' => 'Link Payment',
            'extra_data' => [
                'type' => 'link',
            ],
        ]);

        $is_successfull = !is_null($payment->getKey());
        if($is_successfull) {
            $this->step = 3;
            $this->total = null;
        }
    }

    public function render()
    {
        return view('livewire.link-payment')->extends('layouts.auth');
    }
}
