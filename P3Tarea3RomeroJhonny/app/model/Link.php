<?php
/**
 * Modelo Link
 * Maneja todas las operaciones de base de datos relacionadas con enlaces
 */
class Link
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    /**
     * Obtener todos los enlaces ordenados por fecha de creación
     */
    public function getAll()
    {
        return $this->db->query('SELECT * FROM links ORDER BY created_at DESC')->get();
    }

    /**
     * Obtener un enlace por su ID
     */
    public function findById($id)
    {
        return $this->db->query('SELECT * FROM links WHERE id = :id', ['id' => $id])->firstOrFail();
    }

    /**
     * Crear un nuevo enlace
     */
    public function create($data)
    {
        return $this->db->query(
            'INSERT INTO links (title, url, description) VALUES (:title, :url, :description)',
            [
                'title' => $data['title'],
                'url' => $data['url'],
                'description' => $data['description']
            ]
        );
    }

    /**
     * Actualizar un enlace existente
     */
    public function update($id, $data)
    {
        return $this->db->query(
            'UPDATE links SET title = :title, url = :url, description = :description WHERE id = :id',
            [
                'id' => $id,
                'title' => $data['title'],
                'url' => $data['url'],
                'description' => $data['description']
            ]
        );
    }

    /**
     * Eliminar un enlace
     */
    public function delete($id)
    {
        return $this->db->query('DELETE FROM links WHERE id = :id', ['id' => $id]);
    }

    /**
     * Validar datos de enlace
     */
    public function validate($data)
    {
        $errors = [];

        if (empty($data['title'])) {
            $errors[] = "El título es obligatorio.";
        }

        if (empty($data['url'])) {
            $errors[] = "La url es obligatoria.";
        } elseif (!filter_var($data['url'], FILTER_VALIDATE_URL)) {
            $errors[] = "La url no es válida.";
        }

        if (empty($data['description'])) {
            $errors[] = "La descripción es obligatoria.";
        }

        return $errors;
    }
}
