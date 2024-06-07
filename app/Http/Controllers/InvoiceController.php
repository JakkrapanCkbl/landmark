<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Livewire\InvoiceEdit;

class InvoiceController extends Controller
{
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // $invoice = Invoice::create([
        //     'invoice_number' => $request->invoice_number,
        //     'invoice_date' => $request->invoice_date,
        //     'from_name' => $request->from_name,
        //     'from_address' => $request->from_address,
        //     'from_email' => $request->from_email,
        //     'to_name' => $request->to_name,
        //     'to_address' => $request->to_address,
        //     'to_email' => $request->to_email,
        //     'total' => collect($request->items)->sum(function ($item) {
        //         return $item['quantity'] * $item['unit_price'];
        //     }),
        // ]);

        // foreach ($request->items as $item) {
        //     $invoice->items()->create([
        //         'description' => $item['description'],
        //         'quantity' => $item['quantity'],
        //         'unit_price' => $item['unit_price'],
        //         'subtotal' => $item['quantity'] * $item['unit_price'],
        //     ]);
        // }
        $request->validate([
            'invoiceno' => 'required|string|max:255|unique:invoices,invoiceno',
            'invoicedate' => 'required|date',
            'customer' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'amountjob' => 'required|integer|min:0',
            'remark' => 'nullable|string|max:255',
            'receiptno' => 'required|string|max:255',
            'receiptdate' => 'required|date',
        ]);

        // $invoice = Invoice::create([
        //     'invoiceno' => $request->invoiceno,
        //     'invoicedate' => $request->invoicedate,
        //     'customer' => $request->customer,
        //     'address' => $request->address,
        //     'description' => $request->description,
        //     'qty' => $request->qty,
        //     'amountjob' => $request->amountjob,
        //     'remark' => $request->remark,
        //     'receiptno' => $request->receiptno,
        //     'receiptdate' => $request->receiptdate,
        // ]);
        $invoice = Invoice::create($request->all());
        return redirect()->route('invoice.details', ['id' => $invoice->id])->with('success', 'Invoice created successfully.');
    }

    public function update(Request $request, $id) //Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($id);
        $request->validate([
            //     'invoiceno' => 'required|string|max:255|unique:invoices,invoiceno',
            // 'invoicedate' => 'required|date',
            //     'customer' => 'required|string|max:255',
            //     'address' => 'required|string|max:255',
            //     'description' => 'required|string|max:255',
            // 'qty' => 'required|integer|min:0',
            // 'amountjob' => 'required|integer|min:0',
            // 'remark' => 'nullable|string|max:255',
            // 'receiptno' => 'required|string|max:255',
            // 'receiptdate' => 'required|date',
        ]);

        $invoice->update($request->all());
        // dd("this is ", $invoice);
        return redirect()->route('invoice.details', ['id' => $invoice->id])->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('livewire.invoice-list')->with('success', 'Invoice deleted successfully.');
    }

    public function list()
    {
        return view('livewire.invoice.invoice-list');
    }

    // public function render($id)
    // {
    //     $this->mount($id);
    //     return view('livewire.invoice-edit', ['invoice' => $this->invoice, 'id' => $id]);
    // }
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('livewire.invoice.invoice-edit', ['invoice' => $invoice]);
    }
    public function create()
    {
        return view('livewire.invoice.invoice-create');
    }
}
