<?php

namespace App\Http\Controllers\API\Order;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }



    
    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        /* $product = Product::find($request->product); */
        $order = $request->order;

        //0) recuperare l'id del ristorante e dei singoli piatti e controllare che quei piatti esistano per quel singolo ristorante, se si continuo, altrimenti ritorni erorre
        //1)recuperare per ogni id inserito nell'array $request->order il prezzo dal db
        //2)moltiplicare per ogni prodotto il prezzo recuperato precedentemente dal DB e la quantità che abbiamo in $request->order con la chiave quantità
        //3) creare una variabile sum, che somma il prezzo di ogni prodotto già moltiplicato per la quantità
        //4) modificare l'amount, perchè non deve ricevere più order, ma adesso deve ricevere il prezzo totale dell'ordine(controllare la valuta)
        //5)creare un form lato user che indichi il nome, il cognome, l'indirizzo,l'email,numero telefono,prezzo totale(che dobbiamo calcolare e salvare non in fase di salvataggio),data(recuperandola dal sistema)
        


        $result = $gateway->transaction()->sale([
            'amount' => 10,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            // se la transazione è avvenuta con successo, allora creiamo un'istanza di Oreder per salvare i dati

            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!",
                'order' => $order,
                'paymentMethodNonce' => $request->token,
                'all'=>$request->all(),
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!",
                'order' => $order,
                'paymentMethodNonce' => $request->token,
                'all'=>$request->all(),
            ];
            return response()->json($data, 401);
        }
    }
}
