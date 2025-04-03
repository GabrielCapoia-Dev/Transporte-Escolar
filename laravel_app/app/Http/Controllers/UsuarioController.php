<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Retorna todos os Usuarios
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Registra Usuario
     */
    public function store(Request $request)
    {
        //Validação dados de Entrada
        $validated = $request->validate([
            'nome' => 'required|string|min:3|max:30',
            'usuario' => 'required|string|min:3|max:30|unique:usuarios',
            'senha' => [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/[A-Z]/', // Letra maiúscula
                'regex:/[a-z]/', // Letra minúscula
                'regex:/\d/',    // Número
                'regex:/[@$!%*?&]/' // Caractere especial
            ],
            'confirma_senha' => 'required|same:senha',
            'status' => 'required|in:ativo,inativo',
            'tipo' => 'required|in:admin,user',
        ]);


        Usuario::create([
            'nome' => $validated['nome'],
            'usuario' => $validated['usuario'],
            'senha' => $validated['senha'],
            'status' => $validated['status'],
            'tipo' => $validated['tipo'],
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
