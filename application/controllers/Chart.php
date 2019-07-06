<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);*/
	}
	function puji()
	{
		$chartData=file_get_contents('assets/data.json');
		$chartData=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $chartData), true);
		$res=array();
		$keysArray=array();
/*
		foreach($chartData as $row)
		{
			$jenis=(int)$row['penyakit'];
			
			if(!isset($res[$row['kelurahan']]))
			{
				$res[$row['kelurahan']]=array($row['penyakit']);
				array_push($keysArray,$row['kelurahan']);
			}else{
				array_push($res[$row['kelurahan']], $row['penyakit']);
			
		}
	}
		//$keys=array_keys($res);
		$PieChartData=array();
		foreach($keysArray as $row)
		{
			$PieChartData[]=[$row,array_sum($res[$row])];
		}
		//echo json_encode($res);
		$data['PieChartTitle']='Jumlah Penyakit Menular dan Tidak Menular di Kecamatan Cipete Selatan Juli 2016';
		$data['PieChartData']=json_encode($PieChartData);
*/
//total penyakit
	$totalkelurahan=[array('KELURAHAN','JUMLAH PENYAKIT MENULAR DAN TIDAK MENULAR ',array('role'=>'style'))];
	$totaldata=array();
	foreach($chartData as $row)
	{
		$year=$row['Penyakit'];
		
		if(!isset($totaldata[$year]))
		{
			$totaldata[$year]=[$row['Jumlah']];
		}else{
			array_push($totaldata[$year],$row['Jumlah']);
		}
	
}
	$year=array_keys($totaldata);
	foreach(array_keys($totaldata) as $row)
	{
		$dat =[$row,array_sum($totaldata[$row]),'data'];
		array_push($totalkelurahan, $dat);
	}
	$data['BarChartTitle']= ' Jumlah Penyakit Menular dan Tidak Menular di Cipete Selatan  ';
	$data['BarChartData']=json_encode($totalkelurahan);

//total penyakit
	$totalkelurahan1=[array('KELURAHAN','JUMLAH SEMUA PENYAKIT DI SETIAP KELURAHAN',array('role'=>'style'))];
	$totaldata1=array();
	foreach($chartData as $row)
	{
		$year=$row['Kelurahan'];
		
		if(!isset($totaldata1[$year]))
		{
			$totaldata1[$year]=[$row['Jumlah']];
		}else{
			array_push($totaldata1[$year],$row['Jumlah']);
		}
	
}
	$year=array_keys($totaldata1);
	foreach(array_keys($totaldata1) as $row)
	{
		$dat =[$row,array_sum($totaldata1[$row]),'data'];
		array_push($totalkelurahan1, $dat);
	}
	$data['BarChartTitle1']= ' Jumlah Semua Penyakit di Setiap Kelurahan ';
	$data['BarChartData1']=json_encode($totalkelurahan1);

//total penyakit
	$totalkelurahan2=[array('GENDER','JUMLAH PENYAKIT BERDASARKAN JENIS KELAMIN',array('role'=>'style'))];
	$totaldata2=array();
	foreach($chartData as $row)
	{
		$year=$row['Gender'];
		
		if(!isset($totaldata2[$year]))
		{
			$totaldata2[$year]=[$row['Jumlah']];
		}else{
			array_push($totaldata2[$year],$row['Jumlah']);
		}
	
}
	$year=array_keys($totaldata2);
	foreach(array_keys($totaldata2) as $row)
	{
		$dat =[$row,array_sum($totaldata2[$row]),'data'];
		array_push($totalkelurahan2, $dat);
	}
	$data['BarChartTitle2']= ' Jumlah Penyakit Berdasarkan Tahun ';
	$data['BarChartData2']=json_encode($totalkelurahan2);

//total penyakit
	$totalkelurahan3=[array('TAHUN','JUMLAH PENYAKIT BERDASARKAN TAHUN',array('role'=>'style'))];
	$totaldata3=array();
	foreach($chartData as $row)
	{
		$year=$row['Tahun'];
		
		if(!isset($totaldata3[$year]))
		{
			$totaldata3[$year]=[$row['Jumlah']];
		}else{
			array_push($totaldata3[$year],$row['Jumlah']);
		}
	
}
	$year=array_keys($totaldata3);
	foreach(array_keys($totaldata3) as $row)
	{
		$dat =[$row,array_sum($totaldata3[$row]),'data'];
		array_push($totalkelurahan3, $dat);
	}
	$data['BarChartTitle3']= ' Jumlah Penyakit Berdasarkan Tahun ';
	$data['BarChartData3']=json_encode($totalkelurahan3);

//total penyakit
	$totalkelurahan4=[array('PUSKESMAS','JUMLAH PENYAKIT BERDASARKAN PUSKESMAS',array('role'=>'style'))];
	$totaldata4=array();
	foreach($chartData as $row)
	{
		$year=$row['Puskesmas'];
		
		if(!isset($totaldata4[$year]))
		{
			$totaldata4[$year]=[$row['Jumlah']];
		}else{
			array_push($totaldata4[$year],$row['Jumlah']);
		}
	
}
	$year=array_keys($totaldata4);
	foreach(array_keys($totaldata4) as $row)
	{
		$dat =[$row,array_sum($totaldata4[$row]),'data'];
		array_push($totalkelurahan4, $dat);
	}
	$data['BarChartTitle4']= ' Jumlah Penyakit Berdasarkan Puskesmas ';
	$data['BarChartData4']=json_encode($totalkelurahan4);


		$this->load->view('puji', $data);
	}
}
