<?php
namespace App\Controllers;

use App\Models\IncidenciaModel;
use App\Models\JugadorModel;

class IncidenciaController extends BaseController
{
    protected $incidenciaModel;
    protected $jugadorModel;

    public function __construct()
    {
        $this->incidenciaModel = new IncidenciaModel();
        $this->jugadorModel = new JugadorModel();
    }

    // Listado de incidencias
    public function index()
    {
        $incidencias = $this->incidenciaModel
            ->select('incidencias.*, jugadores.nombre as nombre_jugador, jugadores.apellido as apellido_jugador')
            ->join('jugadores', 'jugadores.id = incidencias.jugador_id')
            ->orderBy('fecha_incidencia', 'DESC')
            ->findAll();

        return view('incidencias/lista', ['incidencias' => $incidencias]);
    }

    // Formulario para crear incidencia
    public function crear()
    {
        $jugadores = $this->jugadorModel->findAll();
        return view('incidencias/crear', ['jugadores' => $jugadores]);
    }

    // Guardar incidencia
    public function guardar()
    {
        $tipo = $this->request->getPost('tipo_tarjeta');

        $this->incidenciaModel->save([
            'jugador_id' => $this->request->getPost('jugador_id'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo_tarjeta' => $tipo,
            'fecha_incidencia' => $this->request->getPost('fecha_incidencia'),
            'fecha_suspension' => $tipo === 'roja' ? $this->request->getPost('fecha_suspension') : null
        ]);

        return redirect()->to('/incidencias');
    }

    // Formulario para editar incidencia
    public function editar($id)
    {
        $incidencia = $this->incidenciaModel->find($id);

        if (!$incidencia) {
            return $this->response->setStatusCode(404, 'Incidencia no encontrada');
        }

        $data['incidencia'] = $incidencia;
        $data['jugadores'] = $this->jugadorModel->findAll();

        if ($this->request->isAJAX()) {
            return view('incidencias/_form_editar', $data);
        }

        // Si se entra directamente por URL, muestra la vista completa
        return view('incidencias/editar', $data);
    }

    // Actualizar incidencia
    public function actualizar($id)
    {
        $tipo = $this->request->getPost('tipo_tarjeta');

        $this->incidenciaModel->update($id, [
            'jugador_id' => $this->request->getPost('jugador_id'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo_tarjeta' => $tipo,
            'fecha_incidencia' => $this->request->getPost('fecha_incidencia'),
            'fecha_suspension' => $tipo === 'roja' ? $this->request->getPost('fecha_suspension') : null
        ]);

        return redirect()->to('/incidencias');
    }

    // Eliminar incidencia
    public function eliminar($id)
    {
        $this->incidenciaModel->delete($id);
        return redirect()->to('/incidencias');
    }

    // Búsqueda AJAX por jugador o tipo de tarjeta
    public function buscar()
    {
        $query = $this->request->getGet('query');

        $builder = $this->incidenciaModel
            ->select('incidencias.*, jugadores.nombre as nombre_jugador, jugadores.apellido as apellido_jugador')
            ->join('jugadores', 'jugadores.id = incidencias.jugador_id');

        if (!empty($query)) {
            $builder->groupStart()
                    ->like('jugadores.nombre', $query)
                    ->orLike('jugadores.apellido', $query)
                    ->orLike('incidencias.tipo_tarjeta', $query)
                    ->groupEnd();
        }

        $incidencias = $builder->orderBy('fecha_incidencia', 'DESC')->findAll();

        return view('incidencias/_rows', ['incidencias' => $incidencias]);
    }
}
