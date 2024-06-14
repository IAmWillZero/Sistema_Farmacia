<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale; // Asegúrate de importar el modelo Sale si ya lo has definido

class SaleController extends Controller
{
    /**
     * Muestra una lista de ventas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lógica para obtener y mostrar la lista de ventas
        $sales = Sale::all(); // Ejemplo básico de obtener todas las ventas

        return view('seller.sales.list_sales', ['sales' => $sales]);
    }

    /**
     * Muestra el formulario para crear una nueva venta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lógica para mostrar el formulario de creación de venta
        return view('seller.sales.create_sale');
    }

    /**
     * Guarda la nueva venta creada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lógica para guardar la nueva venta en la base de datos
        // Ejemplo básico de validación y almacenamiento de datos
        $sale = new Sale();
        $sale->title = $request->input('title');
        $sale->description = $request->input('description');
        $sale->amount = $request->input('amount');
        $sale->save();

        // Redireccionar a la lista de ventas u otra vista según sea necesario
        return redirect()->route('seller.ventas')->with('success', 'Venta creada correctamente.');
    }

    /**
     * Muestra los detalles de una venta específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lógica para mostrar los detalles de una venta específica
        $sale = Sale::findOrFail($id);

        return view('seller.sales.sale_details', ['sale' => $sale]);
    }

    /**
     * Muestra el formulario para editar una venta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de venta
        $sale = Sale::findOrFail($id);

        return view('seller.sales.edit_sale', ['sale' => $sale]);
    }

    /**
     * Actualiza la venta editada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Lógica para actualizar la venta en la base de datos
        $sale = Sale::findOrFail($id);
        $sale->title = $request->input('title');
        $sale->description = $request->input('description');
        $sale->amount = $request->input('amount');
        $sale->save();

        // Redireccionar a la lista de ventas u otra vista según sea necesario
        return redirect()->route('seller.ventas')->with('success', 'Venta actualizada correctamente.');
    }

    /**
     * Elimina una venta específica de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Lógica para eliminar la venta de la base de datos
        $sale = Sale::findOrFail($id);
        $sale->delete();

        // Redireccionar a la lista de ventas u otra vista según sea necesario
        return redirect()->route('seller.ventas')->with('success', 'Venta eliminada correctamente.');
    }
}
