<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\Users;


/**
 * @OA\Tag(
 *     name="Programs",
 *     description="Operaciones relacionadas con Programs"
 * )
 */
class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/programs/page/{id}",
     *     summary="Obtiene todos los usuarios",
     *     tags={"Programs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de programs")
     * )
     */
    public function index($page)
    {
        try {
            $perPage = 5;
            $offset = ($page - 1) * $perPage;
            $programs = Programs::offset($offset)
                ->limit($perPage)
                ->get();
            return response()->json($programs, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los desafíos: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/programs",
     *     summary="Crea un nuevo usuario",
     *     tags={"Programs"},
     *     @OA\Schema(type="integer"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="start_date", type="date"),
     *             @OA\Property(property="end_date", type="date"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Usuario creado exitosamente")
     * )
     */
    public function store(Request $request)
    {
        $userId = $request->user_id;
        $existingUser = Users::find($userId);
        if (!$existingUser) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        $programs = new Programs();
        $programs->title = $request->title;
        $programs->description = $request->description;
        $programs->start_date = $request->start_date;
        $programs->end_date = $request->end_date;
        $programs->user_id = $request->user_id;
        $programs->save();

        return response()->json($programs, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/programs/{id}",
     *     summary="Obtiene el usuario por ID",
     *     tags={"Programs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de usuarios")
     * )
     */
    public function show($id)
    {
        return Programs::findOrFail($id);
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
     * @OA\Put(
     *     path="/api/programs/{id}",
     *     summary="Actualiza un program existente",
     *     tags={"Programs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del program a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="start_date", type="date"),
     *             @OA\Property(property="end_date", type="date"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Usuario actualizado exitosamente"),
     *     @OA\Response(response="404", description="Usuario no encontrado"),
     *     @OA\Response(response="422", description="Error de validación")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $programs = Programs::findOrFail($id);

            if ($request->has('user_id')) {
                $userId = $request->user_id;
                $existingUser = Users::find($userId);
                if (!$existingUser) {
                    return response()->json(['error' => 'program no encontrado'], 404);
                }
                $programs->user_id = $userId;
            }

            if ($request->has('title')) {
                $programs->name = $request->name;
            }
            if ($request->has('description')) {
                $programs->image_path = $request->image_path;
            }
            if ($request->has('start_date')) {
                $programs->industry = $request->industry;
            }
            if ($request->has('end_date')) {
                $programs->location = $request->location;
            }

            $programs->save();
            return response()->json($programs, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'challenge no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el challenge'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *     path="/api/programs/{id}",
     *     summary="Elimina un usuario existente",
     *     tags={"Programs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del usuario a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Usuario eliminado exitosamente"),
     *     @OA\Response(response="404", description="Usuario no encontrado")
     * )
     */
    public function destroy($id)
    {
        Programs::dropIfExists('programs');
    }
}
