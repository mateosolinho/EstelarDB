<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Misione;
use Illuminate\Http\Request;

/**
 * Class MisioneController
 * @package App\Http\Controllers
 */
class MisioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $misiones = Misione::paginate();

        return view('misione.index', compact('misiones'))
            ->with('i', (request()->input('page', 1) - 1) * $misiones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misione = new Misione();
        $agencias=Agencia::pluck('nombre','id');
        return view('misione.create', compact('misione','agencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Misione::$rules);

        $misione = Misione::create($request->all());

        return redirect()->route('misiones.index')
            ->with('success', 'Mision creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $misione = Misione::find($id);

        return view('misione.show', compact('misione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $misione = Misione::find($id);
        $agencias=Agencia::pluck('nombre','id');

        return view('misione.edit', compact('misione','agencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Misione $misione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Misione $misione)
    {
        request()->validate(Misione::$rules);

        $misione->update($request->all());

        return redirect()->route('misiones.index')
            ->with('success', 'Misiona actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $misione = Misione::find($id)->delete();

        return redirect()->route('misiones.index')
            ->with('success', 'Mision borrada con exito');
    }
}
