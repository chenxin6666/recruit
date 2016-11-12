<?php 
namespace App\Repositoried;

interface DemoRepositoryInterface{
	public function selectAll();

	public function find($id);
}
