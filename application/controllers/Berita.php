<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('loginsess')) {
			redirect('login');
		}
		$this->load->model('Berita_model','bm');
		$this->load->model('Penulis_model','pm');
		$this->load->model('Kategori_model','km');
		$this->load->library('form_validation');
	}

	function index($offset = 0){
		//$this->output->enable_profiler(TRUE);
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status')->result_array();
    $view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'berita/list';
		$q = $this->input->get('q');
		$view['data'] = $this->bm->get_berita(false, 99, $offset, $q);
		$berita = $this->bm->get_berita(false, 99, -1, $q);
		$config['base_url'] = base_url().'berita/index';
		$config['total_rows'] = $berita->num_rows();
		$config['per_page'] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['anchor_class'] = 'class="waves-effect"';
		$view['pagging'] =$this->pagination->initialize($config);
		$this->load->view('admin',$view);
	}

	function add(){
		//$this->output->enable_profiler(true);
		$view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['penulis'] = $this->db->where('status',1)->get('penulis');
		$view['jenisberita'] = $this->db->where('status',1)->get('jeniserita');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'berita/add';
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('judulberita', 'Judul Berita', 'required');
			$this->form_validation->set_rules('idpenulis', 'Penulis','required');
			$this->form_validation->set_rules('idjenisberita', 'Kategori','required');
			$this->form_validation->set_rules('isiberita', 'Konten','required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if ($this->form_validation->run() == TRUE){
      		$data['judulberita'] = $this->input->post('judulberita');
      		$data['idpenulis'] = $this->input->post('idpenulis');
      		$data['idjenisberita'] = $this->input->post('idjenisberita');
      		$data['isiberita'] = $this->input->post('isiberita');
      		$data['status'] = $this->input->post('status');
					$data['seolink'] =str_replace(' ','-',strtolower($data['judulberita']));
      		$data['__createdby'] = $view['user']['username'];

			$lokasi = './assets/images/';
			$abspath = date('YmdHis').'_'.strtolower(str_replace(array(" ", ",","-", "&"), "_", $_FILES['images']['name']));
			$tmp_name = $_FILES["images"]["tmp_name"];
			$error = ['images']['error'];
			$size = ['images']['size'];
			$format = ['images']['type'];
			if ($error == 0) {
				if ($size < 3000000) {
					if ($format = 'images/jpg' || $format = 'images/png') {
						if (move_uploaded_file($tmp_name, $lokasi.$abspath)) {
							$data['image'] = $abspath;
						}else{
							$this->session->set_flashdata('insertstatus', 'false');
							redirect('berita/add');
						}
					}else{
						$this->session->set_flashdata('insertstatus', 'false');
						redirect('berita/add');
					}
				}else{
					$this->session->set_flashdata('insertstatus', 'false');
					redirect('berita/add');
				}
			}else{
				$this->session->set_flashdata('insertstatus', 'false');
				redirect('berita/add');
			}

					if ($this->bm->add_berita($data)) {
      			$this->session->set_flashdata('insertstatus', 'true');
      		}else $this->session->set_flashdata('insertstatus', 'false');
      	 	redirect('berita');
      	}
		}
		$this->load->view('admin',$view);
	}

	function edit($id){
    $view['status'] = $this->db->where_not_in('idstatus',99)->get('status');
		$view['penulis'] = $this->db->where('status',1)->get('penulis');
		$view['jenisberita'] = $this->db->where('status',1)->get('jeniserita');
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'berita/edit';
		$view['data'] = $this->bm->get_berita($id);
		if ($view['data']->num_rows()==0) {
			redirect('berita');
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('judulberita', 'Judul Berita', 'required');
			$this->form_validation->set_rules('idpenulis', 'Penulis','required');
			$this->form_validation->set_rules('idjenisberita', 'Kategori','required');
			$this->form_validation->set_rules('isiberita', 'Konten','required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if ($this->form_validation->run() == TRUE){
					$data['judulberita'] = $this->input->post('judulberita');
        	$data['idpenulis'] = $this->input->post('idpenulis');
        	$data['idjenisberita'] = $this->input->post('idjenisberita');
        	$data['isiberita'] = $this->input->post('isiberita');
        	$data['status'] = $this->input->post('status');
					$data['seolink'] =str_replace(' ','-',strtolower($data['judulberita']));
        	$data['__updatedby'] = $view['user']['username'];
        	$data['__updateddate'] = date('Y-m-d H:i:s');
					$basepath = './assets/images/';
					$abspath = date('YmdHis').'_'.strtolower(str_replace(array(" ", ",","-", "&"), "_", $_FILES['images']['name']));
					if (!empty($_FILES['images']['name'])) {
						if (move_uploaded_file($_FILES["images"]["tmp_name"], $basepath.$abspath)) {
							$data['image'] = $abspath;
						}else{
							$this->session->set_flashdata('insertstatus', 'false');
							redirect('berita');
						}
					}
					if ($this->bm->edit_berita($id,$data)) {
        		$this->session->set_flashdata('insertstatus', 'true');
        	}else $this->session->set_flashdata('insertstatus', 'false');
        		redirect('berita');
        }
		}
		$this->load->view('admin',$view);
	}

	function delete($id){
		if ($this->bm->delete_berita($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('berita');
	}

	function export(){
		$this->load->library('fpdf/Fpdf');
		$q = $this->input->get('q');
		$berita = $this->bm->get_berita(false, 99, -1, $q);
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetMargins(10,10,10);
		$pdf->AddPage();
		$pdf->SetFont('Arial',"B", 14);
		$pdf->Cell(0,4,'Data Berita',0,1,'C');
		$pdf->Ln(2);
		$pdf->Ln(2);
		$pdf->SetFont('Arial',"", 12);
		$n = 1;
		$pdf->SetFont('Arial',"B", 14);
		$pdf->Cell(10,7,"NO",1,0,"C");
		$pdf->Cell(100,7,"Judul Berita",1,0,"C");
		$pdf->Cell(70,7,"Tanggal Dibuat",1,1,"C");
		$pdf->SetFont('Arial',"", 12);

		foreach ($berita->result() as $row) {
			$pdf->Cell(10,7,$n,1,0,"C");
			$pdf->Cell(100,7,$row->judulberita,1,0,"L");
			$pdf->Cell(70,7,$row->__createddate,1,1,"C");
			$n++;
		}
		$pdf->Output('databerita.pdf','I');
	}

	function excel(){
		$status = $this->db->where_not_in('idstatus',99)->get('status');
		$this->load->library('PHPExcel/PHPExcel');
		$excel = new PHPExcel();
		$excel->getProperties()
			->setCreator('Anjas Wicaksana')
			->setLastModifiedBy('Anjas Wicaksana')
			->setTitle("Data Berita")
			->setSubject("Berita")
			->setDescription("Laporan Berita ")
			->setKeywords("Data Berita");
		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->getActiveSheet()->mergeCells('A1:K2');
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BERITA");
		$excel->getActiveSheet()->mergeCells('C3:F3');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('C:F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Penulis");
		$excel->getActiveSheet()->mergeCells('C3:F4');
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Judul Berita");
		$excel->getActiveSheet()->mergeCells('G3:G4');
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Status");
		$excel->getActiveSheet()->mergeCells('H3:H4');
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Dibuat Oleh");
		$excel->getActiveSheet()->mergeCells('I3:I4');
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Tanggal Dibuat");
		$excel->getActiveSheet()->mergeCells('J3:J4');
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Diupdate Oleh");
		$excel->getActiveSheet()->mergeCells('K3:K4');
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Tanggal Diupdate");
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$q = $this->input->get('q');
		$berita = $this->bm->get_berita(false, 99, -1, $q);
		$no = 1;
		$numrow = 5;
		$merge = 6;
		foreach($berita->result() as $data){
			$excel->getActiveSheet()->mergeCells('A'.$numrow.':A'.$merge);
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->getActiveSheet()->mergeCells('B'.$numrow.':B'.$merge);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->namapenulis);
			$excel->getActiveSheet()->mergeCells('C'.$numrow.':F'.$merge);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judulberita);
			if ($data->status == 0) {
				$excel->getActiveSheet()->mergeCells('G'.$numrow.':G'.$merge);
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, 'Tidak Aktif');
			}else{
				$excel->getActiveSheet()->mergeCells('G'.$numrow.':G'.$merge);
				$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, 'Aktif');
			}
			$excel->getActiveSheet()->mergeCells('H'.$numrow.':H'.$merge);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->__createdby);
			$excel->getActiveSheet()->mergeCells('I'.$numrow.':I'.$merge);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->__createddate);
			if ($data->__updatedby == '') {
				$excel->getActiveSheet()->mergeCells('J'.$numrow.':J'.$merge);
				$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, 'Belum pernah diupdate');
			}else{
				$excel->getActiveSheet()->mergeCells('J'.$numrow.':J'.$merge);
				$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->__updatedby);
			}
			if ($data->__updateddate == '0000-00-00 00:00:00') {
				$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, 'Belum pernah diupdate');
				$excel->getActiveSheet()->mergeCells('K'.$numrow.':K'.$merge);
			}else{
				$excel->getActiveSheet()->mergeCells('K'.$numrow.':K'.$merge);
				$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->__updateddate);
			}
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow+=2;
			$merge+=2;
		}
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan Data Berita");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Berita.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
