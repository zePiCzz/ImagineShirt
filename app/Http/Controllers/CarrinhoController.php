<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use App\Models\Colors;
use App\Models\Tshirt_images;
use App\Models\Orders;
use App\Models\Prices;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session('carrinho', []);

        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de compras')
            ->with('carrinho', $carrinho);
    }

    public function adicionar(Request $request, Tshirt_images $tshirt_images)
    {

        //ir buscar a penas a primeira linha da tabela prices

        $prices = Prices::first();
        $tshirtId = $request->input('tshirt_id');
        $tamanho = $request->input('tamanho');
        $cor = $request->input('color_code');
        $color_name = Colors::where('code', $cor)->pluck('name')->first();
        $quantidade = $request->input('quantidade');
        $nome = Tshirt_images::where('id', $tshirtId)->pluck('name')->first();
        $image_url = Tshirt_images::where('id', $tshirtId)->pluck('image_url')->first();
        if($quantidade >= 5){
            $sub_total = $prices->unit_price_catalog_discount * $quantidade;
        }else{
            $sub_total = $prices->unit_price_catalog * $quantidade;
        }


        // Lógica para adicionar os dados ao carrinho
        $carrinho = session('carrinho', []);
        if (isset($carrinho[$tshirtId])) {
            // Se a tshirt já estiver no carrinho, apenas atualiza a quantidade
            $carrinho[$tshirtId]['qty'] += $quantidade;
        } else {
            // Se a tshirt ainda não estiver no carrinho, adiciona como um novo item
            $carrinho[$tshirtId] = [
                'qty' => $quantidade,
                'nome' => $nome,
                'preco' => $sub_total,
                'tamanho' => $tamanho,
                'cor' => $color_name,
                'cor_code' => $cor,
                'imagem' => $image_url ? asset('storage/tshirt_images/' . $image_url) : asset('img/default_img.png'),
            ];
        }

        session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', 'Item adicionado ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function update_carrinho(Request $request, Order_items $order_items)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $qty = ($carrinho[$order_items->id]['qty'] ?? 0);
        $qty += $request->input('qty');
        if ($request->input('qty') <= 0) {
            unset($carrinho[$order_items->id]);
            $msg = 'Item removido do carrinho!';
        } elseif ($request->input('qty') > 0) {
            $carrinho[$order_items->id] = [
                'qty' => $qty,
                'nome' => $order_items->name,
                'preco' => $order_items->unit_price,
                'tamanho' => $order_items->size,
                'cor' => $order_items->color_code,
                'imagem' => $order_items->tshirt_image_id,
            ];
        }
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', $msg ?? 'Item atualizado no carrinho!')
            ->with('alert-type', 'success');
    }

    public function remover(Request $request, $tshirtId)
    {
        $carrinho = $request->session()->get('carrinho', []);

        if (array_key_exists($tshirtId, $carrinho)) {
            unset($carrinho[$tshirtId]);
            $request->session()->put('carrinho', $carrinho);
            return back()->with('alert-msg', 'Item removido do carrinho!')->with('alert-type', 'success');
        }

        return back()->with('alert-msg', 'O item não existe no carrinho!')->with('alert-type', 'warning');
    }

    public function confirmarCompra(Request $request)
    {
        // Obtenha os itens do carrinho da sessão
        $carrinho = $request->session()->get('carrinho', []);
        //dd($carrinho);
        // Salve os itens do carrinho na tabela Order_items
        foreach ($carrinho as $tshirtId => $item) {
            // Criar uma nova instância do modelo Order
            $order = new Orders();
            // Defina os campos da
            $order->status = 'pending'; // Defina o status desejado para a ordem
            $order->customer_id = auth()->user()->id;
            $order->date = now()->format('Y-m-d');
            $order->total_price = $item['qty'] * $item['preco'];
            $order->nif = request()->nif;
            $order->address = request()->address;
            $order->payment_type = request()->payment_type;
            $order->payment_ref = request()->payment_ref;
            $order->save();
        }

        foreach ($carrinho as $tshirtId => $item) {
            $orderItem = new Order_items();
            $orderItem->order_id = $order->id; // Defina o ID do pedido adequado
            $orderItem->tshirt_image_id = $tshirtId;
            $orderItem->color_code = $item['cor_code'];
            $orderItem->size = $item['tamanho'];
            $orderItem->qty = $item['qty'];
            $orderItem->unit_price = $item['preco'];
            $orderItem->sub_total = $item['qty'] * $item['preco'];
            $orderItem->save();
        }
        // Limpe o carrinho da sessão
        $request->session()->forget('carrinho');

        // Redirecione para uma página de confirmação de compra ou outra página adequada
        return redirect()->route('tshirt_images.index')->with('alert-msg', 'Compra confirmada com sucesso!');
    }

    public function exibirFormularioInformacoesAdicionais(Request $request)
    {
        // Obtenha os itens do carrinho da sessão
        $carrinho = session('carrinho', []);

        return view('carrinho.confirmar-compra', compact('carrinho'));
    }
}
