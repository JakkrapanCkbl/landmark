<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\Invoice_items;
use App\Models\Order;
use App\Models\Job;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderDetails extends Component
{
    public $invoiceId;
    public $invoice;
    public $invoice_items;
    public $job;

    public function mount($id)
    {
        $this->invoiceId = $id;
        $this->invoice = Invoice::findOrFail($id);
        $this->invoice_items = Invoice_items::where('invoice_id', $id)->get();
        $this->job = Job::findOrFail($id);
    }

    public function render_details_invoice($id)
    {
        $this->mount($id);
        return view('livewire.invoice.invoice-details_copy', ['invoice' => $this->invoice, 'invoiceitems' => $this->invoice_items]);
    }
    public function render_details($id)
    {
        $this->mount($id);
        return view('livewire.invoice.order-details', [
            'invoice' => $this->invoice, 'invoiceitems' => $this->invoice_items,
            'job' => $this -> job
        ]);
    }
    public function render_create()
    {
        return view('livewire.invoice.order-create');
    }
    public function render_edit($id)
    {
        $this->mount($id);
        return view('livewire.invoice.invoice-edit', ['invoice' => $this->invoice, 'invoiceitems' => $this->invoice_items]);
    }

    public function render_original()
    {
        return view('livewire.invoice.invoice-details-og', ['invoice' => $this->invoice]);
    }

    public function store(Request $request)
    {
        // Create the invoice
        $invoice = Invoice::create([
            'invoiceno' => $request->input('invoiceno'),
            'customer' => $request->input('customer'),
            'invoicedate' => Carbon::createFromFormat('d-m-Y', $request->input('invoicedate'))->format('Y-m-d'),
            'address' => $request->input('address'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Handle invoice items
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'description') !== false) {
                $index = str_replace('description', '', $key);
                $description = $value;
                $amountjob = $request->input('amountjob' . $index);

                Invoice_items::create([
                    'description' => $description,
                    'amountjob' => $amountjob,
                    'invoice_id' => $invoice->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('invoice.details', ['id' => $invoice->id])->with('success', 'Invoice updated successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->mount($id);
        $request->merge([
            'invoicedate' => Carbon::createFromFormat('d-m-Y', $request->input('invoicedate'))->format('Y-m-d')
        ]);

        // Access modified parameters
        $invoiceno = $request->input('invoiceno');
        $customer = $request->input('customer');
        $invoicedate = $request->input('invoicedate');
        $address = $request->input('address');

        // Update the invoice
        $invoice = Invoice::findOrFail($id);
        $invoice->invoiceno = $invoiceno;
        $invoice->customer = $customer;
        $invoice->invoicedate = $invoicedate;
        $invoice->address = $address;
        $invoice->save();

        $this->invoice->update($request->all());

        // Process invoice items
        foreach ($request->all() as $key => $value) {

            if (strpos($key, 'description') === 0) {
                $index = substr($key, 11); // Get the index from 'descriptionX'
                $description = $value;
                $amountjob = $request->input('amountjob' . $index);

                // Find existing item or create new
                $item = Invoice_items::where('invoice_id', $invoice->id)
                    ->where('description', $description)
                    ->first();

                if ($item) {
                    // Update existing item
                    $item->amountjob = $amountjob;
                    $item->save();
                } else {
                    Invoice_items::create([
                        'description' => $description,
                        'amountjob' => $amountjob,
                        'invoice_id' => $invoice->id,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->route('invoice.details', ['id' => $this->invoice->id])->with('success', 'Invoice updated successfully.');
    }
}
