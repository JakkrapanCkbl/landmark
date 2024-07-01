<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\Job;

class HLoanDetails extends Component
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

    public function render_details($id)
    {
        $this->mount($id);
        return view('livewire.invoice.h-loan-details', ['invoice' => $this->invoice, 'job' => $this->job]);
    }

    public function render_edit($id)
    {
        $this->mount($id);
        return view('livewire.invoice.h-loan-edit', ['invoice' => $this->invoice, 'job' => $this->job]);
    }
}
