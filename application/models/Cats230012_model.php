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

    public function validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name_230012', 'Name', 'required');
        $this->form_validation->set_rules('type_230012', 'Type', 'required');
        $this->form_validation->set_rules('gender_230012', 'Gender', 'required');
        $this->form_validation->set_rules('age_230012', 'Age', 'required');
        $this->form_validation->set_rules('price_230012', 'Price', 'required|numeric');

        if ($this->form_validation->run())
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sale($id)
    {
        $data = array(
            'customer_name_230012' => $this->input->post('customer_name_230012'),
            'customer_phone_230012' => $this->input->post('customer_phone_230012'),
            'customer_address_230012' => $this->input->post('customer_address_230012'),
            'cat_id_230012' => $id,
        );

        $this->db->insert('cat_sale_230012', $data);

        $this->db->set('sold_230012', '1');
        $this->db->where('id_230012', $id);
        $this->db->update('cats_230012');
    }

    public function sales()
    {
        $this->db->select('cat_sale_230012.*, cats_230012.name_230012');
        $this->db->from('cat_sale_230012');
        $this->db->join('cats_230012', 'cat_sale_230012.cat_id_230012 = cats_230012.id_230012');
        return $this->db->get()->result();
    }

    public function validate_sale()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name_230012', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_phone_230012', 'Customer Phone', 'required|numeric');
        $this->form_validation->set_rules('customer_address_230012', 'Customer Address', 'required');

        if ($this->form_validation->run())
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
