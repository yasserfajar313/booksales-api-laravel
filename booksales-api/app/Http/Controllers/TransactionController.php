<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // READ ALL (ADMIN)
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    // SHOW (CUSTOMER)
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $transaction
        ]);
    }

    // CREATE (CUSTOMER)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['order_number'] = 'ORD-' . time();

        $transaction = Transaction::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction
        ], 201);
    }

    // UPDATE (CUSTOMER)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'quantity' => 'integer|min:1',
            'total_price' => 'numeric|min:0',
            'status' => 'string'
        ]);

        $transaction->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaction
        ]);
    }

    // DELETE (ADMIN)
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $transaction->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil dihapus'
        ]);
    }
}
