<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Friends;

class AmigosController extends Controller
{
    public function index(Request $request)
    {
        $amigos = Friends::all();
        return view('amigos.index', compact('amigos'));
    }

    public function create()
    {
        return view('amigos.create');
    }

    public function store(Request $request)
    {
        $nomeAmigo = $request->input('name');
        $emailAmigo = $request->input('email');

        $amigoExistente = Friends::where('email', $emailAmigo)->first();

        if ($amigoExistente) {

            return redirect('/amigos')->with('error', 'Email já existe!');
        }

        $amigo = new Friends();
        $amigo->name = $nomeAmigo;
        $amigo->email = $emailAmigo;
        $amigo->save();

        return redirect('/amigos');
    }

    public function edit($id)
    {
        $amigo = Friends::find($id);
        return view('amigos.edit', compact('amigo'));
    }

    public function update(Request $request, $id)
    {
        $amigo = Friends::find($id);
        $amigo->name = $request->input('name');
        $amigo->email = $request->input('email');
        $amigo->save();

        return redirect('/amigos');
    }

    public function destroy($id)
    {
        $amigo = Friends::find($id);
        if ($amigo) {
            $amigo->delete();
            return redirect('/amigos')->with('success', 'Amigo deletado com sucesso!');
        } else {
            return redirect('/amigos')->with('error', 'Amigo não encontrado!');
        }
    }


    public function sorteio()
    {
        $amigos = Friends::all()->shuffle();

        if (count($amigos) < 2) {
            return redirect('/amigos')->with('error', 'Não temos amigos suficientes para realizar o sorteio');
        }

        $sorteio = [];
        $amigoAnterior = $amigos->first();

        foreach ($amigos as $index => $amigo) {
            if ($index == 0) {
                continue;
            }

            $sorteio[] = [
                'amigo1' => $amigoAnterior->name,
                'amigo2' => $amigo->name
            ];

            $amigoAnterior = $amigo;
        }

        $sorteio[] = [
            'amigo1' => $amigoAnterior->name,
            'amigo2' => $amigos->first()->name
        ];

        return view('amigos.sorteio', compact('sorteio'));
    }


    public function buscarAmigo(Request $request)
    {
        $busca = $request->input('busca');

        $amigos = Friends::where('email', 'LIKE', '%' . $busca . '%')
                        ->orWhere('name', 'LIKE', '%' . $busca . '%')
                        ->get();

        return view('amigos.index', compact('amigos'));
    }

}
