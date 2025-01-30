<?php

namespace App\Repositories\Eloquent;

use App\Models\Paciente;
use App\Repositories\PacienteRepositoryInterface;
use Illuminate\Support\Collection;

class PacienteRepository extends BaseRepository implements PacienteRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Paciente $model
     */
    public function __construct(Paciente $model)
    {
        parent::__construct($model);
    }

    public function listByFilters($medico_id, $request): ?Collection
    {
        $query = $this->model->newQuery();

        if ($request->filled('nome')) {
            $searchValue = strtolower($request->input('nome'));
            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$searchValue}%"]);
        }

        $query->whereHas('consultas', function ($query) use ($medico_id, $request) {
            $query->where('medico_id', $medico_id);

            if ($request->has('apenas-agendadas') && $request->input('apenas-agendadas') === 'true') {
                $query->where('data', '>', now());
            }
        });

        $query->with(['consultas' => function ($query) use ($medico_id, $request) {
            $query->where('medico_id', $medico_id);
            if ($request->has('apenas-agendadas') && $request->input('apenas-agendadas') === 'true') {
                $query->where('data', '>', now());
            }
        }]);

        $query->orderBy('nome', 'ASC');

        return $query->get();
    }




}
