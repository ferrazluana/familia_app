<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Membro\BulkDestroyMembro;
use App\Http\Requests\Admin\Membro\DestroyMembro;
use App\Http\Requests\Admin\Membro\IndexMembro;
use App\Http\Requests\Admin\Membro\StoreMembro;
use App\Http\Requests\Admin\Membro\UpdateMembro;
use App\Models\Membro;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class MembrosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMembro $request
     * @return array|Factory|View
     */
    public function index(IndexMembro $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Membro::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'data_nascimento', 'batizado', 'lider', 'pastor', 'enabled'],

            // set columns to searchIn
            ['id', 'nome', 'data_nascimento', 'celular', 'endereco', 'estado_civil', 'personalidade', 'linguagem_amor']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.membro.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.membro.create');

        $estado_civil = [
            ['name' => 'Solteiro(a)', 'id' => 'Solteiro(a)'],
            ['name' => 'Casado(a)', 'id' => 'Casado(a)'],
            ['name' => 'Divorciado(a)', 'id' => 'Divorciado(a)'],
            ['name' => 'Amasiado(a)', 'id' => 'Amasiado(a)'],
            ['name' => 'Viúvo(a)', 'id' => 'Viúvo(a)']
        ];

        $disc = [
            ['name' => 'Determinado', 'id' => 'D'],
            ['name' => 'Influenciador', 'id' => 'I'],
            ['name' => 'Seguro', 'id' => 'S'],
            ['name' => 'Cauteloso', 'id' => 'C']
        ];

        $linguagem_amor = [
            ['name' => 'Presentes', 'id' => 'Presentes'],
            ['name' => 'Toque Físico', 'id' => 'Toque Físico'],
            ['name' => 'Tempo de Qualidade', 'id' => 'Tempo de Qualidade'],
            ['name' => 'Palavras de Afirmação', 'id' => 'Palavras de Afirmação'],
            ['name' => 'Atos de Serviço', 'id' => 'Atos de Serviço']
        ];

        return view('admin.membro.create', ['estado_civil' => $estado_civil, 'disc' => $disc, 'linguagem_amor' => $linguagem_amor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMembro $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMembro $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Membro
        $personalidades = '';
        $linguagem_amor = '';
        if (isset($sanitized['personalidade'])) {   
            foreach ($sanitized['personalidade'] as $p) {
                $personalidades =  $personalidades . $p['name'] . ' - ';
            }
        }

        if (isset($sanitized['linguagem_amor'])) {           
            foreach ($sanitized['linguagem_amor'] as $p) {
                $linguagem_amor =  $linguagem_amor . $p['name'] . ' - ';
            }
        }

        $sanitized['estado_civil'] = $sanitized['estado_civil']['name'];
        $sanitized['personalidade'] = $personalidades;
        $sanitized['linguagem_amor'] = $linguagem_amor;
        $membro = Membro::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/membros'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/membros');
    }

    /**
     * Display the specified resource.
     *
     * @param Membro $membro
     * @throws AuthorizationException
     * @return void
     */
    public function show(Membro $membro)
    {
        $this->authorize('admin.membro.show', $membro);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Membro $membro
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Membro $membro)
    {
        $this->authorize('admin.membro.edit', $membro);

        $estado_civil = [
            ['name' => 'Solteiro(a)', 'id' => 'Solteiro(a)'],
            ['name' => 'Casado(a)', 'id' => 'Casado(a)'],
            ['name' => 'Divorciado(a)', 'id' => 'Divorciado(a)'],
            ['name' => 'Amasiado(a)', 'id' => 'Amasiado(a)'],
            ['name' => 'Viúvo(a)', 'id' => 'Viúvo(a)']
        ];

        $disc = [
            ['name' => 'Determinado', 'id' => 'D'],
            ['name' => 'Influenciador', 'id' => 'I'],
            ['name' => 'Seguro', 'id' => 'S'],
            ['name' => 'Cauteloso', 'id' => 'C']
        ];

        $linguagem_amor = [
            ['name' => 'Presentes', 'id' => 'Presentes'],
            ['name' => 'Toque Físico', 'id' => 'Toque Físico'],
            ['name' => 'Tempo de Qualidade', 'id' => 'Tempo de Qualidade'],
            ['name' => 'Palavras de Afirmação', 'id' => 'Palavras de Afirmação'],
            ['name' => 'Atos de Serviço', 'id' => 'Atos de Serviço']
        ];

        return view('admin.membro.edit', [
            'membro' => $membro,
            'estado_civil' => $estado_civil,
            'disc' => $disc,
            'linguagem_amor' => $linguagem_amor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMembro $request
     * @param Membro $membro
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMembro $request, Membro $membro)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $personalidades = '';
        $linguagem_amor = '';
        if (isset($sanitized['personalidade'])) {   
            foreach ($sanitized['personalidade'] as $p) {
                $personalidades =  $personalidades . $p['name'] . ' - ';
            }
        }

        if (isset($sanitized['linguagem_amor'])) {           
            foreach ($sanitized['linguagem_amor'] as $p) {
                $linguagem_amor =  $linguagem_amor . $p['name'] . ' - ';
            }
        }

        $sanitized['estado_civil'] = $sanitized['estado_civil']['name'];
        $sanitized['personalidade'] = $personalidades;
        $sanitized['linguagem_amor'] = $linguagem_amor;

        // Update changed values Membro
        $membro->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/membros'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/membros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMembro $request
     * @param Membro $membro
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMembro $request, Membro $membro)
    {
        $membro->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMembro $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMembro $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Membro::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
