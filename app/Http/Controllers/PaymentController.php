<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    private $apiContext;

    public function index()
    {

        $conferencia = DB::table('eventos')
            ->leftjoin('ponentes', 'eventos.idPonente', '=', 'ponentes.id')
            ->leftjoin('categorias', 'eventos.idCategoria', '=', 'categorias.id')
            ->select(
                'eventos.nombre as evento',
                'eventos.fecha_evento',
                'eventos.hora_evento',
                'categorias.nombre as categoria',
                'ponentes.nombre as ponentenombre',
                'ponentes.apellidoPaterno as ponenteapellido'
            )
            ->get();



        $calendario = array();

        foreach ($conferencia as $confe) {
            $fecha = $confe->fecha_evento;

            $calendario[$fecha][] = $confe;
        }

        $congreso = DB::table('congresos')->first();

        return view('payments', compact('conferencia', 'calendario', 'congreso'));
    }


    public function __construct()
    {
        $payPalConfig = Config::get(key: 'paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['cliente_id'],
                $payPalConfig['secret'],
            )
        );
    }


    public function payWithPaypal()
    {
        $congreso = DB::table('congresos')->first();

        $cost = round(($congreso->precio) / 3.80, 2);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($cost);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);


        $callbackUrl =  url('/paypal/status');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


        // After Step 3
        try {
            $payment->create($this->apiContext);
            // echo $payment;

            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $congreso = DB::table('congresos')->first();
        $dni_registrado = Session::get('dni_registrado');
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            // Podríamos redirigir a la página que queramos
            $status = 'No se pudo proceder con el pago a través de Paypal';
            return redirect('/pago')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        // Ejecutar el pago
        $result = $payment->execute($execution, $this->apiContext);

        // dd($result);

        if ($result->getState() === 'approved') {

            DB::table('usuarios')->where('dni', $dni_registrado)
                ->update(['pagado' => 1, 'totalPago' => $congreso->precio, 'id_pago' => $result->getId(), 'fecha_pago' => $result->getCreateTime()]);

            $status = 'Gracias! El pago a través de Paypal se ha realizado correctamente';
            return redirect('/home')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de Paypal no se pudo realizar';
        return redirect('/pago')->with(compact('status'));
    }
}
