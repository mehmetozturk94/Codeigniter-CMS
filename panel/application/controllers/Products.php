<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "product_v";

        $this->load->model("product_model");
        $this->load->model("product_image_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->product_model->get_all(
            array(), "rank ASC"
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function add(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->product_model->add(
                array (
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertSEO($this->input->post("title")),
                    "rank" => 0,
                    "isActive" => 1,
                    "created_at" => date("Y-m-d H:i:s")
                )
                );
            if($insert){
                redirect(base_url("products"));
            }else{
                redirect(base_url("products"));
            }

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
            // Kayit işlemi baslar
        // Başarısız ise
            // Hata ekranda gösterilir...

    }

    public function update($id){

        $item = $this->product_model->get(
            array(
                "id" => $id,
                "isActive" => 1,
            )
         );

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update_product($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->product_model->update_product(
                array(
                    "id" => $id,
                ),
                array (
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertSEO($this->input->post("title")),
                )
                );
            if($update){
                redirect(base_url("products"));
            }else{
                redirect(base_url("products"));
            }

        } else {

            $viewData = new stdClass();

            $item = $this->product_model->get(
                array(
                    "id" => $id,
                )
                );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
            // Kayit işlemi baslar
        // Başarısız ise
            // Hata ekranda gösterilir...

    }
    public function delete($id){

        $delete = $this->product_model->delete(
            array(
                "id" => $id
            ));
        
        if($delete){
            redirect(base_url("products"));
        }else{
            redirect(base_url("products"));
        }
    }
    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === 'true') ? 1 : 0;
            $this->product_model->update_product(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $rank = $order['ord'];

        foreach($rank as $key => $value){
            $this->product_model->update_product(
                array(
                    "id" => $value,
                    "rank !=" => $key
                ),
                array(
                    "rank" => $key
                )
            );
        }

       

    }

    public function image_form($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            ));

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function image_upload($id){

        $config['upload_path']          = "uploads/$this->viewFolder";
        $config['allowed_types']        = "gif|jpg|png|jpeg";

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file');
        
        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());

                die();
        }
        else
        {
                $data = $this->upload->data("file_name");
                $this->product_image_model->add(
                    array(
                        "id"            => $id,
                        "product_id"    => $id,
                        "img_url"       => $data,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "isCover"       => 1,
                        "created_at"    => date("Y-m-d H:i:s"),
                    )
                );
        }
    }
}