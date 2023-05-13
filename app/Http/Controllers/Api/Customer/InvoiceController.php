<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\InvoiceResource;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = $request->user()->invoices()
            ->with(['invoiceItems', 'payments'])
            ->latest()
            ->get();

        return InvoiceResource::collection($invoices);
    }

    public function show(Invoice $invoice, Request $request)
    {
        return InvoiceResource::make(
            $invoice->load([
                'marina.address',
                'marinaStaff',
                'user.billingAddress',
                'boat',
                'boatYard',
                'invoiceItems',
                'payments'
            ])
        );
    }
}
