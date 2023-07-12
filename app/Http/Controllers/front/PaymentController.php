<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    //
    public function process(Request $request)
    {
        // $request->validate([
        //     'amount' => 'required|numeric|min:1',
        //     'cardInformation' => 'required',
        //     'expiration_month' => 'required|numeric|min:1|max:12',
        //     'expiration' => 'required',
        //     'cvv' => 'required',
        // ]);
        // تهيئة مكتبة Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // استلام بيانات الفاتورة من الطلب
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $country = $request->input('country');
        $streetAddress = $request->input('streetaddress');
        $cardInformation = $request->input('cardinformation');
        $expiration = $request->input('expiration');
        $cvv = $request->input('cvv');
        $expiration_month = $request->input('expiration_month');
        $postcodeZip = $request->input('postcodezip');
        $phone = $request->input('phone');
        $email = $request->input('emailaddress');
        $paymentMethod = $request->input('payment_method');
        $termsConditions = $request->input('terms_conditions');

        // إجراء عملية الدفع باستخدام Stripe
        try {
            // إنشاء الفاتورة
            $charge = Charge::create([
                'amount' => 1760, // المبلغ بوحدة العملة الصغرى (في هذا المثال: سنت)
                'currency' => 'usd',
                'description' => 'Payment for Order',
                'source' =>  [
                    'object' => 'card',
                    'number' => $request->cardInformation,
                    'expiration_month' => sprintf('%02d', $request->expiration_month), // Ensure two-digit format
                    'exp_year' => $request->expiration,
                    'cvc' => $cvv,
                ]

            ],
        );

            // قم بتنفيذ أي إجراءات إضافية هنا (على سبيل المثال: تحديث قاعدة البيانات)

            // إرجاع رسالة الاستجابة بنجاح
            return response()->json(['message' => 'Payment processed successfully.']);
        } catch (\Exception $e) {
            // حدث خطأ أثناء معالجة الدفع
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
