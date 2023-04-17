<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products, $description, $name, $quantity, $price, $idProducto;
    public $modal = false;
    public function render() // visualizar vista
    {
        $this-> products = Product::all();
        return view('livewire.products');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->name = '';
        $this->quantity = '';
        $this->idProducto = '';
    }

    public function editar($id)
    {
        $product = Product::findOrFail($id);
        $this->idProducto = $id;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Product::updateOrCreate(['id'=>$this->idProducto],
            [
                'name' => $this->name,
                'quantity' => $this->quantity
            ]);
         
         session()->flash('message',
            $this->idProducto ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
