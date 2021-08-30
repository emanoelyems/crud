<?php
 
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
 
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // listar todos os produtos
         $produtos = Produto::orderBy('nome', 'ASC')->get();
        
         //dd($produtos);
         return view('produto.index', ['produtos' => $produtos]);
 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
 
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        //
 
        //$data = $request->all();
        // dd($data);
        $message = [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O campo nome precisa ter no mínimo :min caracteres!',
            'descricao.required' => 'O campo descricao é obrigatório!', 
        ];
 
        $validateData = $request->validate([
            'nome'      => 'required|min:4',
            'descricao' =>  'required',
         ], $message);
 
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->save();
 
        return redirect()->route('produto.index')->with('message', 'Produto criado com sucesso!');
 
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
 
        $produto = Produto::findOrFail($id);
        // dd($produto);
        return view('produto.show', ['produto' => $produto]);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd("Editar o registro {id}");
        $produto = Produto::findOrFail($id);
        return view('produto.edit', ['produto' => $produto]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
 
        $message = [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O campo nome precisa ter no mínimo :min caracteres!',
            'descricao.required' => 'O campo descricao é obrigatório!', 
        ];
 
        $validateData = $request->validate([
            'nome'      => 'required|min:4',
            'descricao' =>  'required',
         ], $message);
 
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->save();
 
        return redirect()->route('produto.index')->with('message', 'Produto editado com sucesso!');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('DESTROY');
        $produto = Produto::findOrFail($id);
        $produto->delete();
        
        return redirect()->route('produto.index')->with('message', 'Produto excluído com sucesso!');
    }
}
