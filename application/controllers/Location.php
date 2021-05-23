<?php
class Location extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Global_model');
    }
    function getProvinsi()
    {
        $data = $this->Global_model->get_data([], 'provinsi');
        foreach ($data as $row) {
            echo "<option value='" . $row['idprovinsi'] . "'>" . $row['nmprovinsi'] . "</option>";
        }
    }
    function getKabupaten()
    {
        $id = $_POST['provinsi'];
        $data = $this->Global_model->get_data(['idprovinsi' => $id], 'kabupatenkota');
        foreach ($data as $row) {
            echo "<option value='" . $row['idkabupatenkota'] . "'>" . $row['nmkabupatenkota'] . "</option>";
        }
    }
    function getKecamatan()
    {
        $id = $_POST['kabupaten'];
        $data = $this->Global_model->get_data(['idkabupatenkota' => $id], 'kecamatan');
        foreach ($data as $row) {
            echo "<option value='" . $row['idkecamatan'] . "'>" . $row['nmkecamatan'] . "</option>";
        }
    }
    function getKelurahan()
    {
        $id = $_POST['kecamatan'];
        $data = $this->Global_model->get_data(['idkecamatan' => $id], 'kelurahan');
        foreach ($data as $row) {
            echo "<option value='" . $row['idkelurahan'] . "'>" . $row['nmkelurahan'] . "</option>";
        }
    }
}
