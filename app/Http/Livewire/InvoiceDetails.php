<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;

class InvoiceDetails extends Component
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
        return view('livewire.invoice.invoice-details', ['invoice' => $this->invoice]);
    }
    public function render_original()
    {
        return view('livewire.invoice.invoice-details-og', ['invoice' => $this->invoice]);
    }
}
