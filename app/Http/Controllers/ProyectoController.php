<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Support\Str;
use App\Models\TipoProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        /* Consultar los Proyectos */
        // $proyectos = Proyecto::all();
        $proyectos = Proyecto::where('proyecto_id', '=', 1)
                            ->orderBy('created_at', 'DESC')
                            // ->get();
                            ->first(); /* Utilizamos first cuando queremos retornar un solo valor */

        dd($proyectos);

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        //$tipoProyectos = TipoProyecto::all(); /* Esto retorna todos los registros */
        //$tipoProyectos = TipoProyecto::find(2); /* Te muestra solo el id 2 */
        /* Consulta personalizada, permite ordenar de forma Ascendente || Con where podemos filtrar nuestra consulta */
        $tipoProyectos = TipoProyecto::where('estado', true)
                                    ->orderBy('nombre', 'ASC')
                                    ->get();

        //dd($tipoProyectos);

        /* Opción 1: Compartir datos a la vista con with() */
        //return view('proyectos.create')->with('tipoProyectos', $tipoProyectos);

        /* Opción 2: Compartir datos a la vista con compact() */
        return view('proyectos.create', compact('tipoProyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        /* Validar datos que se escruben en el formulario */
        $temp = $request->validate([
            'nombre' => 'required|string|min:5',
            'tipo_proyecto' => 'required|integer|exists:App\Models\TipoProyecto,id', /*exists permite validar los registros existentes en el modelo para evitar que inserten algun optro dato*/
            'descripcion' => 'required|string|min:30'
        ]);

        /* Primera forma para guardar datos (QB y Variable) */ /* Al usar un DB no le interesa lo que tenemos en el modelo por lo que sera necesario insertar todos los datos */
        // DB::table('proyectos')->insert([
        //     'nombre' => $temp['nombre'],
        //     'descripcion' => $temp['descripcion'],
        //     //'slug',
        //     'proyecto_id' => $temp['tipo_proyecto'],
        //     'estatus_id' => 1, // Pendiente
        //     'user_id' => Auth::user()->id
        // ]);

        /* Segunra forma para guardar datos (uso del Modelo) */
        // $proyecto = Proyecto::create([
        //     'nombre' => Str::title($request->input('nombre')),
        //     'descripcion' => Str::ucfirst($request->input('descripcion')),
        //     'slug' => Str::slug($request->nombre),
        //     'proyecto_id' => $request->input('tipo_proyecto'),
        //     'estatus_id' => 1, // Pendiente
        //     'user_id' => auth()->user()->id
        // ]);

        /* Tercera manera para guardar datos asociados a sesiones */
        $proyecto = auth()->user()->proyectos()->create([
            'nombre' => Str::title($request->input('nombre')),
            'descripcion' => Str::ucfirst($request->input('descripcion')),
            'slug' => Str::slug($request->nombre),
            'proyecto_id' => $request->input('tipo_proyecto'),
            'estatus_id' => 1, // Pendiente
            //'user_id' => auth()->user()->id /* De esta manera no es necesario pasarle el usuario ya que lo estamos agregando desde la instancia $proyecto */
        ]);

        // dd($proyecto);


        return redirect()->route('proyectos.index')
                        ->with('tipo', 'exitoso')
                        ->with('mensaje', "Proyecto {$request->nombre} creado exitosamente");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
