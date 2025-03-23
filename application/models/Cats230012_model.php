<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats230012_model extends CI_Model {

	public function create()
	{
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'type_230012' => $this->input->post('type_230012'),
            'gender_230012' => $this->input->post('gender_230012'),
            'age_230012' => $this->input->post('age_230012'),
            'price_230012' => $this->input->post('price_230012')
        );

        $this->db->insert('cats_230012', $data);
    }

	public function read()
	{
        return $this->db->get('cats_230012')->result();
    }

	public function read_by($id)
	{
        return $this->db->get_where('cats_230012', ['id_230012' => $id])->row();
    }

    public function update($id)
    {
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'type_230012' => $this->input->post('type_230012'),
            'gender_230012' => $this->input->post('gender_230012'),
            'age_230012' => $this->input->post('age_230012'),
            'price_230012' => $this->input->post('price_230012')
        );

        $this->db->where('id_230012', $id);
        $this->db->update('cats_230012', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('cats_230012', ['id_230012' => $id]);
    }
}
