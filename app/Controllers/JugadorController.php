<?php

namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\EquipoModel;

class JugadorController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jugadores');
        $builder->select('jugadores.*, equipos.nombre_equipo');
        $builder->join('equipos', 'equipos.id = jugadores.equipo_id', 'left');

        if ($this->request->getGet('buscar')) {
            $buscar = $this->request->getGet('buscar');
            $builder->groupStart()
                    ->like('jugadores.nombre', $buscar)
                    ->orLike('jugadores.apellido', $buscar)
                    ->orLike('equipos.nombre_equipo', $buscar)
                    ->groupEnd();
        }

        $query = $builder->get();
        $data['jugadores'] = $query->getResultArray();

        $data['mensaje'] = session()->getFlashdata('mensaje');
        $data['tipo'] = session()->getFlashdata('tipo');

        return view('jugadores/index', $data);
    }

    public function crear()
    {
        $equipos = new EquipoModel();
        $data['equipos'] = $equipos->findAll();
        return view('jugadores/crear', $data);
    }

    public function guardar()
    {
        $model = new JugadorModel();

        // Validación básica sin romper la inserción
        $validacion = $this->validate([
            'nombre' => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'fecha_nacimiento' => 'required',
            'equipo_id' => 'required|integer',
            'foto' => 'uploaded[foto]|is_image[foto]'
        ]);

        if (!$validacion) {
            return redirect()->back()
                ->with('mensaje', '⚠️ Revisa los datos ingresados.')
                ->with('tipo', 'danger');
        }

        // Subir foto
        $foto = $this->request->getFile('foto');
        $nombreFoto = null;

        if ($foto && $foto->isValid()) {
            $nombreFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/', $nombreFoto);
        }

        // Convertir fecha a formato SQL si viene como dd/mm/yyyy
        $fecha_nacimiento = $this->request->getPost('fecha_nacimiento');
        if (strpos($fecha_nacimiento, '/') !== false) {
            $partes = explode('/', $fecha_nacimiento);
            $fecha_nacimiento = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
        }

        // Guardar en la BD
        $model->insert([
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'fecha_nacimiento' => $fecha_nacimiento,
            'foto' => $nombreFoto,
            'equipo_id' => $this->request->getPost('equipo_id'),
        ]);

        if ($model->db->affectedRows() > 0) {
            return redirect()->to('/jugadores')
                ->with('mensaje', '✅ Jugador agregado correctamente.')
                ->with('tipo', 'success');
        } else {
            return redirect()->back()
                ->with('mensaje', '❌ Error al guardar el jugador.')
                ->with('tipo', 'danger');
        }
    }

    public function editar($id)
    {
        $model = new JugadorModel();
        $equipos = new EquipoModel();

        $data['jugador'] = $model->find($id);
        $data['equipos'] = $equipos->findAll();

        if (!$data['jugador']) {
            return redirect()->to('/jugadores')
                ->with('mensaje', '⚠️ Jugador no encontrado.')
                ->with('tipo', 'warning');
        }

        return view('jugadores/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new JugadorModel();
        $jugador = $model->find($id);

        if (!$jugador) {
            return redirect()->to('/jugadores')
                ->with('mensaje', '⚠️ Jugador no encontrado.')
                ->with('tipo', 'warning');
        }

        $foto = $this->request->getFile('foto');
        $nombreFoto = $jugador['foto'];

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $nombreNuevo = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/', $nombreNuevo);

            // Borrar la anterior
            $rutaAnterior = FCPATH . 'uploads/' . $jugador['foto'];
            if (file_exists($rutaAnterior) && is_file($rutaAnterior)) {
                unlink($rutaAnterior);
            }

            $nombreFoto = $nombreNuevo;
        }

        $fecha_nacimiento = $this->request->getPost('fecha_nacimiento');
        if (strpos($fecha_nacimiento, '/') !== false) {
            $partes = explode('/', $fecha_nacimiento);
            $fecha_nacimiento = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
        }

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'fecha_nacimiento' => $fecha_nacimiento,
            'equipo_id' => $this->request->getPost('equipo_id'),
            'foto' => $nombreFoto,
        ]);

        return redirect()->to('/jugadores')
            ->with('mensaje', '✅ Jugador actualizado correctamente.')
            ->with('tipo', 'success');
    }

    public function eliminar($id)
    {
        $model = new JugadorModel();
        $jugador = $model->find($id);

        if ($jugador) {
            $rutaFoto = FCPATH . 'uploads/' . $jugador['foto'];
            if (file_exists($rutaFoto) && is_file($rutaFoto)) {
                unlink($rutaFoto);
            }
            $model->delete($id);

            return redirect()->to('/jugadores')
                ->with('mensaje', '🗑️ Jugador eliminado correctamente.')
                ->with('tipo', 'success');
        }

        return redirect()->to('/jugadores')
            ->with('mensaje', '⚠️ Jugador no encontrado.')
            ->with('tipo', 'warning');
    }
}


