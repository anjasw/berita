<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('loginsess')) {
			redirect('login');
		}
		$this->load->model('Kategori_model','km');
	}

	function index($offset = 0){
		//$this->output->enable_profiler(TRUE);
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'kategori/list';
		$q = $this->input->get('q');
		$field = $this->input->get('field');
		$view['data'] = $this->km->get_kategori(false, 99, $offset, $q,$field);

		$kategori = $this->km->get_kategori(false, 99, -1, $q,$field);
		$config['base_url'] = base_url().'kategori/index';
		$config['total_rows'] = $kategori->num_rows();
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
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'kategori/add';
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('jenisberita', 'Jenis Berita', 'required|is_unique[jeniserita.jenisberita]');
			if ($this->form_validation->run() == TRUE){
        $data['jenisberita'] = $this->input->post('jenisberita');
        $data['status'] = $this->input->post('status');
        $data['__createdby'] = $view['user']['username'];
        if ($this->km->add_kategori($data)) {
        	$this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
         redirect('kategori');
      }
		}
		$this->load->view('admin',$view);
	}

	function edit($id){
		$view['user'] = $this->session->userdata('loginsess');
		$view['view'] = 'kategori/edit';
		$view['data'] = $this->km->get_kategori($id);
		if ($view['data']->num_rows()==0) {
			redirect('kategori');
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('jenisberita', 'Jenis Berita', 'required');
			if ($this->form_validation->run() == TRUE){
        $data['jenisberita'] = $this->input->post('jenisberita');
        $data['status'] = $this->input->post('status');

        $data['__updatedby'] = $view['user']['username'];
        $data['__updateddate'] = date('Y-m-d H:i:s');
        if ($this->km->edit_kategori($id,$data)) {
        	$this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        	redirect('kategori');
      }
		}
		$this->load->view('admin',$view);
	}

	function delete($id){
		if ($this->km->delete_kategori($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('kategori');
	}

	function export(){
		$this->load->library('fpdf/Fpdf');
		$q = $this->input->get('q');
		$kategori = $this->km->get_kategori(false, 99, -1, $q);
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->SetMargins(10,10,10);
		$pdf->AddPage();
		$pdf->SetFont('Arial',"B", 14);
		$pdf->Cell(0,4,'Data Kategori Berita',0,1,'L');
		$pdf->Ln(2);
		$pdf->SetFont('Arial',"", 12);
		$n = 1;
		foreach ($kategori->result() as $row) {
			$pdf->Cell(20,7,$n,1,0,"C");
			$pdf->Cell(0,7,$row->jenisberita,1,1,"L");
			$n++;
		}
		$pdf->Output('datakategoriberita.pdf','i');
	}
	function excel(){
		$status = $this->db->where_not_in('idstatus',99)->get('status');
		$this->load->library('PHPExcel/PHPExcel');
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('My Notes Code')
			->setLastModifiedBy('Anjas Wicaksana')
			->setTitle("Data Kategori Berita")
			->setSubject("Kategori Berita")
			->setDescription("Laporan Kategori Berita ")
			->setKeywords("Data Kategori Berita");
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
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KATEGORI BERITA");
			$excel->getActiveSheet()->mergeCells('A1:G1');
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Kategori");
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "Status");
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "Dibuat Oleh");
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "Tanggal Dibuat");
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "Diupdate Oleh");
			$excel->setActiveSheetIndex(0)->setCellValue('G3', "Tanggal Diupdate");
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
			$q = $this->input->get('q');
			$kategori = $this->km->get_kategori(false, 99, -1, $q);
			$no = 1;
			$numrow = 4;
			foreach($kategori->result() as $data){
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->jenisberita);
				if ($data->status == 0) {
					$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, 'Tidak Aktif');
				}else{
					$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, 'Aktif');
				}
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->__createdby);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->__createddate);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->__updatedby);
				if ($data->__updateddate == '0000-00-00 00:00:00') {
					$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, 'Belum pernah diupdate');
				}else{
					$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->__updateddate);
				}
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
				$no++;
				$numrow++;
			}
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$excel->getActiveSheet(0)->setTitle("Laporan Data Kategori Berita");
			$excel->setActiveSheetIndex(0);
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Data Kategori.xlsx"');
			header('Cache-Control: max-age=0');
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			$write->save('php://output');
		}
	}
