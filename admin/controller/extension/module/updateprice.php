<?php
class ControllerExtensionModuleUpdateprice extends Controller {
	public function index() {
		$this->load->model('catalog/product');
		$product_info = $this->model_catalog_product->getProducts();
		echo "<pre>";
		$ff=[];
		$fp = [];
		array_push($fp, "product_id");
		array_push($fp, "quantity");
		array_push($fp, "meta_title");
		array_push($ff, $fp);
		foreach ($product_info as $key) {
			$fp=[];
			foreach ($key as $i=>$j) {
				switch ($i){
					case "product_id":
					array_push($fp, $j);
					continue;
					case "meta_title":
					array_push($fp, $j);
					continue;
					case "quantity":
					array_push($fp, $j);
					continue;
				}
			}
			array_push($ff, $fp);
		}
		print_r ($ff);
		$fw = fopen('file.csv', 'w+');
		foreach ($ff as $fs) {
			fputcsv($fw, $fs, ";");
		}
	}
}