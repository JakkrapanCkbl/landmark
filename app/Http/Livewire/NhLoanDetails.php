<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\Job;

class NhLoanDetails extends Component
{
    public $invoiceId;
    public $invoice;
    public $job;

    public function mount($id)
    {
        $this->invoiceId = $id;
        $this->invoice = Invoice::findOrFail($id);

        $this->job = Job::findOrFail($id);
    }

    public function render($id)
    {
        $this->mount($id);
        return view('livewire.invoice.nhloan-details', ['invoice' => $this->invoice, 'job' => $this->job]);
    }
}