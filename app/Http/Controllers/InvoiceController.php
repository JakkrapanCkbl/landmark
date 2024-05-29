<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
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

        Invoice::create($request->all());
        return redirect()->route('livewire.InvoiceList')->with('success', 'Invoice created successfully.');
    }

    public function update(Request $request, Invoice $invoice)
    {
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

        $invoice->update($request->all());
        return redirect()->route('livewire.InvoiceList')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('livewire.InvoiceList')->with('success', 'Invoice deleted successfully.');
    }

    public function showList()
    {
        return view('invoice.InvoiceList');
    }
}
