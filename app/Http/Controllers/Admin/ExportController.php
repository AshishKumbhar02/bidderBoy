<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function allCustomers(Request $request)
    {
        $param['name']          = $request->name;
        $param['email']         = $request->email;
        $param['mobile_number'] = $request->mobile_number;
        $param['ip_address']    = $request->ip_address;
        $param['is_active']     = $request->is_active;

        $query = DB::table('users');

        if ($param['name']) {
            $query->where('name', 'like', '%' . $param['name'] . '%');
        }

        if ($param['email']) {
            $query->where('email', $param['email']);
        }

        if ($param['mobile_number']) {
            $query->where('mobile_number', $param['mobile_number']);
        }

        if ($param['ip_address']) {
            $query->where('ip_address', $param['ip_address']);
        }

        if ($param['is_active']) {
            $is_active = ($param['is_active'] == 'active') ? 1 : 0;
            $query->where('is_active', $is_active);
        }

        $customers = $query->get();

        //header
        $columnName = ['ID', 'Name', 'Email', 'Phone', 'Status', 'Credit', 'IP', 'DOJ'];

        //values
        $columnValue = [];
        foreach ($customers as $r) {
            $columnValue[] = [$r->id, $r->name, $r->email, $r->mobile_number, ($r->is_active == 1) ? 'Active' : 'Inactive', $r->credits, $r->ip_address, $r->created_at];
        }

        return $this->exportData('allCustomer.csv', $columnName, $columnValue);
    }

    public function exportData($fileName, $columnName, $columnValue)
    {
        $output = fopen('php://temp', 'w');
        fputcsv($output, $columnName);

        foreach ($columnValue as $row) {
            fputcsv($output, $row);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    /*public function allCustomers(Request $request)
    {
        $users = DB::table('users')->get();

        $csvHeaders = ['Name', 'Email']; // Customize the headers as per your requirements

        $csvData = [];
        foreach ($users as $user) {
            $csvData[] = [$user->name, $user->email]; // Add the data you want to export
        }

        $filename = 'users.csv'; // Specify the filename

        $output = fopen('php://temp', 'w');
        fputcsv($output, $csvHeaders);

        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }
    */
}
