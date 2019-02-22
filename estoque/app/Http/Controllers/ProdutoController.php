<?php namespace estoque\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use estoque\Http\Requests\ProdutosRequest;
use Illuminate\Support\Facades\Request;
use estoque\Produto;

class ProdutoController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['novo', 'edita', 'remove']]);

        /*
        $this->middleware('appMiddleware',
                          ['only' => ['adiciona', 'edita', 'remove']]);
        */
    }

    public function lista() {

        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();

        // return view('listagem')->with('produtos', array());
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function listaJson() {
        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();

        //return $produtos;
        return response()->json($produtos);
    }

    public function mostra($id) {

        // Path Param -> produtos/mostra?id=1
        // $id = Request::input('id', '0');

        // Route param -> produtos/mostra/1
        // $id = Request::route('id');

        //$resposta = DB::select('select * from produtos where id = ?', [$id]);
        $produto = Produto::find($id);

        if (empty($produto)) {
            return 'Produto inexistente: ' . $id;
        }
        return view('produto.detalhes')->with('p', $produto);
    }

    public function novo() {
        return view('produto.formulario')->with('action', action('ProdutoController@adiciona'));
    }

    public function edita($id) {
        $produto = Produto::find($id);

        if (empty($produto)) {
            return 'Produto inexistente: ' . $id;
        }
        return view('produto.edicao')
            ->with('p', $produto)
            ->with('action', action('ProdutoController@atualiza', $produto->id));
    }

    public function adiciona(ProdutosRequest $request) {

        /*
        $validator = Validator::make(
            [’nome’ => Request::input(’nome’)],
            [’nome’ => ’required|min:5’]
        );

        if ($validator->fails())
        {
            return redirect()
                ->action(’ProdutoController@novo’);
        }
        */

        /*
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        // Insert direto
        //DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?, ?, ?, ?)',
        //            array($nome, $descricao, $valor, $quantidade));

        // Insert com Query Builder
        DB::table('produtos')->insert(['nome' => $nome,
                                             'valor' => $valor,
                                             'descricao' => $descricao,
                                             'quantidade' => $quantidade
                                            ]);
        */

        // Usar o fillable na classe Produto para usar desta forma
        //$params = Request::all();
        //$produto = new Produto($params);
        //$produto->save();

        /*
        $produto = new Produto();
        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');
        $produto->save();
        */

        //return implode(', ', array($nome, $descricao, $valor, $quantidade));
        //return view('produto.adicionado')->with('nome', $nome);

        // Para manter os dados da requisição
        // No exemplo, apenas o nome será mantido
        //return redirect('/produtos')->withInput(Request::only('nome'));

        Produto::create($request->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function atualiza($id) {
        $produto = Produto::find($id);
        $produto->update(Request::all());

        /*
        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');
        $produto->save();
        */

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function remove($id) {

        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

}