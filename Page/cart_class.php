<?php
class Cart
{
	var $productos;

	public function cart(){
		$this->productos = array();
	}

	public function add_product($product_id, $quantity = 1,$nombre,$id_user){
		$this->productos[] = new Producto($product_id, $quantity,$id_user);
	}
}

class Producto
{
	var $cantidad;
	var $id_producto;
	var $nombre;
	var $id_user;

	public function producto($id_producto, $cantidad = 1,$id_user){
		$this->cantidad = $cantidad;
		$this->id_producto = $id_producto;
		$this->id_user=$id_user;
		
	}
}