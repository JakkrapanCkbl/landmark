<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\Invoice_items;


class QuotationDetails extends Component
{
    public $invoiceId;
    public $invoice;
    public $invoice_items;

    public function mount($id)
    {
        $this->invoiceId = $id;
        $this->invoice = Invoice::findOrFail($id);
        $this->invoice_items = Invoice_items::where('invoice_id', $id)->get();
    }

    public function render_details_short_form($id)
    {
        $this->mount($id);
        return view('livewire.invoice.quotation-details-short', ['invoice' => $this->invoice, 'invoiceitems' => $this->invoice_items]);
    }
    public function render_details_long_form($id)
    {
        $this->mount($id);
        return view('livewire.invoice.quotation-details-long', ['invoice' => $this->invoice, 'invoiceitems' => $this->invoice_items]);
    }
}
