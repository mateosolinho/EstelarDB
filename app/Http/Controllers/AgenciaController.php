<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;

/**
 * Class AgenciaController
 * @package App\Http\Controllers
 */
class AgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencias = Agencia::paginate();

        return view('agencia.index', compact('agencias'))
            ->with('i', (request()->input('page', 1) - 1) * $agencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencia = new Agencia();
        return view('agencia.create', compact('agencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Agencia();
        $this->validate($request,[
            'nombre'=>'required',
            'imagen'=>'required|image|mimes:png,jpg|max:5000'
        ]);


        $file=$request->file('imagen');
        $rutaImagen=$file->store('imagenes',['disk'=>'public']); // Crea disco donde guarda las imagenes
        $data->nombre=$request->nombre;
        $data->imagen=$rutaImagen;

        $data->save();

        return redirect()->route('agencias.index')
            ->with('success', 'Agencia creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agencia = Agencia::find($id);

        return view('agencia.show', compact('agencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agencia = Agencia::find($id);

        return view('agencia.edit', compact('agencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Agencia $agencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencia $agencia)
    {
        // request()->validate(Agencia::$rules);

        // $agencia->update($request->all());


        $this->validate($request,[
            'nombre'=>'required',
            'imagen'=>'required|image|mimes:png,jpg|max:5000'
        ]);


        $file=$request->file('imagen');
        $rutaImagen=$file->store('imagenes',['disk'=>'public']); // Crea disco donde guarda las imagenes
        $agencia->nombre=$request->nombre;
        $agencia->imagen=$rutaImagen;

        $agencia->update();

        return redirect()->route('agencias.index')
            ->with('success', 'Agencia actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $agencia = Agencia::find($id)->delete();

        return redirect()->route('agencias.index')
            ->with('success', 'Agencia borrada con exito');
    }
}
