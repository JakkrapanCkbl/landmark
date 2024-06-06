<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;

class InvoiceEdit extends Component
{
    public $invoiceId;
    public $invoice;

    public function mount($id)
    {
        $this->invoiceId = $id;
        $this->invoice = Invoice::findOrFail($id);
    }

    public function render($id)
    {
        $this->mount($id);
        return view('livewire.invoice.invoice-edit', ['invoice' => $this->invoice, 'id' => $id]);
    }
}
