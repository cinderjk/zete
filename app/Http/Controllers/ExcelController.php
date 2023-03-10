<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Contact;

class ExcelController extends Controller
{
    // import contact from excel file
    public function importContact(Request $request)
    {
        $group = $request->group_import;
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        (new FastExcel)->import(public_path('/uploads/'.$file->getClientOriginalName()), function ($line) use($group) {
                return Contact::create([
                    'name' => $line['name'],
                    'phone' => $line['phone'],
                    'group_id' => $group
                ]);
        });
        unlink(public_path('/uploads/'.$file->getClientOriginalName()));
        return to_route('contact')->with('message', 'Contacts imported successfully.');
    }
}
