<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramParticipant;
use App\Models\Users;
use App\Models\Programs;

/**
 * @OA\Tag(
 *     name="ProgramParticipants",
 *     description="Operaciones relacionadas con la relacion de programas y participantes"
 * )
 */
class ProgramParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/api/program_participants/page/{id}",
     *     summary="Obtiene todos los usuarios",
     *     tags={"ProgramParticipants"},
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
    public function index($page)
    {
        try {
            $perPage = 5;
            $offset = ($page - 1) * $perPage;
            $participants = ProgramParticipant::with('user', 'program')
                ->offset($offset)
                ->limit($perPage)
                ->get();
            return response()->json($participants, 200);
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
     *     path="/api/program_participants",
     *     summary="Crea un nuevo usuario",
     *     tags={"ProgramParticipants"},
     *     @OA\Schema(type="integer"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="program_id", type="iknt"),
     *             @OA\Property(property="entity_type", type="string"),
     *             @OA\Property(property="entity_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Usuario creado exitosamente")
     * )
     */
    public function store(Request $request)
    {
        try {
            $userId = $request->user_id;
            $existingUser = Users::find($userId);
            if (!$existingUser) {
                return response()->json(['error' => 'Realcion entre participante y programa no encontrado'], 404);
            }

            $participants = new ProgramParticipant();
            $participants->program_id = $request->program_id;
            $participants->entity_type = $request->entity_type;
            $participants->entity_id = $request->entity_id;
            $participants->save();
            return response()->json($participants, 201);
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
     * @OA\Get(
     *     path="/api/program_participants/{id}",
     *     summary="Obtiene el usuario por ID",
     *     tags={"ProgramParticipants"},
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
        return ProgramParticipant::findOrFail($id);
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
     *     path="/api/program_participants/{id}",
     *     summary="Actualiza un usuario existente",
     *     tags={"ProgramParticipants"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del usuario a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="program_id", type="iknt"),
     *             @OA\Property(property="entity_type", type="string"),
     *             @OA\Property(property="entity_id", type="int"),
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
            $program = ProgramParticipant::findOrFail($id);

            if ($request->has('program_id')) {
                $program_id = $request->program_id;
                $existingProgram = Programs::find($program_id);
                if (!$existingProgram) {
                    return response()->json(['error' => 'Programa no encontrado'], 404);
                }
                $program->program_id = $existingProgram;
            }
            if ($request->has('entity_id')) {
                $entityId = $request->entity_id;
                $existingEntityId = Users::find($entityId);
                if (!$existingEntityId) {
                    return response()->json(['error' => 'Entidad no encontrada'], 404);
                }
                $program->entity_id = $existingEntityId;
            }

            if ($request->has('entity_type')) {
                $program->entity_type = $request->entity_type;
            }
            $program->save();
            return response()->json($program, 200);
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
     *     path="/api/program_participants/{id}",
     *     summary="Elimina un usuario existente",
     *     tags={"ProgramParticipants"},
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
        return ProgramParticipant::destroy($id);
    }
}
