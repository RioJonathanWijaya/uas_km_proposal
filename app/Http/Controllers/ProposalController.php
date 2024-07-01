<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function viewPdf($id)
    {
        $proposal = Proposal::findOrFail($id);

        // Assuming 'pdf' column contains the file path to the PDF
        $filePath = storage_path('app/' . $proposal->pdf); // Adjust this path as per your storage setup
        print($filePath);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        }

        abort(404, 'PDF file not found.');
    }
}
