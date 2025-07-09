<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Categorias extends BaseController
{
    protected $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
        helper(['form', 'url']); // Carga helpers para formularios y URLs
    }

    /**
     * Muestra la lista de categorías.
     *
     * @return string
     */
    public function index(): string
    {
        $data = [
            'page_title' => 'Gestión de Categorías de Encuesta',
            'categorias' => $this->categoriaModel->findAll(),
        ];
        return view('dashboard/categorias', $data); // Vista: app/Views/dashboard/categorias.php
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     *
     * @return string
     */
    public function create(): string
    {
        $data = [
            'page_title' => 'Crear Nueva Categoría',
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/create_categorias', $data); // Vista: app/Views/dashboard/create_categorias.php
    }

    /**
     * Guarda una nueva categoría en la base de datos.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        // Reglas de validación
        $rules = [
            'nombre'      => 'required|min_length[3]|max_length[255]|is_unique[categorias_encuesta.nombre]',
            'descripcion' => 'permit_empty|max_length[500]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Datos para guardar en la base de datos
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        if ($this->categoriaModel->save($data)) {
            session()->setFlashdata('success', 'Categoría "' . esc($data['nombre']) . '" creada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al crear la categoría.');
        }

        return redirect()->to(base_url('categorias'));
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     *
     * @param int|null $id ID de la categoría a editar.
     * @return string
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si la categoría no es encontrada.
     */
    public function edit(?int $id = null): string
    {
        $categoria = $this->categoriaModel->find($id);

        if (!$categoria) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar la categoría con ID: ' . $id);
        }

        $data = [
            'page_title' => 'Editar Categoría',
            'categoria'  => $categoria,
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/update_categorias', $data); // Vista: app/Views/dashboard/update_categorias.php
    }

    /**
     * Actualiza una categoría existente en la base de datos.
     *
     * @param int $id ID de la categoría a actualizar.
     * @return RedirectResponse
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si la categoría no es encontrada.
     */
    public function update(int $id): RedirectResponse
    {
        $categoriaExistente = $this->categoriaModel->find($id);
        if (!$categoriaExistente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar la categoría con ID: ' . $id);
        }

        // Reglas de validación para la actualización
        $rules = [
            'nombre'      => 'required|min_length[3]|max_length[255]|is_unique[categorias_encuesta.nombre,id,' . $id . ']',
            'descripcion' => 'permit_empty|max_length[500]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];

        if ($this->categoriaModel->update($id, $data)) {
            session()->setFlashdata('success', 'Categoría "' . esc($data['nombre']) . '" actualizada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al actualizar la categoría.');
        }

        return redirect()->to(base_url('categorias'));
    }

    /**
     * Elimina una categoría de la base de datos.
     *
     * @param int|null $id ID de la categoría a eliminar.
     * @return RedirectResponse
     */
    public function delete(?int $id = null): RedirectResponse
    {
        $categoria = $this->categoriaModel->find($id);

        if (!$categoria) {
            session()->setFlashdata('error', 'Categoría no encontrada.');
            return redirect()->to(base_url('categorias'));
        }

        if ($this->categoriaModel->delete($id)) {
            session()->setFlashdata('success', 'Categoría "' . esc($categoria['nombre']) . '" eliminada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al eliminar la categoría.');
        }
        
        return redirect()->to(base_url('categorias'));
    }
}