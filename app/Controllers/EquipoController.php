<?php
namespace App\Controllers;

use App\Models\EquipoModel;

class EquipoController extends BaseController
{
    public function index()
    {
        $model = new EquipoModel();
        $equipos = $model->findAll();

        // Extraer colores únicos
        $coloresUnicos = array_unique(array_filter(array_column($equipos, 'color_equipo')));

        return view('equipos/index', [
            'equipos' => $equipos,
            'coloresUnicos' => $coloresUnicos
        ]);
    }

    public function crear()
    {
        return view('equipos/crear');
    }

    public function guardar()
    {
        helper(['form']);
        $rules = [
            'nombre_equipo' => 'required|min_length[3]',
            'color_equipo'  => 'required',
            'escudo'        => 'is_image[escudo]|max_size[escudo,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('tipo', 'error')->with('mensaje', 'Verifica los campos.');
        }

        $model = new EquipoModel();
        $escudoFile = $this->request->getFile('escudo');
        $nombreEscudo = null;

        if ($escudoFile && $escudoFile->isValid() && !$escudoFile->hasMoved()) {
            $nombreEscudo = $escudoFile->getRandomName();
            $escudoFile->move(FCPATH . 'uploads', $nombreEscudo);
        }

        $model->save([
            'nombre_equipo' => $this->request->getPost('nombre_equipo'),
            'color_equipo'  => $this->request->getPost('color_equipo'),
            'escudo'        => $nombreEscudo
        ]);

        return redirect()->to('/equipos')->with('tipo', 'success')->with('mensaje', 'Equipo registrado correctamente.');
    }

    public function editar($id)
    {
        $model = new EquipoModel();
        $data['equipo'] = $model->find($id);

        if (!$data['equipo']) {
            return redirect()->to('/equipos')->with('tipo', 'error')->with('mensaje', 'Equipo no encontrado.');
        }

        return view('equipos/editar', $data);
    }

    public function actualizar($id)
    {
        helper(['form']);
        $model = new EquipoModel();
        $escudoFile = $this->request->getFile('escudo');
        $nombreEscudo = null;

        if ($escudoFile && $escudoFile->isValid() && !$escudoFile->hasMoved()) {
            $nombreEscudo = $escudoFile->getRandomName();
            $escudoFile->move(FCPATH . 'uploads', $nombreEscudo);
        }

        $data = [
            'nombre_equipo' => $this->request->getPost('nombre_equipo'),
            'color_equipo'  => $this->request->getPost('color_equipo'),
        ];

        if ($nombreEscudo) {
            $equipo = $model->find($id);
            if ($equipo && !empty($equipo['escudo']) && file_exists(FCPATH . 'uploads/' . $equipo['escudo'])) {
                @unlink(FCPATH . 'uploads/' . $equipo['escudo']);
            }
            $data['escudo'] = $nombreEscudo;
        }

        $model->update($id, $data);

        return redirect()->to('/equipos')->with('tipo', 'success')->with('mensaje', 'Equipo actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $model = new EquipoModel();
        $equipo = $model->find($id);

        if ($equipo && !empty($equipo['escudo']) && file_exists(FCPATH . 'uploads/' . $equipo['escudo'])) {
            @unlink(FCPATH . 'uploads/' . $equipo['escudo']);
        }

        $model->delete($id);

        return redirect()->to('/equipos')->with('tipo', 'success')->with('mensaje', 'Equipo eliminado correctamente.');
    }

    public function buscar()
    {
        $nombre = $this->request->getGet('nombre');
        $color = $this->request->getGet('color');

        $model = new EquipoModel();
        $query = $model;

        if ($nombre && $color) {
            $query = $query->like('nombre_equipo', $nombre)
                           ->where('color_equipo', $color);
        } elseif ($nombre) {
            $query = $query->like('nombre_equipo', $nombre);
        } elseif ($color) {
            $query = $query->where('color_equipo', $color);
        }

        $equipos = $query->findAll();

        return view('equipos/tabla', ['equipos' => $equipos]);
    }
}

