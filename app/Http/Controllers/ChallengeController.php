<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Models\Users;

/**
 * @OA\Tag(
 *     name="Challenges",
 *     description="Endpoints para manejar Challenges"
 * )
 */
class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *     path="/api/challenges/page/{id}",
     *     summary="Obtiene todos los challenges",
     *     tags={"Challenges"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de challenges")
     * )
     */
    public function index($page)
    // public function index()
    {
        try {
            $perPage = 10;
            $offset = ($page - 1) * $perPage;
            $challenges = Challenge::with('user')
                ->offset($offset)
                ->limit($perPage)
                ->get();
            return response()->json($challenges, 200);
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
     * 
     * 
     * @OA\Post(
     *     path="/api/challenges",
     *     summary="Crea un nuevo challenge",
     *     tags={"Challenges"}, 
     *     @OA\Schema(type="integer"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="difficulty", type="int"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="challenge creado exitosamente")
     * )
     */
    public function store(Request $request)
    {
        try {
            $userId = $request->user_id; 
            $existingUser = Users::find($userId);
            if (!$existingUser) {
                return response()->json(['error' => 'challenge no encontrado'], 404);
            }

            $challenge = new Challenge();
            $challenge->title = $request->title;
            $challenge->description = $request->description;
            $challenge->difficulty = $request->difficulty;
            $challenge->user_id = $request->user_id;
            $challenge->save();
            return response()->json($challenge, 201);
        } catch (\Exception $e) {
            // En caso de error, devolver una respuesta de error
            return response()->json(['error' => 'Error al crear el desafío: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *     path="/api/challenges/{id}",
     *     summary="Obtiene el challenge por ID",
     *     tags={"Challenges"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de challenges")
     * )  
     */
    public function show($id)
    {
        return Challenge::findOrFail($id);
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
     * 
     * @OA\Put(
     *     path="/api/challenges/{id}",
     *     summary="Actualiza un challenge existente",
     *     tags={"Challenges"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del challenge a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="difficulty", type="int"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="challenge actualizado exitosamente"),
     *     @OA\Response(response="404", description="challenge no encontrado"),
     *     @OA\Response(response="422", description="Error de validación")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $challenge = Challenge::findOrFail($id);

            if ($request->has('user_id')) {
                $userId = $request->user_id; 
                $existingUser = Users::find($userId);
                if (!$existingUser) {
                    return response()->json(['error' => 'challenge no encontrado'], 404);
                }
                $challenge->user_id = $userId;
            }

            if ($request->has('title')) {
                $challenge->title = $request->title;
            }
            if ($request->has('description')) {
                $challenge->description = $request->description;
            }
            if ($request->has('difficulty')) {
                $challenge->difficulty = $request->difficulty;
            }

            $challenge->save();
            return response()->json($challenge, 200);
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
     * 
     * @OA\Delete(
     *     path="/api/challenges/{id}",
     *     summary="Elimina un challenge existente",
     *     tags={"Challenges"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del challenge a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="challenge eliminado exitosamente"),
     *     @OA\Response(response="404", description="challenge no encontrado")
     * )
     */

    public function destroy($id)
    {
        {
            $challenge = Challenge::destroy($id);
            return $challenge;
        }
    }
}
