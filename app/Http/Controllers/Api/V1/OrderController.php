<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['customer', 'employee', 'shipper', 'orderDetails.product'])->get();
        return $this->sendResponse($orders, 'Orders retrieved successfully.');
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,customer_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'shipper_id' => 'required|exists:shippers,shipper_id',
            'order_date' => 'required|date',
            'shipped_date' => 'nullable|date',
            'ship_address' => 'required|string',
            'ship_city' => 'required|string',
            'ship_postal_code' => 'required|string',
            'ship_country' => 'required|string',
            'order_details' => 'required|array|min:1',
            'order_details.*.product_id' => 'required|exists:products,product_id',
            'order_details.*.quantity' => 'required|integer|min:1',
            'order_details.*.unit_price' => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        try {
            DB::beginTransaction();

            $order = Order::create($request->except('order_details'));

            foreach ($request->order_details as $detail) {
                $order->orderDetails()->create($detail);
            }

            DB::commit();

            return $this->sendResponse(
                $order->load(['customer', 'employee', 'shipper', 'orderDetails.product']),
                'Order created successfully.'
            );
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError('Order Creation Error.', ['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['customer', 'employee', 'shipper', 'orderDetails.product'])->find($id);
        if (is_null($order)) {
            return $this->sendError('Order not found.');
        }
        return $this->sendResponse($order, 'Order retrieved successfully.');
    }

    /**
     * Update the specified order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->sendError('Order not found.');
        }

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,customer_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'shipper_id' => 'required|exists:shippers,shipper_id',
            'order_date' => 'required|date',
            'shipped_date' => 'nullable|date',
            'ship_address' => 'required|string',
            'ship_city' => 'required|string',
            'ship_postal_code' => 'required|string',
            'ship_country' => 'required|string',
            'order_details' => 'sometimes|array|min:1',
            'order_details.*.product_id' => 'required|exists:products,product_id',
            'order_details.*.quantity' => 'required|integer|min:1',
            'order_details.*.unit_price' => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        try {
            DB::beginTransaction();

            $order->update($request->except('order_details'));

            if ($request->has('order_details')) {
                // Delete existing order details
                $order->orderDetails()->delete();
                
                // Create new order details
                foreach ($request->order_details as $detail) {
                    $order->orderDetails()->create($detail);
                }
            }

            DB::commit();

            return $this->sendResponse(
                $order->load(['customer', 'employee', 'shipper', 'orderDetails.product']),
                'Order updated successfully.'
            );
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError('Order Update Error.', ['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified order from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->sendError('Order not found.');
        }

        try {
            DB::beginTransaction();
            
            // Delete order details first
            $order->orderDetails()->delete();
            
            // Delete the order
            $order->delete();

            DB::commit();
            return $this->sendResponse(null, 'Order deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError('Order Deletion Error.', ['error' => $e->getMessage()], 500);
        }
    }
}
