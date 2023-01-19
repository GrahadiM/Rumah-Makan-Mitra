<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Transaction::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);
            }

            if ($callback->isExpire()) {
                Transaction::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                Transaction::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
